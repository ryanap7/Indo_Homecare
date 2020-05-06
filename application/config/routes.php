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
// SuperAdmin
// ------------------------------------------------------------------------
$route['superadmin/dashboard']				            = 'SuperAdmin/DashboardController';

$route['superadmin/admin']						        = 'SuperAdmin/AdminController';
$route['superadmin/admin/create']				        = 'SuperAdmin/AdminController/create';
$route['superadmin/admin/store']				        = 'SuperAdmin/AdminController/store';
$route['superadmin/admin/edit/(:any)']			        =  'SuperAdmin/AdminController/edit/$1';
$route['superadmin/admin/update']				        = 'SuperAdmin/AdminController/update';
$route['superadmin/admin/delete/(:any)']		        = 'SuperAdmin/AdminController/delete/$1';

// ------------------------------------------------------------------------
// Admini
// ------------------------------------------------------------------------
$route['admin/dashboard']	        			        = 'Admin/DashboardController';

$route['admin/client']      					        = 'Admin/ClientController';
$route['admin/client/create']		        	        = 'Admin/ClientController/create';
$route['admin/client/store'] 		        	        = 'Admin/ClientController/store';
$route['admin/client/edit/(:any)']		                = 'Admin/ClientController/edit/$1';
$route['admin/client/update']			                = 'Admin/ClientController/update';
$route['admin/client/delete/(:any)']	                = 'Admin/ClientController/delete/$1';

$route['admin/service']						            = 'Admin/ServiceController';
$route['admin/service/create']				            = 'Admin/ServiceController/create';
$route['admin/service/store']				            = 'Admin/ServiceController/store';
$route['admin/service/edit/(:any)']			            = 'Admin/ServiceController/edit/$1';
$route['admin/service/update']				            = 'Admin/ServiceController/update';
$route['admin/service/delete/(:any)']		            = 'Admin/ServiceController/delete/$1';

$route['admin/service/support']						    = 'Admin/SupportController';
$route['admin/service/support/create']				    = 'Admin/SupportController/create';
$route['admin/service/support/store']				    = 'Admin/SupportController/store';
$route['admin/service/support/edit/(:any)']			    = 'Admin/SupportController/edit/$1';
$route['admin/service/support/update']				    = 'Admin/SupportController/update';
$route['admin/service/support/delete/(:any)']		    = 'Admin/SupportController/delete/$1';

$route['admin/service/package']						    = 'Admin/PackageController';
$route['admin/service/package/create']				    = 'Admin/PackageController/create';
$route['admin/service/package/store']				    = 'Admin/PackageController/store';
$route['admin/service/package/edit/(:any)']			    = 'Admin/PackageController/edit/$1';
$route['admin/service/package/update']				    = 'Admin/PackageController/update';
$route['admin/service/package/delete/(:any)']		    = 'Admin/PackageController/delete/$1';

$route['admin/service/alkes']						    = 'Admin/AlkesController';
$route['admin/service/alkes/create']				    = 'Admin/AlkesController/create';
$route['admin/service/alkes/store']				        = 'Admin/AlkesController/store';
$route['admin/service/alkes/edit/(:any)']			    = 'Admin/AlkesController/edit/$1';
$route['admin/service/alkes/update']				    = 'Admin/AlkesController/update';
$route['admin/service/alkes/delete/(:any)']		        = 'Admin/AlkesController/delete/$1';

$route['admin/ambulance']						        = 'Admin/AmbulanceController';
$route['admin/ambulance/create']				        = 'Admin/AmbulanceController/create';
$route['admin/ambulance/store']				            = 'Admin/AmbulanceController/store';
$route['admin/ambulance/edit/(:any)']			        = 'Admin/AmbulanceController/edit/$1';
$route['admin/ambulance/update']				        = 'Admin/AmbulanceController/update';
$route['admin/ambulance/delete/(:any)']		            = 'Admin/AmbulanceController/delete/$1';

$route['admin/ambulance/sewa']						    = 'Admin/SewaAmbulanceController';
$route['admin/ambulance/sewa/store']				    = 'Admin/SewaAmbulanceController/store';
$route['admin/ambulance/sewa/update/(:any)']		    = 'Admin/SewaAmbulanceController/update/$1';
$route['admin/ambulance/sewa/delete/(:any)']		    = 'Admin/SewaAmbulanceController/delete/$1';
$route['admin/ambulance/sewa/history']				    = 'Admin/SewaAmbulanceController/history';

$route['admin/invoice'] 						        = 'Admin/InvoiceController';
$route['admin/invoice/store']				            = 'Admin/InvoiceController/store';
$route['admin/invoice/request'] 						= 'Admin/InvoiceController/request';
$route['admin/invoice/add_cart'] 						= 'Admin/InvoiceController/add_cart';
$route['admin/invoice/load']    						= 'Admin/InvoiceController/load';
$route['admin/invoice/remove']    						= 'Admin/InvoiceController/remove';
$route['admin/invoice/clear']    						= 'Admin/InvoiceController/clear';
$route['admin/invoice/detail/(:any)']			        = 'Admin/InvoiceController/detail/$1';
$route['admin/invoice/failed']    						= 'Admin/InvoiceController/failed';
$route['admin/invoice/confirm/(:any)']			        = 'Admin/InvoiceController/confirm/$1';
$route['admin/invoice/cancel/(:any)']			        = 'Admin/InvoiceController/cancel/$1';
$route['admin/invoice/success']    						= 'Admin/InvoiceController/success';
$route['admin/invoice/download/(:any)']			        = 'Admin/InvoiceController/download/$1';
$route['admin/invoice/preview/(:any)']			        = 'Admin/InvoiceController/preview/$1';

$route['admin/sewa_alkes']   					        = 'Admin/SewaAlkesController';
$route['admin/sewa_alkes/store']				        = 'Admin/SewaAlkesController/store';
$route['admin/sewa_alkes/request'] 						= 'Admin/SewaAlkesController/request';
$route['admin/sewa_alkes/add_cart'] 					= 'Admin/SewaAlkesController/add_cart';
$route['admin/sewa_alkes/view']     					= 'Admin/SewaAlkesController/view';
$route['admin/sewa_alkes/load']    						= 'Admin/SewaAlkesController/load';
$route['admin/sewa_alkes/remove']    					= 'Admin/SewaAlkesController/remove';
$route['admin/sewa_alkes/clear']    					= 'Admin/SewaAlkesController/clear';
$route['admin/sewa_alkes/detail/(:any)']			    = 'Admin/SewaAlkesController/detail/$1';
$route['admin/sewa_alkes/failed']    					= 'Admin/SewaAlkesController/failed';
$route['admin/sewa_alkes/confirm/(:any)']			    = 'Admin/SewaAlkesController/confirm/$1';
$route['admin/sewa_alkes/cancel/(:any)']			    = 'Admin/SewaAlkesController/cancel/$1';
$route['admin/sewa_alkes/success']    					= 'Admin/SewaAlkesController/success';
$route['admin/sewa_alkes/download/(:any)']			    = 'Admin/SewaAlkesController/download/$1';
$route['admin/sewa_alkes/preview/(:any)']			    = 'Admin/SewaAlkesController/preview/$1';


// ------------------------------------------------------------------------
// Koordinator
// ------------------------------------------------------------------------
$route['koordinator/dashboard']				            = 'Koordinator/DashboardController';

$route['koordinator/employees']	    				    = 'Koordinator/EmployeesController';
$route['koordinator/employees/create']  			    = 'Koordinator/EmployeesController/create';
$route['koordinator/employees/store']		    	    = 'Koordinator/EmployeesController/store';
$route['koordinator/employees/edit/(:any)']		        = 'Koordinator/EmployeesController/edit/$1';
$route['koordinator/employees/update']			        = 'Koordinator/EmployeesController/update';
$route['koordinator/employees/delete/(:any)']	        = 'Koordinator/EmployeesController/delete/$1';

$route['koordinator/calendar']	    				    = 'Koordinator/CalendarController';
$route['koordinator/calendar/load']	    			    = 'Koordinator/CalendarController/load';



$route['profile/edit']				                    = 'ProfileController/edit';
$route['profile/update']				                = 'ProfileController/update';
$route['profile/changepassword']		                = 'ProfileController/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
