<?php 
// var_dump($_GET);
// var_dump($_POST);

    
    $id = $_GET['id'] ?? null;
    $date=$_POST['date'] ?? null;
    $time=$_POST['time'] ?? null ;
    $lieu=$_POST['lieu_events'] ?? null;
    $describ=$_POST['description_events'] ?? null;
    $userID=$_POST['userID'] ?? null;
    $connection = new PDO('mysql:host=localhost; dbname=eventManager_db', 'phpmyadmin', 'password');
    // $response = $connection->prepare('UPDATE events SET date=?, time=?, lieu_events=?, description_events=? WHERE events_id=?');
    $response = $connection->prepare('SELECT *FROM events WHERE events_id=?');
    $response->execute([$id]); 
    $event = $response->fetch(PDO::FETCH_ASSOC);
    // print_r($event);
    // header('location: ../index.php');


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <h3 class="text-center">Update events</h3>
    <?php
       
    ?>
    
    <form class="form-group" action="update.php" method="POST">
        <div >
            <input class="form-control mb-2" type="hidden" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>" name="id" placeholder="Id">
        </div>
        <div >
            <input class="form-control mb-2" type="date" value="<?=$event['date'];?>" name="date" placeholder="Date">
        </div>
        <div >
            <input class="form-control mb-2" type="time" value="<?=$event['time']?>" name="time" placeholder="Time">
        </div>
        <div >
            <input class="form-control mb-2" type="text" value="<?=$event['lieu_events'];?>"  name="lieu_events" placeholder="Lieu">
        </div>
        <div >
            <input class="form-control mb-2" type="text" value="<?=$event['description_events'];?>"   name="description_events" placeholder="Description">
        </div>
        <div >
            <input class="form-control mb-2" type="text" value="<?=$event['userID'];?>"   name="userID" placeholder="Organisateur">
        </div>
        <div class="m-auto">
            <button type="submit" class=" btn btn-primary">Edit</button>
        </div>
    </form>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>