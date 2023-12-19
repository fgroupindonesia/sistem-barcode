<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'Welcome/login';
$route['logout'] = 'User/logout';
$route['update-counter-info'] = 'Info/updateTotalLocally';
$route['update-counter-user'] = 'User/updateTotalLocally';
$route['update-counter-box'] = 'Box/updateTotalLocally';
$route['update-counter-customer'] = 'Customer/updateTotalLocally';
$route['dashboard'] = 'Welcome/dashboard';
$route['verify-login'] = 'User/login';
$route['management-customers'] = 'Management/customers';
$route['management-users'] = 'Management/users';
$route['management-box'] = 'Management/box';
$route['management-info'] = 'Management/info';
$route['add-new-user'] = 'User/form';
$route['add-new-box'] = 'Box/form';
$route['add-new-customer'] = 'Customer/form';
$route['add-new-info'] = 'Info/form';
$route['register'] = 'User/register';
$route['settings'] = 'User/settings';
$route['settings/update'] = 'User/updateSettings';
$route['test'] = 'Welcome/test';