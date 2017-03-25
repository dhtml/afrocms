<?php

class MyForms {

function __construct()
{
}

//form creation event handler
function form_alter_event(&$form,&$form_state,$form_id) {
  switch($form_id) {
    case 'form1':
        $form['group0'] = array(
          'weight'=>-10,
          'type' => 'div',
          'class' => 'form-group',
        );


        $form['group0']['label'] = array(
          'type' => 'label',
          'for' => 'username',
          'text' => 'Username',
        );


        $form['group0']['username'] = array(
          'type' => 'text',
          'class' => 'form-control',
          'placeholder' => 'Email',
        );
      //stdout($form);
    break;
  }
}

//form validation event handler
function form_validate_event($form, &$form_state,$form_id) {
  switch($form_id) {
    case 'form1':
      //$form_state['values']['username']='tony4';
      if ($form_state['values']['username'] != 'dhtml') {
        form_set_error('username', 'The username is not correct.');
      }
 break;
 }

}

//submit event handler
function form_submit_event($form, &$form_state,$form_id) {
  //var_dump($form_state);
    switch($form_id) {
    case 'form1':
        form_push_message('The form has been submitted (2).');
        break;
    }

}



function form2_validate($form, &$form_state) {
  $form_state['values']['email']='diltony@gmail.com';

  form_push_message('The form has been validated.');
}

function form2_submit($form, &$form_state) {
  //var_dump($form_state);
  form_push_message('The form has been submitted.');
}


function form2($form,&$form_state=array()) {

  $form['form']['ajax']=array(
        'callback'=>'function(response) {
          console.log(response);
          alert("test");
         }');


 /*
  $form['form']['onsubmit']='function(form_id) {
    alert("Your form has been submitted "+form_id);
  }';
  */

  //adds a javascript fx to call before form is submitted
  //$form['form']['onsubmit']='form_onsubmit_handle';




  $form['form']['ajax']=array();

  $form['form']['ajax']=array('callback'=>'form_api_callback2');

  $form['form']['ajax']=array(
    'onerror2'=>'form_api_error_callback',
    'callback'=>'form_api_callback',
    'preload'=>function() {
      addScript("js/cform.js",null,'asset');
      }
    );


  $form['group1'] = array(
    'type' => 'div',
    'class' => 'form-group',
  );


  $form['group1']['label'] = array(
    'type' => 'label',
    'for' => 'email',
    'text' => 'Email address',
  );


  $form['group1']['email'] = array(
    'type' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'placeholder' => 'Email',
  );

  $form['group7'] = array(
    'type' => 'div',
    'class' => 'form-group',
  );

  $form['group7']['file'] = array(
    'type' => 'file',
    'title' => 'Upload',
  );

  $form['group7']['file2'] = array(
    'type' => 'file',
    'title' => 'Upload',
  );

  $form['group7']['file3'] = array(
    'type' => 'file',
    'title' => 'Upload',
  );


  $form['submit'] = array(
    'type' => 'submit',
    'class' => 'btn btn-default',
    'text' => 'Submit',
  );

return $form;
}



function form1_validate($form, &$form_state) {
  //var_dump($form_state);
  $form_state['values']['username']='tony4';

  if ($form_state['values']['email'] != 'diltony@gmail.com') {
   form_set_error('email', 'The email is not correct.');
 }
}

function form1_submit($form, &$form_state) {
  //var_dump($form_state);
  system_set_message('The form has been submitted.');
}




function form1($form,&$form_state=array()) {


  //$form['form']['method']='GET';

  $form['group1'] = array(
    'type' => 'div',
    'class' => 'form-group',
  );


  $form['group1']['label'] = array(
    'type' => 'label',
    'for' => 'email',
    'text' => 'Email address',
  );


  $form['group1']['email'] = array(
    'type' => 'email',
    'id' => 'email',
    'class' => 'form-control',
    'placeholder' => 'Email',
  );

  $form['group2'] = array(
    'type' => 'div',
    'class' => 'form-group',
  );


  $form['group2']['label'] = array(
      'type' => 'label',
      'for' => 'password',
      'text' => 'Password',
    );

  $form['group2']['pass'] = array(
    'type' => 'password',
    'id' => 'password',
    'class' => 'form-control',
    'placeholder' => 'Password',
  );



  $form['group4'] = array(
    'type' => 'div',
    'class' => 'checkbox',
  );

  $form['group4']['checklbl'] = array(
    'type' => 'label',
  );

  $form['group4']['checklbl']['check'] = array(
    'type' => 'checkbox',
    'value'=>'yes',
    //'checked' => true,
    'description' => 'Check me out',
  );


  $form['group5'] = array(
    'type' => 'div',
    'class' => 'checkbox',
  );

  $form['group5']['post'] = array(
  'type' => 'textarea',
  'id' => 'post',
  'class' => 'form-control',
);

$form['group6'] = array(
  'type' => 'div',
  'class' => 'checkbox',
);

$form['group6']['select'] = array(
'type' => 'select',
'id' => 'select',
'multiple' => 'true',
'size' => '10',
'options' => array(1,2,3,4,5,6,7,8,9,10),
'values' => array(1,2,3),
'class' => 'form-control',
);


$form['group7'] = array(
  'type' => 'div',
  'class' => 'checkbox',
);

	$form['group7']['clabel'] = array(
    'type' => 'label',
    'class' => 'radio-inline',
	);


  $form['group7']['clabel']['ctrl'] = array(
    'type' => 'radio',
    'id' => 'inlineCheckbox1',
    'name'=>'radiofm',
    'value' => 'option1',
    'description' => '1',
	);

  $form['group7']['clabel2'] = array(
    'type' => 'label',
    'class' => 'radio-inline',
	);

  $form['group7']['clabel2']['ctrl'] = array(
    'type' => 'radio',
    'id' => 'inlineCheckbox1',
    'name'=>'radiofm',
    'value' => 'option2',
    'description' => '2',
	);

  $form['group7']['clabel3'] = array(
    'type' => 'label',
    'class' => 'radio-inline',
	);

  $form['group7']['clabel3']['ctrl'] = array(
    'type' => 'radio',
    'name'=>'radiofm',
    'id' => 'inlineCheckbox1',
    'value' => 'option3',
    'description' => '3',
	);

  $form['group7'] = array(
    'type' => 'div',
    'class' => 'checkbox',
  );

  $form['group7']['file'] = array(
    'type' => 'file',
    'title' => 'Upload',
  );

  $form['submit'] = array(
    'type' => 'submit',
    'class' => 'btn btn-default',
    'text' => 'Submit',
  );

return $form;
}

}
