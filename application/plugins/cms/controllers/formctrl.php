<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormCtrl extends Controller {

        public function __construct()
        {
          bind('form_alter','form_alter',$this);

          $this->forms=load_class(__DIR__."/../forms/forms.php");
        }

        //form creation event handler
        public function form_alter(&$form,&$form_state,$form_id) {
          echo "A new form {$form_id} has been created";

          $form['form']['group1']['form_var'] = array(
          'type' => 'text',
          'name' => 'form_vars',
          'value' => 'lovely boy',
          );
        }


        public function index()
        {
          //echo "Form api";




          $form_state = array();
          $form_state['email'] = 'diltony@yahoo.com';
          $form_state['password'] = 'lagos22';
          $form_state['checkme'] = 'good';
          $form_state['post'] = 'my post';
          $form_state['gender'] = 'f';
          //$form_state['states'] = 'lagos';
          $form_state['states'] = array('lagos','ondo','uyo');


          //$form=$this->form->get('form1');
          //$form=$this->form->get('form1',$form_state);
          $form=$this->form->get('form1',$form_state,$this->forms);
          $response=$form->render();


          $this->assign('response',$response);
        }



}
