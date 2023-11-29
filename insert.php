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
    $qry = 'INSERT INTO student (Name, Email, Phone, Roll_no, Department, Semester, Password) VALUES ("'.$name.'", "'.$email.'","'.$phone.'","'.$rollNo.'","'.$department.'","'.$semester.'","'.$password.'")';
    
    $result = $con->query($qry);
    if($result){
        echo "Data has been saved successfully.";
    }
    else {
        echo "Data didn't save";
    }
    $con->close();
?>