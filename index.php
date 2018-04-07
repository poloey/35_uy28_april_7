<?php 
session_start();
require 'vendor/autoload.php';

$url = trim( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/' );

$routes = [
  '' => 'views/home.php',
  'about' => 'views/about.php',
  'contact' => 'views/contact.php',
  'post' => 'views/post.php',
  'category' => 'views/category.php',
  'author' => 'views/author.php',
  'login' => 'views/login.php',
  'register' => 'views/register.php',
  'logout' => 'views/logout.php',

  // posts crud
  'dashboard/home' => 'views/dashboard/home.php',
  'dashboard/posts/create' => 'views/dashboard/post_create.php',
  'dashboard/posts/edit' => 'views/dashboard/post_edit.php',
  'dashboard/posts/delete' => 'views/dashboard/post_delete.php',

  // categories crud
  'dashboard/categories/home' => 'views/dashboard/categories.php',
  'dashboard/categories/create' => 'views/dashboard/category_create.php',
  'dashboard/categories/edit' => 'views/dashboard/category_edit.php',
  'dashboard/categories/delete' => 'views/dashboard/category_delete.php',
];

$auth_routes = [
  'logout',
  'dashboard/home',
  'dashboard/posts/create',
  'dashboard/posts/edit',
  'dashboard/posts/delete',
  'dashboard/categories/home',
  'dashboard/categories/create',
  'dashboard/categories/edit',
  'dashboard/categories/delete',
];




if (array_key_exists($url, $routes)) {

  // check whether current url exist in auth routes array.
  if (in_array($url, $auth_routes) ) {
    if (isset($_SESSION['user'])) {
      // if user logged in redirect to url 
      require $routes[$url];
    }else {
      // if user not logged in redirect to login page
      redirect('/login');
    }

  } else {
    require $routes[$url];
  }

} else {
  require 'views/notfound.php';
}