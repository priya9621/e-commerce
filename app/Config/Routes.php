<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->match(['get','post'],'/cart', 'Home::cart');
$routes->match(['get','post'],'/decrement', 'Home::decrement');
$routes->get('/checkout', 'Home::checkout');
// $routes->get('/details', 'Home::details');
$routes->get('/orderlist/(:any)', 'Home::orderlist/$1');
$routes->get('/particuler', 'Home::particuler');
$routes->get('/success', 'Home::success');

$routes->match(['get','post'],'/signup', 'Home::signup');
$routes->match(['get','post'],'/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->match(['get','post'],'products-details/(:any)','Home::productdetails/$1');

$routes->get('/tailcss', 'Home::tailcss');


/*--------Admin route-------*/


$routes->match(['get','post'],'/admin','AdminController::index');
$routes->get('/admin/logout','AdminController::logout');
$routes->get('/admin/admin','AdminController::admin');

$routes->match(['get','post'],'/admin/dashboard','ProductController::dashboard');

$routes->get('/admin/user','AdminController::user');

$routes->match(['get','post'],'/admin/products','ProductController::products');



$routes->get('/admin/categories','CategoryController::categories');
$routes->match(['get','post'],'/admin/update-category/(:any)','CategoryController::updateCategory/$1');
$routes->match(['get','post'],'/admin/delete-category/(:any)','CategoryController::deleteCategory/$1');

$routes->match(['get','post'],'/admin/category','CategoryController::category');
$routes->match(['get','post'],'/admin/recent-order','ProductController::recentorder');
