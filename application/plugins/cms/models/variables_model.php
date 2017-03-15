<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Variables_model extends model
{
    public $table = '{variables}';

    public function __construct()
    {
      parent::__construct();
    }

    public function create_schema()
    {
      parent::create_schema("
      `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
      `name` tinytext NOT NULL,
      `scope` tinytext NOT NULL,
      `value` tinytext NOT NULL,
      `vid` tinytext NOT NULL,
      PRIMARY KEY (`id`)
      ");
    }



  	/**
  	* Sets variable into database
  	* @param string name of variable
  	* @param string value of variable
  	* @param string scope of variable
  	*/
  	public function set($name,$value='',$scope='default') {

  		$vid=$name.'_'.$scope;

      $this->db->reset_query();
  		$this->db->where('vid',$vid);

  		$this->db->update(
  			$this->table,
  			array('vid'=>$vid,'name'=>$name,'value'=>serialize($value),'updated_at'=>time(),'scope'=>$scope)
  		);

  		if($this->db->affected_rows()==0) {
  			$this->db->insert(
  				$this->table,
  				array('vid'=>$vid,'name'=>$name,'value'=>serialize($value),'created_at'=>time(),'scope'=>$scope)
  			);
  		}

  		return $this;
  	}


    /**
    * Variable get from database
    * @name - variable name
    * @scope - variable scope
    * @default - default value
    */
    public function get($name,$scope='default',$default='') {
      $r=$this->db->dlookup('value',$this->table,'name = ? and scope = ?',array($name,$scope));
      return $r ? unserialize($r) : $default;
    }

    /**
    * removes variable from database
    * @name - variable name
    * @scope - variable scope
    */
    public function del($name,$scope='default') {
      $this->db->delete($this->table, array('name' => $name,'scope'=>$scope));
      return $this;
    }

    /**
    * removes an entire scope with its variables
    * @scope - variable scope
    */
    public function del_scope($scope='default') {
      $this->db->delete($this->table, array('scope'=>$scope));

      return $this;
    }
}
