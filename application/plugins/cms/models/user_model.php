<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends model
{
    public $table = '{users}';

    public function __construct()
    {
      //$this->db->drop("$this->table");
      parent::__construct();
    }


    public function create_schema()
    {
      parent::create_schema("
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `email` varchar(128) NOT NULL DEFAULT '',
      `username` varchar(32) NOT NULL DEFAULT '',
      `hash` varchar(64) NOT NULL DEFAULT '',
      `password` varchar(64) NOT NULL DEFAULT '',
      `joinStamp` int(11) NOT NULL DEFAULT '0',
      `activityStamp` int(11) NOT NULL DEFAULT '0',
      `accountType` varchar(32) NOT NULL DEFAULT '',
      `emailVerify` tinyint(2) NOT NULL DEFAULT '0',
      `joinIp` varchar(64) NOT NULL DEFAULT '',
      PRIMARY KEY (`id`),
      UNIQUE KEY `email` (`email`),
      UNIQUE KEY `username` (`username`),
      KEY `accountType` (`accountType`),
      KEY `joinStamp` (`joinStamp`),
      KEY `activityStamp` (`activityStamp`)
      ");


      $data=array(
        'id'=>1,
        'username'=>config_item('dbase_admin_username','admin'),
        'email'=>config_item('dbase_admin_email','admin@site.com'),
        'hash'=>config_item('security_password_func','md5'),
        'password'=>$this->security->password(config_item('dbase_admin_password','pass')),
        'joinStamp'=>time(),
        'created_at'=>time(),
        'joinIp'=>ip_address(),
      );

      if(!$this->insert($data)) {
        show_error("Unable to insert data because ".$this->last_error(),500,"Database Error");
      }

    }


    /**
    * load user
    *
    */
    public function load($uid=0)
    {
      return $this->db
      ->reset_query()
      ->where(array('id'=>$uid))
      ->get($this->table)
      ->row();
    }
}
