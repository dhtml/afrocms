<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormCtrl extends Controller {

        public function __construct()
        {
          $this->cforms=load_class(__DIR__."/../classes/cforms.php");

          //$this->forms=load_class(__DIR__."/../classes/cforms.php");

          //stdout($this->cforms,true);

          //bind form events
          bind('form_alter','form_alter_event',$this->cforms);
          bind('form_validate','form_validate_event',$this->cforms);
          bind('form_submit','form_submit_event',$this->cforms);

        }

        public function form1()
        {
          $response=$this->form->get('form1',null,$this->cforms);
          $this->assign('response',$response);
        }

        public function form2()
        {
          $response=$this->form->get('form2',null,$this->cforms);
          $this->assign('response',$response);
        }


        public function test()
        {
          form_set_error('name', 'The name is not correct.');
          system_set_message('The form is valid2','status');

          redirect('form');

          //$this->assign('response','great');

          die();
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

          //$form=$this->form->get('form1',$form_state,$this->forms);
          //$response=$form->render();


          //system_set_message('The form is valid','status');
          //system_set_message('The form is valid2','status');
          //system_set_message('The form is valid3','status');

          //system_set_message('The form has issues','warning');

          //system_set_message('The form has issues','danger');
          //system_set_message('The form has issues','info');



          $form_state = array();
          $form_state['values']['email'] = 'diltony@yahoo.com';
          $form_state['values']['pass'] = 'lagos22';
          $form_state['values']['check'] = 'yes';

          //$response=$this->form->get('form1',$form_state,$this->cforms);

          $response=$this->form->get('form2',null,$this->cforms);

          $this->assign('response',$response);
        }



}
