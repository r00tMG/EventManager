<?php
function isConnect():bool{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
        $_SESSION['user']=1 ;
    }
    return isset($_SESSION['user']) && !empty($_SESSION['user']);
}
// var_dump(isConnect());
function redirect_login():void{
    if(isConnect()!==false){
        header('Location: config/login.php');
        exit();
    }
}
