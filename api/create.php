<?php
function createEvents(){
    $connection = new PDO('mysql:host=localhost; dbname=eventManager_db', 'phpmyadmin', 'password');
    if(
        isset($_POST['date']) && 
        isset($_POST['time']) &&
        isset($_POST['lieu_events']) &&
        isset($_POST['description_events'])
        ){
    
            $date_events = $_POST['date'];
            $time_events = $_POST['time'];
            $lieu_events = $_POST['lieu_events'];
            $description_events = $_POST['description_events'];
    
    $res = $connection->prepare(
        "INSERT INTO events(
            date, 
            time, 
            lieu_events, 
            description_events
            ) VALUES(
                ?,
                ?,
                ?,
                ?
            )"
    
    );
        
    $res->execute([$date_events,$time_events,$lieu_events,$description_events]);
    }
}
