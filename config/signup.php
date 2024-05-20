
<?php
require_once '../api/users/create_user.php';
$user = creat_users();
$success = "";
$error = "";
if($user){
  $success = "Votre inscription est réussie";
}else{
  $error = "Veulliez respectez les données exigées";

}
// var_dump($_POST);
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


<div class="container mt-5 p-5 w-50 bg-light rounded">
  <div class="row mt-5">
    <form action="" method="POST" class="row g-3">
      <h3 class="text-center">S'inscrire</h3>
      <?php
      if($success){
        echo  
        '<div class="alert alert-success">
                  '.$success.'
        </div>';
      }else
            $error;
        ?>
      <div class="col-md-6">
        <input type="text" class="form-control" name="nom" placeholder="Nom">
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="prenom" placeholder="Prenom">
      </div>
      <div class="col-12">
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="col-12">
        <input type="password" class="form-control" name="password" placeholder="password">
      </div>
      <div class="col-12">
        <input type="hidden" class="form-control" name="role" placeholder="Role">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Sign in</button>
      </div>
      <div class="col-12">
          <p>Si vous êtes inscrites,<a href="login.php">Se connecter</a></p>
        </div>
    </form>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>