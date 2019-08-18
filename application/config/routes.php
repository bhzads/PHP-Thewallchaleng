<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'AuthController/login';
$route['register'] = 'AuthController/register';
$route['logout'] = 'AuthController/logout';
$route['feed'] = 'MainController';


$route['post/add'] = 'PostController/add';
$route['post/delete/(:num)'] = 'PostController/deletpost/$1';
$route['post/upvoet/(:num)'] = 'PostController/upvoetpost/$1';


