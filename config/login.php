<?php

require_once 'auth.php';
require_once '../api/users/read_user.php';
$users = read_user();
$error = null;
for($i=0; $i<count($users); $i++){

if(isset($_POST['email'],$_POST['password']) && $_SERVER['REQUEST_METHOD']==="POST"){
  $username = $_POST['email'];
  $password = $_POST['password'];

  $hash = password_hash($users[$i]['password'],PASSWORD_BCRYPT,['cost'=>12]);
  if($users[$i]['email'] === $username && password_verify($password,$hash)){
      session_start();
      $_SESSION['users']=$users[$i]['email'];
      header('location: ../index.php');
      exit();
  }else{
    $error="Veuillez verifier vos informations";
  }
}
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

<div class="container w-50 bg-light rounded p-5 my-5">
  <div class="row mt-5">
    <form action="" method="POST">
      <?php
          if($error){
            echo '
            <div class="alert alert-danger">
                  '.$error.'
            </div>
            ';
          }
      ?>
      <div class="mb-3">
        <h3 class="text-center">Se Connecter</h3>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" name="email" placeholder="Email" >
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Connexion</button>
      </div>
      <div class="">
        <p>Si vous n'êtes pas inscrites,<a href="signup.php">S'inscrire</a></p>
      </div>
  </form>
  </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>