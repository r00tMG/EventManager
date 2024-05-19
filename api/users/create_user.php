<?php
function creat_users(){
   
        $cnx = new PDO('mysql:host=localhost;dbname=eventManager_db','phpmyadmin','password');
        if(
            isset($_POST['nom']) &&
            isset($_POST['prenom']) &&
            isset($_POST['email']) &&
            isset($_POST['password']) &&
            isset($_POST['role'])
            && $_SERVER['REQUEST_METHOD'] === "POST"
        ){
            $nom = $_POST['nom'] ;
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            
            $rp = $cnx->prepare("INSERT INTO users(nom,prenom,email,password,role) VALUES(?, ?, ?, ?, ?)");
            // var_dump($_POST);
                    
    // var_dump([$nom,$prenom,$email,$password,$role]);
     $rp->execute([$nom,$prenom,$email,$password,$role]);
    // if (!$user) {
    //    throw new Exception("Error Processing Request"); 
    // }else{
        // var_dump($user);
        // return $user;
    // }
}
}
$user = creat_users();
// var_dump($user);

?>