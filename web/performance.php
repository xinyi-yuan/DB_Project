<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance</title>
</head>
<body>
    <h1>Enter Employee Perfomance Info</h1>
    <form method="post">
        Employee ID: <inpute type="number" name="employeeID" required><br>
        Date of Review: <input type="date" name="reviewDate" required><br>
        Rating: <input type="text" name="rating" required><br>
        Feedback: <input type="text" name="feedback" required><br>
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
    $reviewDate = $_POST['reviewDate'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO Performance (employeeID, ReviewDate, Rating, Feedback) 
    VALUES ('$employeeID', '$reviewDate', '$rating', '$feedback')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>