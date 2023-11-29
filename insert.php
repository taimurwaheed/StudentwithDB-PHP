<?php
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $rollNo = $_POST['rollNo'];
    $department = $_POST['dept'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];
    
    define('dbHostname','localhost');
    define('dbUsername','root');
    define('dbPassword','');
    define('dbName','webform');

    $con = new mysqli(dbHostname,dbUsername,dbPassword,dbName);

    if($con->connect_error) 
    {
        die("Connection Error".$con->connect_error);
    }
    // $qry = "INSERT INTO Users (name, email, password) VALUES ($name, $email, $password)";
    $qry = 'INSERT INTO student (name, email, phone, roll_no, department, semester, password) VALUES ("'.$name.'", "'.$email.'","'.$phone.'","'.$rollNo.'","'.$department.'","'.$semester.'","'.$password.'")';
    
    $result = $con->query($qry);
    if($result){
        // echo "Data has been saved successfully.";
        header("Location: ./select.php");
    }
    else {
        echo "Data didn't save";
    }
    $con->close();
?>