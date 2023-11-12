<!DOCTYPE html>
<html>
<head>
    <title>Employee Data Entry</title>
</head>
<body>
<h1>Enter Employee Salary Info</h1>
    <form method="post">
        Employee ID: <inpute type="number" name="employeeID" required><br>
        Salary Amount: <input type="text" name="salary" required><br>
        Pay Period: <input type="text" name="payPeriod" required><br>
        Start Date: <input type="date" name="startDate" required><br>
        End Date: <input type="text" name="endDate" required><br>
        Bonus/Deduction: <input type="text" name="varPay" required><br>
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
    $salary = $_POST['salary'];
    $payPeriod = $_POST['payPeriod'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $varPay = $_POST['varPay'];

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO Salary (employeeID, SalaryAmount, PayPeriod, SalaryStartDate, SalaryEndDate, BonusDeductions) 
    VALUES ('$employeeID', '$salary', '$payPeriod', '$startDate', '$endDate', '$$varPay')";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>