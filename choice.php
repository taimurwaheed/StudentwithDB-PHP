<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* styles.css */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

div {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

a {
    text-decoration: none;
    color: #3498db;
}

a:hover {
    color: #207cca;
}

table {
    width: 100%;
}

button {
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    border: none;
    padding: 8px 16px;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin-bottom: 10px;
    border-radius: 4px;
}

button:hover {
    background-color: #207cca;
}

    </style>
</head>
<body>

<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo "Logged in as : ";
    echo $_SESSION['user_name'];
    echo "<br><a href='./logout.php'>Logout</a>";
} else {
    echo "<br><a href='./signIn.html'>Sign in</a>";
    echo "<br><a href='./signUp.html'>Sign up</a>";
}
?>

<div>
    <form action="">
        <table>
            <tr>
                <td><a href="./index.php"><button type="button">Student Details</button></a></td>
            </tr>
            <tr>
                <td><a href="../Employee/select.php"><button type="button">Employee Details</button></a></td>
            </tr>
            <tr>
                <td><a href="../Product/select.php"><button type="button">Product Details</button></a></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
