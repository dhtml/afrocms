/**
* An object the holds ajax form error handlers
*/
var form_api_error_handlers={};

/**
* default ajax callback handle when submission is successful
*
* @param object response The json response returned
* @param object data Some parameters of the form
*         {'action':action,'method':method,'form_id':form_id};
*
* @return void
*/
function form_api_callback(response,data)
{
//merge messages and errors together
messages=response.messages.concat(message2array(response.errors,'error'));

output=system_theme_messages(messages);

$('div#message_area div#'+data.form_id).remove();
$('div#message_area').append('<div id="'+data.form_id+'">'+output+'</div>');
}

/**
* default error callback when ajax submission fails
*
* @param string form_id The id of the form
* @param object error The error response
*        {'code':'404','status':textStatus}
*
* @return void
*/
function form_api_error_callback(form_id,error)
{
  switch(error.status)
  {
    case 'parseerror':
    msg="Your form was not processed on server due to an error";
    break;
    case 'error':
    msg="Your form could not be submitted due to network error";
    break;
    default:
    msg="Your form could not be submitted for an unknown reason";
  }


  messages=[{'m':msg,'t':'error'},{m:'please try to submit the form again',t:'error'}];

  output=system_theme_messages(messages);

  $('div#message_area div#'+form_id).remove();
  $('div#message_area').append('<div id="'+form_id+'">'+output+'</div>');

}

/**
* allows a function to bind to the submit handler from the form
*
* @param string|function fx The name of a function or an anonymous function object
*                           that will receive a single argument i.e form_id
*
* @return void
*/
function form_api_onsubmit(fx,form_id) {
  $('body').on('submit', 'form#'+form_id, function() {

  if(typeof(fx)=='function') {
    fx(form_id);
  } else {
    eval(fx+'(form_id)');
  }
  });
}

/**
* execute ajax submission of forms
*
* @param string action The action url of the form
*
* @param string method The form submission method
*
* @return void
*/
function form_api_ajax(action,method,form_id)
{

  $('body').on('submit', 'form#'+form_id, function(e){
    e.preventDefault();
    var formData = new FormData($(this)[0]);

    var data={'action':action,'method':method,'form_id':form_id};

    $.ajax({
        url: action,
        type: method,
        data: formData,
        async: false,
        success: function (response) {
          form_api_ajax_submit_data(action,method,form_id,data,response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          error={'code':'404','status':textStatus};
          form_api_onerror_exec(form_id,error);
        },
        cache: false,
        contentType: false,
        processData: false
    });

      return false;
  });

}

/**
* stores form error handler to be executed on ajax failure
*
* @param string|function fx The name/function
*
* @param string form_id The form id
*
* @return void
*/
function form_api_onerror(fx,form_id)
{
try {
eval('form_api_error_handlers.'+form_id+'=fx');
} catch(e) {
  void(0);
}
}

/**
* when an error handler exists, it is called at this point
*
* @param string form_id The form id
*
* @param object error The error object
*
* @return void
*/
function form_api_onerror_exec(form_id,error) {

var fx=eval('form_api_error_handlers.'+form_id);
if(typeof(fx)==='undefined') {
fx='form_api_error_callback';
}

//execute final error callback
try {
  if(typeof(fx)=='function') {
    fx(form_id,error);
  } else {
    eval(fx+'(form_id,error)');
  }
} catch(err) {
  console.log('Unable to execute ajax callback because:'+err.message);
}

}

/**
* Process json response from ajax
*
* @param string action The action of the form
*
* @param string method The form method
*
* @param string form_id The form id
*
* @param object response The response object
*
* @return void
*/
function form_api_ajax_submit_data(action,method,form_id,data,response)
{
try {
  response=JSON.parse(response);
} catch(e) {
  error={'code':'201','status':'parseerror'};
  form_api_onerror_exec(form_id,error);
  return;
}

  //recreate form object
  $("form#"+form_id).replaceWith(response.html);

  if (response.form_state.callback.length!=0 && typeof response.form_state.callback !== "undefined") {
    try {
      if(response.form_state.callback.indexOf('function')==-1) {
        eval(response.form_state.callback+'(response,data)');
      } else {
        cb=response.form_state.callback.parseFunction();
        cb(response,data);
      }
    } catch(err) {
      console.log('Unable to execute ajax callback because:'+err.message);
    }
  } else {
    form_api_callback(response,data);
  }

}
