<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'vendor/autoload.php';
require_once 'api/events/read.php';
require_once 'config/auth.php';
if(!isConnect()){
  redirect_login();
} 
$events = readEvents();
//  var_dump($events[0]['events_id']);
$eventsByID = [];
$id = $_GET['id'];
$email = $_GET['email'];
foreach($events as $event){
  if (isset($id) && $id == $event['events_id'] ) {
    $eventsByID[] = $event;
  }
}

try {



    $mail = new PHPMailer(true);
    
        
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host       = 'smtp.gmail.com';  
        $mail->SMTPAuth   = true;                
        $mail->Username   = 'meissagningue0@gmail.com';  
        $mail->Password   = 'uqas alni pxlg lpxk';       
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
        $mail->Port       = 587;                 
    
        
        $mail->setFrom('meissagningue0@gmail.com', 'EventManager');
        $mail->addAddress($email, $email);     
    
        if(isset($eventsByID[0]['userID'])){

          $mail->Subject = 'Confirmation d\'inscription a l\'evenement de ' . $eventsByID[0]['userID'];
          $mail->Body    = 'Merci d\'etre inscrit a l\'evenement: ' . $eventsByID[0]['description_events'] . ' qui aura lieu le ' . $eventsByID[0]['date'] . ' a ' . $eventsByID[0]['time'] . ' a ' . $eventsByID[0]['lieu_events'];
          $mail->AltBody = 'Merci d\'etre inscrit a l\'evenement: ' . $eventsByID[0]['description_events'] . ' qui aura lieu le ' . $eventsByID[0]['date'] . ' a ' . $eventsByID[0]['time'] . ' a ' . $eventsByID[0]['lieu_events'];
      
        }    
        $mail->send();
        $success = null;
        if($mail->send()){
          
            
            echo '
              <script>
                alert("Un email vous a ete envoye au '.$email.'")
              </script>    
          ';
        }
      

        
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur Mailer: {$mail->ErrorInfo}";
    }

?>  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
   
  <header>
      <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">
            <img src="img/logo.png" alt="LOGO" class="img-fluid" width="50px" height="50px" srcset="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
              <?php

                    if( isset($_SESSION['users'] )) {
                      echo '
                      <a class="nav-link " href="config/logout.php" >
                      <svg stroke="currentColor" class="text-danger" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 13L16 11 7 11 7 8 2 12 7 16 7 13z"></path><path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path></svg>
                      </a>
                      <form method="POST">
                      <a class="nav-link " type="submit" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <svg stroke="currentColor" class="text-success" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>                       
                      '.$_SESSION['users'].'
                      </a>
                      <form>

                        ';
                    }else{
                      echo '
                      <a class="nav-link " href="config/login.php" >
                      <svg stroke="currentColor" class="text-primary" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M13 16L18 12 13 8 13 11 4 11 4 13 13 13z"></path><path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path></svg>                      </a>
                      ';
                    }

                ?>
                
                
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>  
<div class="container bg-light m-auto w-25">
    <p class="text-center">Merci d'être inscrite à notre évenement<a href="index.php">Home</a></p>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>