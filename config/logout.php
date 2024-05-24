<?php
require_once 'auth.php';
isConnect();
if(isConnect()){
    unset($_SESSION["users"]);
    header('location: login.php');
}