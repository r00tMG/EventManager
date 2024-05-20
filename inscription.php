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
        $mail->Username   = '';  
        $mail->Password   = '';       
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
        $mail->Port       = 587;                 
    
        
        $mail->setFrom('', 'EventManager');
        $mail->addAddress($email, $email);     
    
        
        $mail->Subject = 'Confirmation d\'inscription a l\'evenement de ' . $eventsByID[0]['usersID'];
        $mail->Body    = 'Merci d\'etre inscrit a l\'evenement: ' . $eventsByID[0]['description_events'] . ' qui aura lieu le ' . $eventsByID[0]['date'] . ' a ' . $eventsByID[0]['time'] . ' a ' . $eventsByID[0]['lieu_events'];
        $mail->AltBody = 'Merci d\'etre inscrit a l\'evenement: ' . $eventsByID[0]['description_events'] . ' qui aura lieu le ' . $eventsByID[0]['date'] . ' a ' . $eventsByID[0]['time'] . ' a ' . $eventsByID[0]['lieu_events'];
    
        $mail->send();
        $success = null;
        if($mail->send()){
            header(
                'Location: index.php'
            );
            exit();
            $success = '
                <script>
                        alert("Un email vous a ete envoye au '.$email.'")
                </script>    
            ';
        }
        
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur Mailer: {$mail->ErrorInfo}";
    }
    