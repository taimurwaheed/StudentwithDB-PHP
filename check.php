<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
        <form action="" method="post">
            <table>
                <tr>
                    <th colspan="3"><h2>Login</h2></th>
                </tr>
                <tr>
                    <td><label for="Email">Email</label></td>
                    <td colspan="2"><input type="email" name="Email" id="Email" placeholder="abc123@example.com"></td>
                </tr>
                <tr>
                    <td><label for="Password">Password</label></td>
                    <td colspan="2"><input type="password" name="Password" id="Password" placeholder="********"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="btnSignIn" value="Sign in"></td>
                </tr>
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

<?php
require_once("./db.config.php");

if (isset($_POST['btnSignIn'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $qry = "SELECT * FROM users WHERE Email=? AND Password=?";
    $stmt = $con->prepare($qry);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $row['Id'];
        $_SESSION['user_name'] = $row['name'];
        header("Location: ./index.php");
        exit();
    } else {
        echo "Credentials didn't match";
    }

    $stmt->close();
    $con->close();
}
?>
