<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Role_model extends model
{
    public $table = '{role}';

    public function __construct()
    {
      //$this->db->drop("$this->table");
      parent::__construct();
    }


    public function create_schema()
    {
        parent::create_schema("
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
        `type` enum('guest','unconfirmed','applicant','member','moderator','administrator') COLLATE utf8_unicode_ci DEFAULT NULL,
        `weight` int(11) DEFAULT NULL,
        `core` tinyint(4) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`)
        ");

        if(!$this->db->query("
        INSERT INTO `".$this->table."` (`id`, `name`, `description`, `type`, `weight`, `core`) VALUES
        (2, 'Guest', 'Guests can only view content. Anyone browsing the site who is not signed in is considered to be a \"Guest\".', 'guest', 1, 0),
        (3, 'Unconfirmed', 'Users must confirm their emails before becoming full members. They get assigned to this role.', 'unconfirmed', 2, 0),
        (4, 'Applicant', 'Users who have applied for membership, but have not yet been accepted. They have the same permissions as guests.', 'applicant', 3, 0),
        (8, 'Member', 'Members can participate in discussions.', 'member', 4, 1),
        (16, 'Administrator', 'Administrators have permission to do anything.', 'administrator', 6, 1),
        (32, 'Moderator', 'Moderators have permission to edit most content.', 'moderator', 5, 1);
        ")) {
          show_error("Unable to insert data because ".$this->last_error(),500,"Database Error");
        }
    }


}
