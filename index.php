<?php
require_once 'api/events/create.php';
require_once 'api/events/read.php';
require_once 'config/auth.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  createEvents();
}
$events = readEvents();
if(!isConnect()){
    redirect_login();
}
isAdmin();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="module" src="js/script.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="LOGO" class="img-fluid" width="50px" height="50px" srcset="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <?php
                    if( isset($_SESSION['users'] )) {
                      echo '
                      <a class="nav-link " href="config/logout.php" >
                      <svg stroke="currentColor" class="text-danger" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"></path><path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path></svg>
                      </a>
                      <a class="nav-link " href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg stroke="currentColor" class="text-success" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>                       
                      '.$_SESSION['users'].'
                      </a>

                        ';

                    }
                ?>
                
                
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>

    <!-- formulaire de création d'evenements accessible que par l'organisateur -->
    <?php
    // var_dump(isConnect());
    if(isset($_SESSION['users']) && $_SESSION['users'] == "admin@gmail.com"){
    echo '
        <div class="container w-50">
            <h3 class="text-center">Create Events</h3>
            <form class="form-group" action="" method="post">
                <div>
                <input class="form-control mb-2" type="date" name="date" placeholder="Date">
            </div>
            <div>
                <input class="form-control mb-2" type="time" name="time" placeholder="Time">
            </div>
            <div>
                <input class="form-control mb-2" type="text" name="lieu_events" placeholder="Lieu">
            </div>
            <div>
                <textarea class="form-control mb-2" type="text" name="description_events" placeholder="Description"></textarea>
            </div>
            <div>
                <input class="form-control mb-2" type="text" name="userID" placeholder="Organisateur"></input>
            </div>
            <div class="m-auto">
                <button type="submit" class=" btn btn-primary" >CREATE</button>
            </div>
        </form>
        </div>
    ';
    }
    ?>
                <!-- fin formulaire de création d'evenements accessible que par l'organisateur -->
    <div class="container w-75">
        <h2 class="text-center">Liste des Evenements</h2>
        <div class="w-50 m-auto">
        <form class="d-flex my-5" >
        <input class="form-control me-2" id="searchEvent" placeholder="Search" >
        <!-- <button class="btn btn-sm btn-outline-success" type="submit">Search</button> -->
      </form>
        </div>
        <table class="table table-dark table-bordered table-columns">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Date</td>
                    <td>Heure</td>
                    <td>Lieu</td>
                    <td>Description</td>
                    <td>Organisateur</td>
                    <td colspan="4" class="text-center">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($events)!==null){?>
                    <?php foreach($events as $event): ?>
                <tr>
                    <td><?=$event['events_id']?></td>
                    <td><?=$event['date']?></td>
                    <td><?=$event['time']?></td>
                    <td><?=$event['lieu_events']?></td>
                    <td><?=$event['description_events']?></td>
                    <td><?=$event['userID']?></td>
                    <td>
                        <a 
                        class="text-decoration-none" 
                        href="show.php?id=<?=$event['events_id']?>"
                        ><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z"></path><path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z"></path></svg></a>
                    </td>
                    <?php
                        if(isset($_SESSION['users']) && $_SESSION['users'] == "admin@gmail.com"){
                        
                        // }else{
                        echo '
                            <td>
                                <a 
                                class="text-decoration-none" 
                                href="api/events/delete.php?id='.$event['events_id'].'"
                                ><svg stroke="currentColor" class="text-danger" fill="currentColor"
                                stroke-width="0" viewBox="0 0 1024 1024" 
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M864 256H736v-80c0-35.3-28.7-64-64-64H352c-35.3 0-64 28.7-64 64v80H160c-17.7 0-32 14.3-32 32v32c0 4.4 3.6 8 8 8h60.4l24.7 523c1.6 34.1 29.8 61 63.9 61h454c34.2 0 62.3-26.8 63.9-61l24.7-523H888c4.4 0 8-3.6 8-8v-32c0-17.7-14.3-32-32-32zm-200 0H360v-72h304v72z">
                                </path></svg></a>
                            </td>
                            <td>
                                <a 
                                class="text-decoration-none" 
                                href="api/events/edit.php?id='.$event['events_id'].'"
                                ><svg stroke="currentColor" class="text-success" fill="currentColor" 
                                stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32zm-622.3-84c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 0 0 0-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 0 0 9.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9z">
                                </path></svg></a>
                            </td>
                        
                        ';
                        }
                    ?>
                </tr>
                <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>

    </div>


















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>