<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    require_once("./db.config.php");

    $qry = "SELECT * FROM users WHERE LOWER(Email) = LOWER(?)";
    $stmt = $con->prepare($qry);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['Password'])) {
            $_SESSION['user_id'] = $row['Id'];
            $_SESSION['user_name'] = $row['Name'];
            header("Location: ./index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $con->close();
}
?>
