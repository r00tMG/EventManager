<?php 
var_dump($_GET);
function deleteEvents(){
    $id = $_GET['id'];
    $connection = new PDO('mysql:host=localhost; dbname=eventManager_db', 'phpmyadmin', 'password');
    $response = $connection->prepare('DELETE FROM events WHERE events_id=?');
    $response->execute([$id]); 
}
deleteEvents();
header('Location:../index.php');

// $events = readEvents();