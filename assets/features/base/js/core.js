/**
* This will convert a function from string to object
* <code>
* var func = 'function (a, b) { return a + b; }'.parseFunction();
* alert(func(3,4));
* </code>
*/
if (typeof String.prototype.parseFunction != 'function') {
    String.prototype.parseFunction = function () {
        var funcReg = /function *\(([^()]*)\)[ \n\t]*{(.*)}/gmi;
        var match = funcReg.exec(this.replace(/\n/g, ' '));

        if(match) {
            return new Function(match[1].split(','), match[2]);
        }

        return null;
    };
}



/**
* render system messages
*
* @return string
*/
function system_theme_messages(messages)
{
 var keys=[]; output='';
  for (var key in messages) {
    mkey=messages[key].t;

    if($.inArray(mkey, keys)!=-1) {continue;}

    keys.push(mkey);
  }


  for(var i=0;i<keys.length;i++) {
    key=keys[i];

    output += '<div class="messages '+key+'">'+"\n";

    var items=[];

    //compact a group of message types into array
    for (var m in messages) {
      msg=messages[m];

      if(msg.t!=key) {continue;}
      items.push(msg.m);
    }

    if (items.length > 1) {
      output += " <ul>\n";
      for (item in items) {
        output += '  <li>'+ items[item] +"</li>\n";
      }
      output += " </ul>\n";
    }
    else {
      output += items[0];
    }
    output += "</div>\n";
  }

  return output;
}

/**
* accepts an array e.g.
* {
*   "name": "The name is not correct.",
*   "email": "The email is not correct."
* }
*
* @return array
*/
function message2array(msg,mtype) {
var result=[];
for (var key in msg) {
  if (msg.hasOwnProperty(key)) {
    //console.log(key + " -> " + msg[key]);
    result.push({"t": mtype,"m": msg[key]});
  }
}

return result;
}
