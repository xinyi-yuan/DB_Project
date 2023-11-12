<!DOCTYPE html>
<html>
<head>
    <title>Contact Info Update</title>
</head>
<body>
    <h1>Enter Employee Contact Info</h1>
    <form method="post">
        Employee ID: <inpute type="number" name="employeeID" required><br>
        Address: <input type="text" name="address" required><br>
        Phone Number: <input type="text" name="phone" required><br>
        Email: <input type="text" name="email" required><br>
        Emergency Contact Number: <input type="text" name="emergencyContact" required><br>
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
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $emergencyContact = $_POST['emergencyContact'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO contactInfo (employeeID, Address, Phone, Email, EmergencyContactNumber) 
    VALUES ('$employeeID', '$addresss', '$phone', '$email', '$emergencyContact')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>