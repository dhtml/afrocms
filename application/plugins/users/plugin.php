<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->router->addRoute(new Route('login','user/login', 'Users', 'login','bland'));
