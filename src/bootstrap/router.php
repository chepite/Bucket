<?php
// set routes
$routes = array(
   'home' => array(
    'controller' => 'User',
    'action' => 'index'
  ),
  'login' => array(
    'controller' => 'User',
    'action' => 'login'
  ),
'signup' => array(
    'controller' => 'User',
    'action' => 'signup'
),
'profile' => array(
    'controller' => 'User',
    'action' => 'profile'
),
'bucketlist-api' => array(
    'controller' => 'User',
    'action' => 'bucketlistApi'
),
'detail' => array(
    'controller' => 'Bucketlist',
    'action' => 'detail'
),
'detail-api' => array(
    'controller' => 'Bucketlist',
    'action' => 'detailApi'
),
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
