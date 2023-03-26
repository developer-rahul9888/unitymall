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
$route['default_controller'] = 'merchant_front';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/* Admin */
$route['admin'] = 'vc_site_admin/user/index';
$route['admin/welcome'] = 'vc_site_admin/user/admin_welcome';
$route['admin/signup'] = 'vc_site_admin/user/signup';
$route['admin/create_member'] = 'vc_site_admin/user/create_member';
$route['admin/ondemand_create_member'] = 'vc_site_admin/user/ondemand_create_member';
$route['admin/login'] = 'vc_site_admin/user/index';
$route['admin/logout'] = 'vc_site_admin/user/logout';
$route['admin/login/validate_credentials'] = 'vc_site_admin/user/validate_credentials';
$route['admin/forgot-password'] = 'vc_site_admin/user/forgot_password';
$route ['register'] = 'vc_site_admin/user/verify_customer';

$route['admin/profile'] = 'vc_site_admin/profile/index';
$route['admin/commercial'] = 'vc_site_admin/commercial/index';
$route['admin/bank-detail'] = 'vc_site_admin/bank_detail/index';
$route['admin/other-supporting-document'] = 'vc_site_admin/other_supporting_document/index';
$route['admin/authorized-signature'] = 'vc_site_admin/authorized_signature/index';

/*product*/
$route['admin/product'] = 'vc_site_admin/product/index';
$route['admin/product/add'] = 'vc_site_admin/product/add';
$route['admin/product/edit/(:num)'] = 'vc_site_admin/product/update/$1';
$route['admin/product/del/(:num)'] = 'vc_site_admin/product/del/$1';
$route['admin/product/remove_img'] = 'vc_site_admin/product/remove_img';


/*sale*/
$route['admin/sale'] = 'vc_site_admin/sale/index';
$route['admin/salel/add'] = 'vc_site_admin/sale/misslaneous_add';
$route['admin/sale/add'] = 'vc_site_admin/sale/add';
$route['admin/sale/sale_checkout'] = 'vc_site_admin/sale/sale_checkout';
$route['admin/sale/edit/(:num)'] = 'vc_site_admin/sale/update/$1';
$route['admin/sale/invoice/(:num)'] = 'vc_site_admin/sale/invoice/$1';
$route['admin/sale/del/(:num)'] = 'vc_site_admin/sale/del/$1';
$route['admin/credit/add'] = 'vc_site_admin/sale/credit_add';


/*product*/
$route['admin/deals'] = 'vc_site_admin/deals/index';
$route['admin/deals/add'] = 'vc_site_admin/deals/add';
$route['admin/deals/edit/(:num)'] = 'vc_site_admin/deals/update/$1';
$route['admin/deals/del/(:num)'] = 'vc_site_admin/deals/del/$1'; 


/*Orders*/
$route['admin/order'] = 'vc_site_admin/order/index';
$route['admin/order/(:num)'] = 'vc_site_admin/order/order_view/$1';

/* User login & Signup */
$route['login_member'] = 'login_member/index';
$route['login_member/forgetpassword'] = 'login_member/forgetpassword';
$route['login_member/logout'] = 'login_member/logout';
$route ['reg_member'] = 'reg_member/index';
$route ['findstate/(:num)'] = 'findstate/index/$1';
$route ['findcity/(:num)'] = 'findcity/index/$1';

$route['(:num)'] = 'merchant_front/merchant_page';

/* update Admin password */
$route['admin/password'] = 'vc_site_admin/password';
?>