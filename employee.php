<?php
    include "connection.php";

    $select_sql="SELECT * FROM employee";
    $result = $conn->query($select_sql);

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];
    }

    $insert_sql = "INSERT INTO employee (first_name, last_name, department, salary) VALUES ('$firstname', '$lastname', '$department', '$salary')";
    $conn->query($insert_sql);
    echo "New Employee Added!<br>";
    header("location: ". $_SERVER['PHP_SELF']);
    exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Insert Employee</h2>
    <form action="" method="POST">
        <input type="text" name="fname" placeholder="first_name"><br>
        <input type="text" name="lname" placeholder="last_name"><br>
        <input type="text" name="department" placeholder="department"><br>
        <input type="text" name="salary" placeholder="salary"><br><br>
        <button type="submit" name="Insert">Insert</button>
    </form>
    <h2>Employee</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Department</th>
            <th>Salary</th>
        </tr>

        <?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['department']}</td>
                            <td>{$row['salary']}</td>
                        </tr>";
                    }

                }
        ?>
    </table>
    
</body>
</html>