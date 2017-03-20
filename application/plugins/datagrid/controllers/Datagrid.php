<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datagrid extends Controller {
    public function index()
    {

      //writeln($this->load->view('test.php',array('name'=>'Tony','phone'=>'07030290746')));
      //writeln($this->load->view('test.html',array('name'=>'Tony','phone'=>'07030290746')));
      //die();
      $output=$this->load->view("select",null,true);
      $this->theme->assign('page_output',$output);


      addStyle(array(
      "assets/jquery-ui.structure.min.css",
      "assets/jquery-ui.theme.min.css",
      "assets/jquery.appendGrid-1.6.3.css",
      "assets/custom.css",
    ),null,'datagrid');

      addScript(array(
        "assets/jquery-1.11.1.min.js",
        "assets/jquery-ui-1.11.1.min.js",
        "assets/jquery.appendGrid-1.6.3.js",
        "assets/custom.js",
      ),null,'datagrid');



      setTitle("Datagrid Language Editor");
    }
}
