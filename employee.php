
<!DOCTYPE html>
<html>
<head>
    <title>Employee Data Entry</title>
</head>
<body>
    <h1>Enter Employee Information</h1>
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Date Hired: <input type="date" name="dateHired" required><br>
        Date of Birth: <input type="date" name="dob" required><br>
        SSN: <input type="text" name="ssn" required><br>
        Gender: <input type="text" name="gender" required><br>
        Job: <input type="text" name="job" required><br>
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
    $name = $_POST['name'];
    $dateHired = $_POST['dateHired'];
    $dob = $_POST['dob'];
    $ssn = $_POST['ssn'];
    $gender = $_POST['gender'];
    $job = $_POST['job'];

    // Prepare and execute the SQL statement
    //fix snn
    $sql = "INSERT INTO employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ('$name', '$dateHired', '$dob', '$ssn', '$gender', '$job')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>