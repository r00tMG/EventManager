<?php
require_once 'auth.php';
var_dump(isConnect());
if(isConnect()){
    unset($_SESSION);
    // unset($_SESSION);
    header('location: login.php');
}