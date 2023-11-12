<!DOCTYPE html>
<html>
<head>
    <title>Contact Info Update</title>
</head>
<body>
    <h1>Enter Employee Contact Info</h1>
    <form method="post">
        Employee ID: <inpute type="number" name="employeeID" required><br>
        Date of Leave: <input type="text" name="DOL" required><br>
        Reasoning: <input type="text" name="reasoning" required><br>
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
    $DOL = $_POST['DOL'];
    $reasoning = $_POST['reasoning'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO PostEmployment (employeeID, DateOfLeave, Reasoning) 
    VALUES ('$employeeID', '$DOL', '$reasoning')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>