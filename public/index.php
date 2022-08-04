<?php 
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($conn, $base);
$userInfo = $auth->checkToken();

echo 'index';