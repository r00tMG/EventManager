<?php

require_once 'api/events/read.php';
require_once 'config/auth.php';
if(!isConnect()){
  redirect_login();
} 
$events = readEvents();
$eventsByID = [];
$id = $_GET['id'];
$email = $_GET['email'];
foreach($events as $event){
  if (isset($id) && $id == $event['events_id'] ) {
    $eventsByID[] = $event;
  }
}
// var_dump($_SESSION)ππ

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails d'un Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="module" src="js/script.js"></script>

  </head>
  <body>



  <div class="container mt-5">
  <div class="card w-75 mt-5 m-auto" style="width: 18rem;">
  <?php
  // if(isset($error)){
  //   echo '
  //     <div class="alert alert-success">
  //         '.$id.'
  //     </div>
  //   ';
  // }
  ?>
  <div class="card-body">
    <p class="card-text text-center text-primary fs-3">
      <strong>Event By <?=$eventsByID[0]['userID']?></strong> 
    </p>
  </div>
  <ul class="list-group list-group-flush fs-3">
    <li class="list-group-item text-center fs-3"><strong>Description:</strong> <?=$eventsByID[0]['description_events']?></li>
    <li class="list-group-item text-center fs-3"><strong>Lieu:</strong> <?=$eventsByID[0]['lieu_events']?></li>
    <li class="list-group-item text-center fs-3"><strong>Date:</strong> <?=$eventsByID[0]['date']?></li>
    <li class="list-group-item text-center fs-3"><strong>Heure:</strong> <?=$eventsByID[0]['time']?></li>
    <li class="list-group-item text-center fs-3"><strong>Organisateur:</strong> <?=$eventsByID[0]['userID']?></li>
  </ul>
  <div class="card-body m-auto">
    <!-- <a href="#" class="card-link text-center"></a> -->
    <!-- Button trigger modal -->
    
    <a type="submit" href="index.php" class="btn btn-primary me-auto" >
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M946.5 505L534.6 93.4a31.93 31.93 0 0 0-45.2 0L77.5 505c-12 12-18.8 28.3-18.8 45.3 0 35.3 28.7 64 64 64h43.4V908c0 17.7 14.3 32 32 32H448V716h112v224h265.9c17.7 0 32-14.3 32-32V614.3h43.4c17 0 33.3-6.7 45.3-18.8 24.9-25 24.9-65.5-.1-90.5z"></path></svg>
      </a>
      <?php
      // var_dump($eventsByID);
      // echo 
      '
      <a 
      class="text-decoration-none btn btn-primary" id="inscription"
      href="inscription.php?id='.$eventsByID[0]['events_id'].'&email='.$_SESSION['users'].'"
      >
      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 14 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 6.75V12h4V8h1v4c0 .55-.45 1-1 1H7v3l-5.45-2.72c-.33-.17-.55-.52-.55-.91V1c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v3h-1V1H3l4 2v2.25L10 3v2h4v2h-4v2L7 6.75z"></path></svg>                        </a>
      ';

      ?>
    <!-- <a type="submit" name="inscription" href="inscription.php?id=" class="btn btn-primary me-auto">
    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 14 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7 6.75V12h4V8h1v4c0 .55-.45 1-1 1H7v3l-5.45-2.72c-.33-.17-.55-.52-.55-.91V1c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v3h-1V1H3l4 2v2.25L10 3v2h4v2h-4v2L7 6.75z"></path></svg>                        </a>
      </a> -->

  </div>
  </div>
</div>





  

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>