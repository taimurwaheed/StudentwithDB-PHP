<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select</title>
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
                <td><a href="../Employee/index.php"><button type="button">Employee Details</button></a></td>
            </tr>
            <tr>
                <td><a href="../Product/index.php"><button type="button">Product Details</button></a></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
