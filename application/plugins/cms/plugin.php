<?php
defined('BASEPATH') or exit('No direct script access allowed');

//load session
$this->load->library(BASEPATH."libraries/session.php");

//add base style
addStyle("css/base.css",null,'assets');


$this->load->models(
  array(
    /*load all available roles*/
    __DIR__."/models/role_model.php",

    /*manage role of userss*/
    __DIR__."/models/user_role.php",

    /*manage registered users*/
    __DIR__."/models/user_model.php",

    /*manage current user*/
    'user'=>__DIR__."/models/current_user_model.php",

    /*manage cms variables*/
    'variable'=>__DIR__."/models/variables_model.php",


    /*manage feed models*/
    __DIR__."/models/feed_model.php"
  )
);


//$this->user->authorize(1);

//$this->variable->del('name');
//writeln($this->variable->get('name'));

//$this->variable->set('name','Tony');
//stdout($_SESSION);

//writeln($this->user->username);

//$this->user->authorize(1);


//$this->load->model(array("user_model","feed_model"));



//cms menu event handlers
bind('menu', function () {


  //first menu
    menu::get('cms_home')
      ->setTitle('Home')
      ->setID('20')
      ->setIcons(array('fa fa-home', 'fa fa-chevron-down'))
      ->setPriority(0);

      //stdout(menu::get('cms_home')->getID());

    menu::get('cms_home_dash_board')
      ->setParent('cms_home')
      ->setTitle('dashboard')
      ->setUri('admin');


    menu::get('cms_home_dash_board-1')
            ->setParent('cms_home')
            ->setTitle('dashboard 1')
            ->setUri('admin/dashboard1');


    menu::get('cms_home_dash_board-1')
                  ->setParent('cms_home')
                  ->setTitle('dashboard 1')
                  ->setUri('admin/dashboard1');


    menu::get('cms_home_dash_board-2')
                  ->setParent('cms_home')
                  ->setTitle('dashboard 2')
                  ->setUri('admin/dashboard2');

    //second menu
    menu::get('cms_forms')
                  ->setPriority(1)
                  ->setTitle('Forms')
                  ->setIcons(array('fa fa-edit', 'fa fa-chevron-down'))
                  ->setUri('admin/forms');

    menu::get('cms_forms_general')
                  ->setParent('cms_forms')
                  ->setTitle('General forms')
                  ->setUri('admin/forms/general');


    menu::get('cms_forms_basic')
                      ->setParent('cms_forms')
                      ->setTitle('Basic forms')
                      ->setUri('admin/forms/basic');



    menu::get('cms_forms_advance')
                        ->setParent('cms_forms')
                        ->setTitle('Advance forms')
                        ->setUri('admin/forms/advance');



    //third root
    menu::get('cms_ui')
                        ->setPriority(3)
                        ->setTitle('UI Elements')
                        ->setIcons(array('fa fa-desktop', 'fa fa-chevron-down'))
                        ->setUri('admin/ui');

    menu::get('cms_ui_general')
                        ->setParent('cms_ui')
                        ->setTitle('General UI')
                        ->setUri('admin/ui/general');


    menu::get('cms_ui_media')
                        ->setParent('cms_ui')
                        ->setTitle('Media UI')
                        ->setUri('admin/ui/media');


    menu::get('cms_ui_typo')
                        ->setParent('cms_ui')
                        ->setTitle('Typography UI')
                        ->setUri('admin/ui/typo');


    menu::get('cms_ui_test')
                          ->setParent('cms_ui')
                          ->setTitle('Typography UI')
                          ->setUri('admin/ui/typo');
});




//->setTitle('Home');
//new Menu()->setTitle('About');

$this->router->addRoute(new Route('admin.default', 'admin', 'CMS', 'admin'));

$this->router->addRoute(new Route(array(
      'view'=>'admin.pages',
      'uri'=>'admin/pages',
      'controller'=>'CMS',
      'method'=>'pages'
    )));

    $this->router->addRoute(new Route(array(
          'view'=>'form',
          'uri'=>'form/test',
          'controller'=>'FormCtrl',
          'method'=>'test'
        )));


    $this->router->addRoute(new Route(array(
          'view'=>'form',
          'uri'=>'form',
          'controller'=>'FormCtrl',
          'method'=>'index'
        )));

        $this->router->addRoute(new Route(array(
              'view'=>'form',
              'uri'=>'form1',
              'controller'=>'FormCtrl',
              'method'=>'form1'
            )));


            $this->router->addRoute(new Route(array(
                  'view'=>'form',
                  'uri'=>'form2',
                  'controller'=>'FormCtrl',
                  'method'=>'form2'
                )));


        $this->router->addRoute(new Route(array(
              'view'=>'form',
              'uri'=>'form/result',
              'controller'=>'FormCtrl',
              'method'=>'result'
            )));
