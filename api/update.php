<?php
// try {
    //code...
    // print_r($_POST);
$id = $_POST['id'] ?? null;
$date=$_POST['date'] ?? null;
$time=$_POST['time'] ?? null ;
$lieu=$_POST['lieu_events'] ?? null;
$describ=$_POST['description_events'] ?? null;
// $connection = new PDO('mysql:host=localhost; dbname=eventManager_db', 'phpmyadmin', 'password');
// $response = $connection->prepare('UPDATE events SET date=?, time=?, lieu_events=?, description_events=? WHERE events_id=?');
// $event = $response->execute([$date,$time,$lieu,$describ,$id]); 
// // $event_id = $response->fetch();
// die($event);
// if($event){
//     header('location: ../index.php');
//     // exit(0);
// }else{
//     throw new Exception('Error');
// }
// } catch (PDOException $e) {
//     //throw $th;
//     echo json_encode($e->errorInfo) ;
// } 

try {
    $connection = new PDO('mysql:host=localhost;dbname=eventManager_db', 'phpmyadmin', 'password');
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $response = $connection->prepare('UPDATE events SET date=?, time=?, lieu_events=?, description_events=? WHERE events_id=?');
    
    // Afficher les valeurs pour le diagnostic
    // var_dump($date, $time, $lieu, $describ, $id);
    
    // Exécuter la requête
    $event = $response->execute([$date, $time, $lieu, $describ, $id]);
    
    // Vérifier le nombre de lignes affectées
    $affectedRows = $response->rowCount();
    // die("Rows affected: " . $affectedRows);
    if($affectedRows>0){
        header('location:../index.php');
    }
    
} catch (PDOException $e) {
    // Afficher l'erreur PDO
    die("Error: " . $e->getMessage());
}
