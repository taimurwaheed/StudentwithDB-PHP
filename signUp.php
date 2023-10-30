<?php
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    // $target_file = $_POST['picture'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
      }

    require_once("./db.config.php");

    $qry = 'INSERT INTO users (Name, Email, Password, Image) VALUES ("'.$name.'", "'.$email.'", "'.$password.'", "'.$target_file.'")';
    $result = $con->query($qry);
    if($result){
        echo "User Added.";
        echo "<a href='./index.php'>go to Main Menu</a>";
        
    } else {
        echo "No User was Added.";
    }
    $con->close();
?>