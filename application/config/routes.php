<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['users/(:any)/comments'] = 'comments/get/$1';
$route['comments/update'] = 'comments/update';
$route['comments/create'] = 'comments/create';
$route['comments/edit/(:any)'] = 'comments/edit/$1';
$route['comments/(:any)'] = 'comments/view/$1';
$route['comments'] = 'comments/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;