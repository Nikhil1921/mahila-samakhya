<?php defined('BASEPATH') OR exit('No direct script access allowed');
$admin = 'adminPanel';

$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;

// front routes
$route['about-us'] = 'home/about_us';
$route['gallery(/:any)?'] = 'home/gallery$1';
$route['staff(/:any)?'] = 'home/staff$1';
$route['events'] = 'home/events';
$route['news'] = 'home/news';
$route['news/(:num)'] = 'home/news_detail/$1';
$route['contact-us'] = 'home/contact_us';
$route['what-is-mahila-samakhya'] = 'home/mahila_samakhya';
$route['work-vistar'] = 'home/work_vistar';
$route['kamgiri'] = 'home/kamgiri';
$route['kendro'] = 'home/kendro';

// admin routes
$route["$admin/forgot-password"] = "$admin/login/forgot_password";
$route["$admin/check-otp"] = "$admin/login/check_otp";
$route["$admin/change-password"] = "$admin/login/change_password";
$route["$admin/dashboard"] = "$admin/home";