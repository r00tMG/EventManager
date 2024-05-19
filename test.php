<?php
if ($_SERVER[ "REQUEST_METHOD"] == "POST") {
    $id = 'df' ;
    
    $title = $_POST['title'];
    $describ = $_POST['description'] ;
   
    $dsn ='mysql:host=localhost;dbname=data_DB';
    $user = 'phpmyadmin';
    $password = 'password';
    $conn = new PDO($dsn,$user,$password);
    
    $stmt = $conn->prepare("UPDATE events SET title=?, description=? WHERE id=? ");

    $event = $stmt->execute([$title, $describ, $id]);
    var_dump($event);
    var_dump($_POST);
    var_dump($title, $describ, $id);
    if (!$stmt){
        echo "Error preparing statement: " .$conn->errorInfo();
    } 
  
    if ($stmt->execute()){
    echo '<div id="attention">
        <img id-"imgExellent" sre="./picture/update.jpg"
        alt="">
        ch1>Update Event success!</h1>
        <a id="linkHero"
        href="admin.php">Return to Dashboard</a>
        </div>';
    } else {
    echo "Error executing statement: " .$stmt->errorInfo();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="POST">
    <div>
        <input type="hidden" name="id" value="<?=$id?>" placeholder="id">
    </div>
    <div>
        <input type="text" name="title" value="<?=$title?>" placeholder="title">
    </div>
    <div>
        <input type="text" name="description" value="<?=$describ?>" placeholder="description">
    </div>

    <div>
        <input type="submit" name="" placeholder="">
    </div>
    
</form>

</body>
</html>