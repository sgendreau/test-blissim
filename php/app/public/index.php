<?php

require_once('../vendor/autoload.php');

use App\Lib\Router\Router;

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'Product#index', 'products_list');
$router->get('/error404', 'Exception#notFound', 'error_404');
$router->get('/:id', 'Product#show', 'products_show');
$router->get('/:idProduct/add', 'Comment#edit', 'comment_add');
$router->post('/:idProduct/add', 'Comment#edit', 'comment_add');
$router->get('/:idProduct/edit/:idComment', 'Comment#edit', 'comment_edit');
$router->post('/:idProduct/edit/:idComment', 'Comment#edit', 'comment_edit');
$router->get('/:idProduct/delete/:idComment', 'Comment#delete', 'comment_delete');

$router->run();
