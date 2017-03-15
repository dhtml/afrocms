<?php

//$this->config->set_item('theme_front','bootstrap');

$this->router->addRoute(new Route('default','', 'Welcome', 'index'));

$this->router->addRoute(new Route('','test', 'Welcome', 'test'));
