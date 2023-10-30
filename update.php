<?php
$Id = $_POST['Id'];
$name = $_POST['name'];
$email = $_POST['email']; 
$phone = $_POST['phone'];
$rollNo = $_POST['rollNo'];
$department = $_POST['dept'];
$semester = $_POST['semester'];
$password = $_POST['password'];

define('dbHostname', 'localhost');
define('dbUsername', 'root');
define('dbPassword', '');
define('dbName', 'webform');

$con = new mysqli(dbHostname, dbUsername, dbPassword, dbName);

if ($con->connect_error) {
    die("Connection Error" . $con->connect_error);
}

$qry = "UPDATE student SET
    Name = '$name',
    Email = '$email',
    Phone = '$phone',
    Roll_no = '$rollNo',
    Department = '$department',
    Semester = '$semester',
    Password = '$password'
    WHERE Id='$Id'";

echo $qry;

$result = $con->query($qry);

if ($result) {
    header("Location: ./select.php");
    exit();
} else {
    echo "Data didn't update: " . $con->error;
}

$con->close();
?>
