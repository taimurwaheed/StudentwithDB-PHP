<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="./insertuserform.html">Add New Record</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Roll No</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Password</th>
            <th>Action</th> <!-- Add an Action column for Edit -->
        </tr> 

        <?php
            define('dbHostname', 'localhost');
            define('dbUsername', 'root');
            define('dbPassword', '');
            define('dbName', 'webform');

            $con = new mysqli(dbHostname, dbUsername, dbPassword, dbName);

            if ($con->connect_error) { 
                die("Connect Error " . $con->connect_error);
            }

            $qry = "SELECT * FROM student";

            $result = $con->query($qry);

            while ($row = $result->fetch_assoc()) {
                $Id = isset($row['Id']) ? $row['Id'] : '';
                
                echo "<tr>
                    <td>".$Id."</td>
                    <td>".$row['Name']."</td>
                    <td>".$row['Email']."</td>
                    <td>".$row['Phone']."</td>
                    <td>".$row['Roll_no']."</td>
                    <td>".$row['Department']."</td>
                    <td>".$row['Semester']."</td>
                    <td>".$row['Password']."</td>
                    <td>
                        <a href='./edit.php?Id=".$Id."'>Edit</a>
                    </td>
                </tr>";
            }
            $con->close();
        ?>
    </table>
</body>
</html>
