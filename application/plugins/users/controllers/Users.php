<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Controller {
    public function index()
    {

    }

    public function login()
    {
      addStyle("bootstrap/css/bootstrap.min.css",null,'asset');
      addStyle("plugins/users/css/login.css",null,'asset');

      addScript("js/jquery-1.10.2.min.js",null,'asset');
      addScript("bootstrap/js/bootstrap.min.js",null,'asset');
      addScript("plugins/users/js/login.js",null,'asset');

      //<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      //<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

      //echo "Login";
      //die();
    }

}
