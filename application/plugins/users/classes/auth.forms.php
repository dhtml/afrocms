<?php

class Authentication_Form_Design {

function login_form($form,&$form_state=array()) {

  $form['form']['id']='login-form';


  $form['modal-body']=array(
   'type'=>'div',
   'class'=>'modal-body',
  );

  $form['modal-body']['div-login-msg'] = array(
    'type' => 'div',
    'id' => 'div-login-msg',
  );

  $form['modal-body']['div-login-msg']['icon-login-msg'] = array(
    'type' => 'div',
    'id' => 'icon-login-msg',
    'class'=>'glyphicon glyphicon-chevron-right',
  );

  $form['modal-body']['div-login-msg']['text-login-msg'] = array(
    'type' => 'span',
    'id' => 'text-login-msg',
    'text'=>'Type your username and password.',
  );

  $form['modal-body']['login_username'] = array(
    'type' => 'text',
    'id' => 'login_username',
    'class' => 'form-control',
    'placeholder' => 'Username (type ERROR for error effect)',
    'required'=>'required',
  );

  $form['modal-body']['register_password'] = array(
    'type' => 'password',
    'id' => 'register_password',
    'class' => 'form-control',
    'placeholder' => '',
    'required'=>'required',
  );


  $form['modal-body']['checkbox'] = array(
    'type' => 'div',
    'class' => 'checkbox',
  );

  $form['modal-body']['checkbox']['checklbl'] = array(
    'type' => 'label',
  );

  $form['modal-body']['checkbox']['checklbl']['check'] = array(
    'type' => 'checkbox',
    'value'=>'yes',
    //'checked' => true,
    'description' => 'Remember me',
  );


  $form['modal-footer']=array(
   'type'=>'div',
   'class'=>'modal-footer',
  );

  $form['modal-footer']['div1'] = array(
    'type' => 'div',
  );


  $form['modal-footer']['div1']['submit'] = array(
    'type' => 'submit',
    'class' => 'btn btn-primary btn-lg btn-block',
    'text' => 'Login',
  );

  $form['modal-footer']['div2'] = array(
    'type' => 'div',
  );

  $form['modal-footer']['div2']['login_lost_btn'] = array(
    'type' => 'button',
    'id'=>'login_lost_btn',
    'class' => 'btn btn-link',
    'text' => 'Lost Password?',
  );

  $form['modal-footer']['div2']['login_register_btn'] = array(
    'type' => 'button',
    'id'=>'login_register_btn',
    'class' => 'btn btn-link',
    'text' => 'Register',
  );


return $form;
}




function register_form($form,&$form_state=array()) {

  $form['form']['id']='register-form';
  $form['form']['style']='display:none';


  $form['modal-body']=array(
   'type'=>'div',
   'class'=>'modal-body',
  );

  $form['modal-body']['div-register-msg'] = array(
    'type' => 'div',
    'id' => 'div-register-msg',
  );

  $form['modal-body']['div-register-msg']['icon-register-msg'] = array(
    'type' => 'div',
    'id' => 'icon-register-msg',
    'class'=>'glyphicon glyphicon-chevron-right',
  );

  $form['modal-body']['div-register-msg']['text-register-msg'] = array(
    'type' => 'span',
    'id' => 'text-register-msg',
    'text'=>'Register an account.',
  );

  $form['modal-body']['register_username'] = array(
    'type' => 'text',
    'id' => 'register_username',
    'class' => 'form-control',
    'placeholder' => 'Username (type ERROR for error effect)',
    'required'=>'required',
  );

  $form['modal-body']['register_email'] = array(
    'type' => 'email',
    'id' => 'register_email',
    'class' => 'form-control',
    'placeholder' => 'Email address',
    'required'=>'required',
  );

  $form['modal-body']['register_password'] = array(
    'type' => 'password',
    'id' => 'register_password',
    'class' => 'form-control',
    'placeholder' => '',
    'required'=>'required',
  );


  $form['modal-footer']=array(
   'type'=>'div',
   'class'=>'modal-footer',
  );

  $form['modal-footer']['div1'] = array(
    'type' => 'div',
  );


  $form['modal-footer']['div1']['submit'] = array(
    'type' => 'submit',
    'class' => 'btn btn-primary btn-lg btn-block',
    'text' => 'Register',
  );

  $form['modal-footer']['div2'] = array(
    'type' => 'div',
  );

  $form['modal-footer']['div2']['register_login_btn'] = array(
    'type' => 'button',
    'id'=>'register_login_btn',
    'class' => 'btn btn-link',
    'text' => 'Login',
  );

  $form['modal-footer']['div2']['register_lost_btn'] = array(
    'type' => 'button',
    'id'=>'register_lost_btn',
    'class' => 'btn btn-link',
    'text' => 'Lost Password?',
  );


return $form;
}



function password_form($form,&$form_state=array()) {

$form['form']['id']='lost-form';
$form['form']['style']='display:none';


  $form['modal-body']=array(
   'type'=>'div',
   'class'=>'modal-body',
  );

  $form['modal-body']['div-lost-msg'] = array(
    'type' => 'div',
    'id' => 'div-lost-msg',
  );

  $form['modal-body']['div-lost-msg']['icon-login-msg'] = array(
    'type' => 'div',
    'id' => 'icon-lost-msg',
    'class'=>'glyphicon glyphicon-chevron-right',
  );

  $form['modal-body']['div-lost-msg']['text-login-msg'] = array(
    'type' => 'span',
    'id' => 'text-lost-msg',
    'text'=>'Type your e-mail.',
  );

  $form['modal-body']['lost_email'] = array(
    'type' => 'email',
    'id' => 'lost_email',
    'class' => 'form-control',
    'placeholder' => 'Email',
    'required'=>'required',
  );


  $form['modal-footer']=array(
   'type'=>'div',
   'class'=>'modal-footer',
  );

  $form['modal-footer']['div1'] = array(
    'type' => 'div',
  );


  $form['modal-footer']['div1']['submit'] = array(
    'type' => 'submit',
    'class' => 'btn btn-primary btn-lg btn-block',
    'text' => 'Send',
  );

  $form['modal-footer']['div2'] = array(
    'type' => 'div',
  );

  $form['modal-footer']['div2']['lost_login_btn'] = array(
    'type' => 'button',
    'id'=>'lost_login_btn',
    'class' => 'btn btn-link',
    'text' => 'Login',
  );

  $form['modal-footer']['div2']['lost_register_btn'] = array(
    'type' => 'button',
    'id'=>'lost_register_btn',
    'class' => 'btn btn-link',
    'text' => 'Register',
  );


return $form;
}

}
