<!DOCTYPE html>
<html>
<head>
    <title>Update Job Manager</title>
</head>
<body>
    <h1>Update Job Manager</h1>
    <form method="post">
        Job ID: <inpute type="number" name="jobID" required><br>
        Enter New Manager's Employee ID: <input type="number" name="managerID" required><br>
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
    $jobID = $_POST['jobID'];
    $managerID = $_POST['managerID'];
   

    // Prepare and execute the SQL statement
    $sql = "UPDATE Jobs SET managerID = '$managerID' WHERE ID = '$jobID'";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>