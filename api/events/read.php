<?php 
function readEvents(){
    $connection = new PDO('mysql:host=localhost; dbname=eventManager_db', 'phpmyadmin', 'password');
    $response = $connection->prepare('SELECT *FROM events');
    $response->execute(); 
    $events = $response->fetchAll();
    return $events;
}

$events = readEvents();
// var_dump($events);