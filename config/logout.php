<?php
require_once 'auth.php';
var_dump(isConnect());
if(isConnect()){
    unset($_SESSION['user']);
    unset($_SESSION['users']);
    header('location: login.php');
}