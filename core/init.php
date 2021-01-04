<?php

if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}

session_start();
error_reporting(E_ALL);
ini_set("display_error",1);

include "config.php";
include "dbconnection.php";
include "auth.php";
include "functions.php";

$db = new DB($config['db_opts']);
$auth = new Auth($config,$db);

$token = "";

$headers = apache_request_headers();

if(isset($headers['Auth'])){
    $matches = array();
    preg_match('/token=(.*)/', $headers['Auth'], $matches);
    
    if(isset($matches[1])){
        $token = $matches[1];
    }
}

if(isset($_SESSION['user'])){
    $token = $_SESSION['user'];
}

if(isset($_POST['token'])) {
    $token = $_POST['token'];
}

$logged_user = $db->getUserByToken($token);

if(isset($_SESSION['admin']))
{
    $token = $_SESSION['admin'];
}

$logged_admin = $db->getAdminByToken($token);
?>