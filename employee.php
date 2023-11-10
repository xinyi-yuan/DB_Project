
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
        SSN: <input type="text" name="snn" required><br>
        Gender: <input type="text" name="gender" required><br>
        Job: <input type="text" name="job" required><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <br>
    <h1>Enter Employee Contact Info</h1>
    <form method="post">
        Address: <input type="text" name="address" required><br>
        Phone Number: <input type="text" name="phone" required><br>
        Email: <input type="text" name="email" required><br>
        Emergency Contact Number: <input type="text" name="emergencyContact" required><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <br>
    <h1>Enter Employee Salary Info</h1>
    <form method="post">
        Salary Amount: <input type="text" name="salary" required><br>
        Pay Period: <input type="text" name="payPeriod" required><br>
        Start Date: <input type="date" name="startDate" required><br>
        End Date: <input type="text" name="endDate" required><br>
        Bonus/Deduction: <input type="text" name="varPay" required><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <br>
    <!--need to add post employment, schedule, performance, and experience entries-->
</body>
</html>


<?
// from previous assignment
/*
$servername = "localhost";
$username = "pi";
$password = "raspberry";
$dbname = "DVM";

# Connect to db
$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the HTML form
    $license = $_POST['license'];
    $state = $_POST['state'];
    $last = $_POST['last'];
    $first = $_POST['first'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO Persons (License, State, Last, First, Phone, Email) VALUES ('$license', '$state', '$last', '$first', '$phone', '$email')");
    if ($stmt->execute()) {
        // Redirect to the second PHP file (car.php)
        header("Location: car.php");
        exit;
    }
    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
*/
?>