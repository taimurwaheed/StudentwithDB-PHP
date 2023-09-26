<?php
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $phone = $_POST['phone'];
    $rollNo = $_POST['rollNo'];
    $department = $_POST['dept'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];

    // echo 'Name:'.$name;
    // echo "email".$email;
    // echo "password".$password;
    
    define('dbHostname','localhost');
    define('dbUsername','root');
    define('dbPassword','');
    define('dbName','webform');

    $con = new mysqli(dbHostname,dbUsername,dbPassword,dbName);
    
    // $con = new mysqli("localhost","root","","webform");

    /*
    1- Establish the connection
    2- Open up the connection
    3- make a query
    4- execute the query
    5- according to the query get the result
    6- close the connection
    majority we have four types of queries: insert, delete & search/select
    In which insert, update, delete are going to return boolean either the data saved or delete or not
    search/select is going to return the dataset
    */
    
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