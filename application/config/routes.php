<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['wsclient/(:any)'] = 'ws/WS_ClientController/getClient/$1';
$route['login'] = 'web/SessionController/login';
$route['about'] = 'web/AboutController/view';
$route['home'] = 'web/HomeController/view';
$route['users'] = 'web/UserController/index';

$route['wsusers'] = 'ws/WS_UserController/getUsers';
$route['wsusers/(:num)'] = 'ws/WS_UserController/getUser/$1';
$route['delete/(:num)'] = 'ws/WS_UserController/deleteUser/$1';
//$route['wscuentas'] = 'ws/WS_CuentaController/getCuentas';
$route['wscuentas/(:any)'] = 'ws/WS_CuentaController/getCuenta/$1';
$route['wscuentas'] = 'ws/WS_CuentaController/getCuenta';

$route['users/add'] = 'web/UserController/addNewUser';
$route['users/updateStatus'] = 'web/UserController/updateStatus';
$route['users/changeRole'] = 'web/UserController/changeUserRol';
$route['users/editUser/(:num)'] = 'web/UserController/editUser/$1';
$route['users/updateUser/(:num)'] = 'web/UserController/updateUser/$1';
$route['users/deleteUser/(:num)'] = 'web/UserController/deleteUser/$1';

$route['cuentas'] = 'web/CuentaController/index';
$route['cuentas/add'] = 'web/CuentaController/addNewCuenta';
$route['cuentas/deleteCuenta/(:any)'] = 'web/CuentaController/deleteCuenta/$1';

$route['transferencias'] = 'web/TransferenciaController/index';
$route['transferencias/add'] = 'web/TransferenciaController/addNewTransferencia';
$route['transferencias/transferir'] = 'web/TransferenciaController/transferir';

$route['default_controller'] = 'web/HomeController/view';
$route['(:any)'] = 'web/HomeController/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
