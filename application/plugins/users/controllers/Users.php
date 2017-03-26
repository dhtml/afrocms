<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Controller {
    public function __construct()
    {
      $this->forms=load_class(__DIR__."/../classes/auth.forms.php");
    }

    public function index()
    {

    }

    public function login()
    {
      addStyle("bootstrap/css/bootstrap.min.css",null,'asset');
      addStyle("plugins/users/css/login.css",null,'asset');

      addScript("js/jquery/jquery.min.js",null,'asset');
      addScript("bootstrap/js/bootstrap.min.js",null,'asset');
      addScript("plugins/users/js/login.js",null,'asset');



      $this->assign('login_form',$this->form->get('login_form',null,$this->forms));
      $this->assign('register_form',$this->form->get('register_form',null,$this->forms));
      $this->assign('password_form',$this->form->get('password_form',null,$this->forms));

      //echo "Login";
      //die();
    }

}
