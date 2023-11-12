<!DOCTYPE html>
<html>
<head>
    <title>Employee Experience</title>
</head>
<body>
<h1>Add Employee Experience Info</h1>
    <form action="HRDatabaseHome.html" method="post">
        Employee ID: <input type="number" name="EmployeeID" required><br>
        Type of Experience: <input type="text" name="type" required><br>
        Years of Experience: <input type="number" name="yoe" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";

# Connect to db
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn){
    echo 'Not Connected';
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the HTML form
    $employeeID = $_POST['employeeID'];
    $type = $_POST['type'];
    $yoe = $_POST['yoe'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO Experience (employeeID, Type, YearsOfExperience) 
    VALUES ('$employeeID', '$type', '$yoe')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>