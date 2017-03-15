<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_Role_model extends model
{
    public $table = '{user_role}';

    public function __construct()
    {
      $this->db->drop("$this->table");
      parent::__construct();
    }


    public function create_schema()
    {
        parent::create_schema("
        `UserID` int(11) NOT NULL,
        `RoleID` int(11) NOT NULL,
        PRIMARY KEY (`UserID`,`RoleID`),
        KEY `IX_UserRole_RoleID` (`RoleID`)
        ");

        if(!$this->db->query("
        INSERT INTO `{$this->table}` (`UserID`, `RoleID`) VALUES
        (1, 16)
        ")) {
          show_error("Unable to insert data because ".$this->last_error(),500,"Database Error");
        }
    }


}
