<?php
ob_start();

$Id = isset($_GET['Id']) ? $_GET['Id'] : '';

if (empty($Id)) {
    header("Location: ./select.php");
    exit();
}

define('dbHostname', 'localhost');
define('dbUsername', 'root');
define('dbPassword', '');
define('dbName', 'webform');

$con = new mysqli(dbHostname, dbUsername, dbPassword, dbName);

if ($con->connect_error) {
    die("Connect Error " . $con->connect_error);
}

// Retrieve user details
$qry = "SELECT * FROM student WHERE Id = ?";
$stmt = $con->prepare($qry);
$stmt->bind_param("i", $Id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    header("Location: ./select.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        // Update operation
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $rollNo = $_POST['rollNo'];
        $department = $_POST['dept'];
        $semester = $_POST['semester'];
        $password = $_POST['password'];

        $qry = "UPDATE student SET
                Name = ?,
                Email = ?,
                Phone = ?,
                Roll_no = ?,
                Department = ?,
                Semester = ?,
                Password = ?
                WHERE Id = ?";

        $stmt = $con->prepare($qry);
        $stmt->bind_param("sssssssi", $name, $email, $phone, $rollNo, $department, $semester, $password, $Id);
        $stmt->execute();
        $stmt->close();

        header("Location:./select.php");
        exit();
    } elseif (isset($_POST['delete'])) {
        // Delete operation
        $qry = "DELETE FROM student WHERE Id = ?";

        $stmt = $con->prepare($qry);
        $stmt->bind_param("i", $Id);
        $stmt->execute();
        $stmt->close();

        header("Location:./select.php");
        exit();
    }
}

$con->close();
ob_end_flush();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update User Record</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="./update.php" method="post">
        <div class="div-margin">
          <label for="name"> Please Enter your name:</label>
          <input type="text" name="name" id="name" value="<?php echo isset($row['name']) ? $row['name'] : '' ?>" required />
        </div>

        <div class="div-margin">
          <label for="email"> Please Enter your Email:</label>
          <input type="email" name="email" id="email" value="<?php echo isset($row['email']) ? $row['email'] : '' ?>" required />
        </div>

        <div class="div-margin">
          <label for="phone"> Please Enter your Phone#:</label>
          <input type="text" name="phone" id="phone" maxlength="11" value="<?php echo isset($row['phone']) ? $row['phone'] : '' ?>" />
        </div>

        <div class="div-margin">
          <label for="rollNo"> Please Enter your Roll No:</label>
          <input type="text" name="rollNo" id="rollNo" max="5" value="<?php echo isset($row['rollNo']) ? $row['rollNo'] : '' ?>" />
        </div>
        
        <div class="div-margin">
            <label for="dept">Please Enter your Department:</label>
            <select name="dept" id="dept">
                <option value="select" disabled selected>Select</option>
                <option value="SE" <?php echo isset($row['dept']) && $row['dept'] == 'SE' ? 'selected' : ''?>>SE</option>
                <option value="CS" <?php echo isset($row['dept']) && $row['dept'] == 'CS' ? 'selected' : ''?>>CS</option>
                <option value="IT" <?php echo isset($row['dept']) && $row['dept'] == 'IT' ? 'selected' : ''?>>IT</option>
                <option value="AI" <?php echo isset($row['dept']) && $row['dept'] == 'AI' ? 'selected' : ''?>>AI</option>
            </select>
        </div>

        <div class="div-margin">
          <label for="semester"> Please Enter your Semester:</label>
          <input type="number" name="semester" id="semester" min="1" max="8" value="<?php echo isset($row['semester']) ? $row['semester'] : '' ?>"/>
        </div>

        <div class="div-margin">
          <label for="password"> Please Enter your Password:</label>
          <input type="password" name="password" id="password" value="<?php echo isset($row['password']) ? $row['password'] : '' ?>"/>
        </div>

        <div class="div-margin center">
          <input type="submit" id="button" name="button" value="save" />
        </div>
      </form>
    <form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
        <input type="hidden" name="Id" value="<?php echo isset($row['Id']) ? $row['Id'] : '' ?>">
        <button type="submit" name="delete">Delete</button>
    </form>
</body>
</html>