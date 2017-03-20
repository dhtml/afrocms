<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Current_User_Model
{
  /**
  * The name of the users table
  *
  * @var string
  * @access public
  */
  public $table = '{users}';

  /**
  * The session key of users
  *
  * @var string
  * @access public
  */
  public $sess_key;

  /**
  * The session name
  *
  * @var string
  * @access public
  */
  public $sess_name;

  /**
  * user data
  *
  * @var object
  */
  public $data;

  public function __construct()
  {
    //setup session security key
    $this->sess_key=config_item("security_user_sess_key","111");

    //setup session name
    $this->sess_name=config_item("security_user_sess_name","current");

    //get the session id
    if(isset($_SESSION[$this->sess_name])) {
      $userid=decrypt($_SESSION[$this->sess_name],$this->sess_key);
      $this->data=(object) get_instance()->user_model->load($userid);
    } else {
      $this->data=new stdClass();
    }
  }

  /**
  * authorize user by id
  *
  *
  */
  public function authorize($uid=null) {
    if(is_null($uid)) {
      unset($_SESSION[$this->sess_name]);
    } else {
      $_SESSION[$this->sess_name]=encrypt($uid,$this->sess_key);
    }
  }

  public function __get($key)
  {
    return isset($this->data->$key) ? $this->data->$key : null;
  }


}
