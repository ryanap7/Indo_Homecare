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
$route['default_controller'] = 'Auth';

$route['auth'] = 'Auth';

// ------------------------------------------------------------------------
// Admin
// ------------------------------------------------------------------------
$route['admin/dashboard']				        = 'Admin/DashboardController';

$route['admin/member']							= 'Admin/MemberController';
$route['admin/member/registration']				= 'Admin/MemberController/create';
$route['admin/member/url']				        = 'Admin/MemberController/url';
$route['admin/member/store']					= 'Admin/MemberController/store';
$route['admin/member/edit/(:any)']				= 'Admin/MemberController/edit/$1';
$route['admin/member/update']					= 'Admin/MemberController/update';
$route['admin/member/delete/(:any)']			= 'Admin/MemberController/delete/$1';

$route['admin/trainer']							= 'Admin/TrainerController';
$route['admin/trainer/create']					= 'Admin/TrainerController/create';
$route['admin/trainer/store']					= 'Admin/TrainerController/store';
$route['admin/trainer/edit/(:any)']				= 'Admin/TrainerController/edit/$1';
$route['admin/trainer/update']					= 'Admin/TrainerController/update';
$route['admin/trainer/delete/(:any)']			= 'Admin/TrainerController/delete/$1';

$route['admin/membership']						= 'Admin/MembershipController';
$route['admin/membership/create']				= 'Admin/MembershipController/create';
$route['admin/membership/store']				= 'Admin/MembershipController/store';
$route['admin/membership/edit/(:any)']			= 'Admin/MembershipController/edit/$1';
$route['admin/membership/update']				= 'Admin/MembershipController/update';
$route['admin/membership/delete/(:any)']		= 'Admin/MembershipController/delete/$1';

$route['admin/payment']							= 'Admin/PaymentController';
$route['admin/payment/create']					= 'Admin/PaymentController/create';
$route['admin/payment/store']					= 'Admin/PaymentController/store';
$route['admin/payment/edit/(:any)']				= 'Admin/PaymentController/edit/$1';
$route['admin/payment/update']					= 'Admin/PaymentController/update';
$route['admin/payment/delete/(:any)']			= 'Admin/PaymentController/delete/$1';

$route['admin/fee']	    						= 'Admin/FeeController';
$route['admin/fee/create']	    				= 'Admin/FeeController/create';
$route['admin/fee/store']		    			= 'Admin/FeeController/store';
$route['admin/fee/edit/(:any)']		    		= 'Admin/FeeController/edit/$1';
$route['admin/fee/update']				    	= 'Admin/FeeController/update';
$route['admin/fee/delete/(:any)']		    	= 'Admin/FeeController/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
