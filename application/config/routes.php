<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| Default / System
|--------------------------------------------------------------------------
*/

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

$route['auth/login']         = 'Auth/login';
$route['auth/process_login'] = 'Auth/process_login';
$route['auth/logout']        = 'Auth/logout';


/*
|--------------------------------------------------------------------------
| ADMIN - ARTICLES
|--------------------------------------------------------------------------
*/

$route['admin/articles']                = 'admin/Articles/index';
$route['admin/articles/create']         = 'admin/Articles/create';
$route['admin/articles/store']          = 'admin/Articles/store';
$route['admin/articles/edit/(:num)']    = 'admin/Articles/edit/$1';
$route['admin/articles/update/(:num)']  = 'admin/Articles/update/$1';
$route['admin/articles/delete/(:num)']  = 'admin/Articles/delete/$1';


/*
|--------------------------------------------------------------------------
| ADMIN - TESTIMONI
|--------------------------------------------------------------------------
*/

$route['admin/testimoni']                = 'admin/Testimoni/index';
$route['admin/testimoni/create']         = 'admin/Testimoni/create';
$route['admin/testimoni/store']          = 'admin/Testimoni/store';
$route['admin/testimoni/edit/(:num)']    = 'admin/Testimoni/edit/$1';
$route['admin/testimoni/update/(:num)']  = 'admin/Testimoni/update/$1';
$route['admin/testimoni/delete/(:num)']  = 'admin/Testimoni/delete/$1';


/*
|--------------------------------------------------------------------------
| ADMIN - FAQ
|--------------------------------------------------------------------------
*/

$route['admin/faq']                = 'admin/Faq/index';
$route['admin/faq/create']         = 'admin/Faq/create';
$route['admin/faq/store']          = 'admin/Faq/store';
$route['admin/faq/detail/(:num)']  = 'admin/Faq/detail/$1';
$route['admin/faq/edit/(:num)']    = 'admin/Faq/edit/$1';
$route['admin/faq/update/(:num)']  = 'admin/Faq/update/$1';
$route['admin/faq/delete/(:num)']  = 'admin/Faq/delete/$1';


/*
|--------------------------------------------------------------------------
| ADMIN - CONTACT
|--------------------------------------------------------------------------
|
| Contact = informasi kontak website
| (phone, email, address, maps_url)
|
*/

$route['admin/contact']                  = 'admin/Contact/index';
$route['admin/contact/edit/(:num)']     = 'admin/Contact/edit/$1';
$route['admin/contact/update/(:num)']   = 'admin/Contact/update/$1';


/*
|--------------------------------------------------------------------------
| ADMIN - ABOUT
|--------------------------------------------------------------------------
*/

$route['admin/about']          = 'admin/about/index';
$route['admin/about/store']    = 'admin/about/store';

$route['admin/about/edit']     = 'admin/about/edit';
$route['admin/about/update']   = 'admin/about/update';


/*
|--------------------------------------------------------------------------
| ADMIN - ABOUT SLIDES
|--------------------------------------------------------------------------
|
| Digunakan oleh halaman daftar slide About.
|
*/

$route['admin/about/slides'] = 'admin/about/index';

/*
|--------------------------------------------------------------------------
| PUBLIC - ABOUT
|--------------------------------------------------------------------------
*/

$route['about'] = 'about/index';


/*
|--------------------------------------------------------------------------
| ADMIN - FEATURES
|--------------------------------------------------------------------------
*/

$route['admin/features'] = 'admin/features/index';

$route['admin/features/edit-platform/(:num)']
    = 'admin/features/edit_platform/$1';

$route['admin/features/update-platform/(:num)']
    = 'admin/features/update_platform/$1';

$route['admin/features/edit-item/(:num)']
    = 'admin/features/edit_item/$1';

$route['admin/features/update-item/(:num)']
    = 'admin/features/update_item/$1';