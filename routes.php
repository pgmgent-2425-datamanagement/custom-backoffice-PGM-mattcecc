<?php

//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->setNamespace('\App\Controllers');
$router->get('/', 'HomeController@index');

$router->get('/events','EventController@list');

$router->get('/events/delete/(\d+)','EventController@delete');

$router->get('/events/detail/(\d+)','EventController@detail');

$router->get('/events/add','EventController@add');
$router->post('/events/add','EventController@save');

$router->get('/events/edit/(\d+)', 'EventController@edit');
$router->post('/events/edit/(\d+)', 'EventController@update');

$router->get('/filemanager', 'FileManagerController@list');
$router->get('/filemanager/(.*)', 'FileManagerController@list');
$router->get('/filemanager/delete/(.*)', 'FileManagerController@delete');