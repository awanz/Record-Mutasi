<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'AuthController/login';
$route['404_override'] = 'ErrorController';
$route['translate_uri_dashes'] = FALSE;

//--------------------- AUTH ---------------------//
$route['auth/login']['GET'] = 'AuthController/login';
$route['auth/login']['POST'] = 'AuthController/login_post';
$route['auth/logout']['GET'] = 'AuthController/logout';
//--------------------- AUTH ---------------------//

//--------------------- DASHBOARD ---------------------//
$route['dashboard'] = 'DashboardController/index';
//--------------------- DASHBOARD ---------------------//

//--------------------- PROFILE ---------------------//
$route['profile']['GET'] = 'ProfileController';
$route['profile']['POST'] = 'ProfileController/update';
$route['profile/change_password']['GET'] = 'ProfileController/change_password';
$route['profile/change_password']['POST'] = 'ProfileController/change_password_post';
$route['profile/change_photo']['POST'] = 'ProfileController/change_photo_post';
//--------------------- PROFILE ---------------------//

//--------------------- BANK ---------------------//
$route['bank']['GET'] = 'BankController';
$route['bank/add']['GET'] = 'BankController/add';
$route['bank/add']['POST'] = 'BankController/add_post';
$route['bank/(:num)/view']['GET'] = 'BankController/view/$1';
$route['bank/(:num)/edit']['GET'] = 'BankController/edit/$1';
$route['bank/(:num)/edit']['POST'] = 'BankController/edit_post/$1';
$route['bank/(:num)/delete']['GET'] = 'BankController/delete/$1';
//--------------------- BANK ---------------------//

//--------------------- USERS ---------------------//
$route['users']['GET'] = 'UsersController';
$route['users/add']['GET'] = 'UsersController/add';
$route['users/add']['POST'] = 'UsersController/add_post';
$route['users/(:num)/edit']['GET'] = 'UsersController/edit/$1';
$route['users/(:num)/edit']['POST'] = 'UsersController/edit_post/$1';
$route['users/(:num)/delete']['GET'] = 'UsersController/delete/$1';
//--------------------- USERS ---------------------//

//--------------------- MUTASI ---------------------//
$route['record_mutasi']['GET'] = 'MutasiController';
$route['record_mutasi/(:num)/detail']['GET'] = 'MutasiController/detail/$1';
$route['record_mutasi/run']['GET'] = 'MutasiController/run';
$route['record_mutasi/fillter']['GET'] = 'MutasiController/fillter';
//--------------------- MUTASI ---------------------//