<?php
$id = $_POST['id'] ?? null;
$date=$_POST['date'] ?? null;
$time=$_POST['time'] ?? null ;
$lieu=$_POST['lieu_events'] ?? null;
$describ=$_POST['description_events'] ?? null;
$userID=$_POST['userID'] ?? null;

try {
    $connection = new PDO('mysql:host=localhost;dbname=eventManager_db', 'phpmyadmin', 'password');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $response = $connection->prepare('UPDATE events SET date=?, time=?, lieu_events=?, description_events=?,userID=? WHERE events_id=?');
    // Exécuter la requête
    $event = $response->execute([$date, $time, $lieu, $describ, $userID, $id]);
    
    // Vérifier le nombre de lignes affectées
    $affectedRows = $response->rowCount();
    // die("Rows affected: " . $affectedRows);
    if($affectedRows>0){
        header('location:../../index.php');
    }
    
} catch (PDOException $e) {
    // Afficher l'erreur PDO
    die("Error: " . $e->getMessage());
}
