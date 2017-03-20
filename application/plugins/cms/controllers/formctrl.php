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
          $form=$this->form->get('form2',$form_state,$this);
          $response=$form->render();


          $this->assign('response',$response);
        }


        function form2($form, $form_state=array())
        {
          //$form['form']['id']="test";

          $form['form']['group1'] = array(
          'type' => 'div',
          'class' => 'form-group',
          );


          $form['form']['group1']['label'] = array(
          'type' => 'label',
          'for' => 'email',
          'text' => 'Email address',
        );


          $form['form']['group1']['email'] = array(
          'type' => 'email',
          'id' => 'email',
          'name' => 'email',
          'class' => 'form-control',
          'placeholder' => 'Email',
          'value' => 'tony@37.com',
        );

          $form['form']['group2'] = array(
          'type' => 'div',
          'class' => 'form-group',
        );


          $form['form']['group2']['label'] = array(
          'type' => 'label',
          'for' => 'password',
          'text' => 'Password',
        );

          $form['form']['group2']['password'] = array(
          'type' => 'password',
          'id' => 'password',
          'name' => 'password',
          'class' => 'form-control',
          'placeholder' => 'Password',
        );



          $form['form']['group3'] = array(
          'type' => 'div',
          'class' => 'form-group',
        );


          $form['form']['group3']['label'] = array(
          'type' => 'label',
          'for' => 'upload',
          'text' => 'File input',
        );

          $form['form']['group3']['upload'] = array(
          'type' => 'file',
          'id' => 'upload',
          'help' => 'Example block-level help text here.',
        );


          $form['form']['group4'] = array(
          'type' => 'div',
          'class' => 'checkbox',
        );

          $form['form']['group4']['checklbl'] = array(
          'type' => 'label',
        );

          $form['form']['group4']['checklbl']['check'] = array(
          'type' => 'checkbox',
          'name' => 'checkme',
          'value' => 'good',
          //'checked' => true,
          'description' => 'Check me out',
        );



        $form['form']['group4']['label'] = array(
        'type' => 'label',
        'for' => 'email',
        'text' => 'Email address',
        );

        $form['form']['group5'] = array(
        'type' => 'div',
        'class' => 'form-group',
        );

        $form['form']['group5']['post'] = array(
        'type' => 'textarea',
        'name' => 'post',
        'class' => 'form-control',
        );

        $form['form']['group6'] = array(
        'type' => 'div',
        'class' => 'form-group',
        );

        $form['form']['group6']['label'] = array(
        'type' => 'label',
        'text' => 'Gender',
        );

        $form['form']['group6']['clabel'] = array(
          'type' => 'label',
          'class' => 'radio-inline',
        );


        $form['form']['group6']['clabel']['male'] = array(
          'type' => 'radio',
          'id' => 'male',
          'name'=>'gender',
          'value' => 'm',
          'description' => 'male',
        );

        $form['form']['group6']['clabel2'] = array(
          'type' => 'label',
          'class' => 'radio-inline',
        );

        $form['form']['group6']['clabel2']['female'] = array(
          'type' => 'radio',
          'id' => 'female',
          'name'=>'gender',
          'value' => 'f',
          'description' => 'female',
        );

        $form['form']['group7'] = array(
        'type' => 'div',
        'class' => 'form-group',
        );

        $form['form']['group7']['select'] = array(
        'type' => 'select',
        'id' => 'select',
        'name'=>'states',
        'multiple' => 'true',
        'size' => '10',
        'options' => array('lagos','ibadan','ondo','osun','uyo','sokoto'),
        //'values' => array('lagos','ondo','uyo'),
        'class' => 'form-control',
        );


        $form['form']['button'] = array(
          'type' => 'submit',
          'class' => 'btn btn-default',
          'text' => 'Submit',
        );

        return $form;
        }

}




function form1($form, $form_state=array())
{

  //$form['form']['id']="test";

  $form['form']['group1'] = array(
  'type' => 'div',
  'class' => 'form-group',
  );


  $form['form']['group1']['label'] = array(
  'type' => 'label',
  'for' => 'email',
  'text' => 'Email address',
);


  $form['form']['group1']['email'] = array(
  'type' => 'email',
  'id' => 'email',
  'name' => 'email',
  'class' => 'form-control',
  'placeholder' => 'Email',
  'value' => 'tony@37.com',
);

  $form['form']['group2'] = array(
  'type' => 'div',
  'class' => 'form-group',
);


  $form['form']['group2']['label'] = array(
  'type' => 'label',
  'for' => 'password',
  'text' => 'Password',
);

  $form['form']['group2']['password'] = array(
  'type' => 'password',
  'id' => 'password',
  'name' => 'password',
  'class' => 'form-control',
  'placeholder' => 'Password',
);



$form['form']['button'] = array(
  'type' => 'submit',
  'class' => 'btn btn-default',
  'text' => 'Submit',
);

return $form;
}
