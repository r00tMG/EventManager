<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once 'api/events/read.php';
require_once 'config/auth.php';
if(!isConnect()){
  redirect_login();
} 
// var_dump($_SESSION['users']) ;
// var_dump(str) ;
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
  
 

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
  //     var_dump($to,$from);

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
        $mail->Username = 'meissagningue0@gmail.com';
        $mail->Password = 'uqas alni pxlg lpxk';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
        $mail->IsHTML(true);
        $mail->From="meissagningue0@gmail.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
            $error = "Merci, nous vous avons envoyé un email de confirmation .";  
            return $error;
          }
    }
    if(
      isset($email) && 
    $_SERVER['REQUEST_METHOD']==="POST" &&
    isset($eventsByID[0]['usersID']) &&
    isset($eventsByID[0]['date']) &&
    isset($eventsByID[0]['time']) &&
    isset($eventsByID[0]['lieu_events']) && 
    isset($eventsByID[0]['description_events']) 
    ){
    $to   = ''.$email.'';
    $from = 'meissagningue0@gmail.com';
    $name = 'EventManager';
    $subj = 'Confirmation d\'inscription a l\'evenement de '.$eventsByID[0]['usersID'].'';
    $msg = 'Merci  d\'etre inscrite a l\'evenement: '.$eventsByID[0]['description_events'].' qui aura lieu le '.$eventsByID[0]['date'].' a '.$eventsByID[0]['time'].' a '.$eventsByID[0]['lieu_events'].'';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    echo '<pre>';
    var_dump($_SERVER);
    echo '</pre>';
    }

?>

<!-- <html>
    <head>
        <title>PHPMailer 5.2 testing from DomainRacer</title>
    </head>
    <body style="background: black;">
        <center><h2 style="padding-top:70px;color: white;"><?php echo $error; ?></h2></center>
    </body>
    
</html> -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détails d'un Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>



  <div class="container mt-5">
  <div class="card w-75 mt-5 m-auto" style="width: 18rem;">
  <?php
  if(isset($error)){
    echo '
      <div class="alert alert-success">
          '.$error.'
      </div>
    ';
  }
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
    
    <form action="" method="post">
    <button type="submit" name="inscription" class="btn btn-primary me-auto" >
        S'inscrire
      </button>
    </form>
    <button class="me-auto btn btn-primary"><a href="index.php" class="text-light text-decoration-none ">Home</a></button>
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-4 text-center" id="exampleModalLabel">Confirmation de votre inscription</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <?php
              // if($){

              // }
            ?>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary"></button>
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div> -->
  </div>
</div>
  </div>





  

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>