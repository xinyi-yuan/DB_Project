<!DOCTYPE html>
<head>
    <title>Job Info</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .top-right-button {
            position: absolute;
            top: 20px; 
            right: 20px;
        }
    </style>
</head>
<body>
    <h2>Search Employee</h2>

    <!-- Buttons that switch to other pages -->
    <div class="employee-button">
        <button onclick="window.location.href='display.php';">Employee Page</button>
    </div>
    <div class="job-button">
        <button onclick="window.location.href='displayJob.php';">Job Page</button>
    </div>
    <style>
    .employee-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 100px; /* Distance from the right of the parent container */ 
    }

    .job-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 10px; /* Distance from the right of the parent container */ 
    }
    </style>
    
    <!-- Search feature -->
    <form action="displayPerform.php" method="post">
    <label for="employeeID">Employee ID:</label>
    <input type="number" id="employeeID" name="employeeID">
    <label for="salaryID">Salary ID:</label>
    <input type="number" id="salaryID" name="salaryID">
    <input type="submit" value="Search">
    </form>

<h1> Performance And Salary </h1>
<table>
    <tr>
        <th>Name</th>
        <th>Date Hired</th>
        <th>DOB</th>
        <th>Salary Amount</th>
        <th>Pay Period</th>
        <th>Salary Start Date</th>
        <th>Salary End Date</th>
        <th>Bonus/Deductions</th>
        <th>Review Date</th>
        <th>Rating</th>
        <th>Feedback</th>
    </tr>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeID = ($_POST["employeeID"]);
    $salaryID = ($_POST["salaryID"]);

    $sql = "SELECT e.Name, e.DateHired, e.DOB, s.SalaryAmount, s.PayPeriod, s.SalaryStartDate, s.SalaryEndDate, s.BonusDeductions, 
                    p.ReviewDate, p.Rating, p.Feedback
            FROM Performance p
            LEFT JOIN Employee e ON p.employeeID = e.ID
            LEFT JOIN Salary s ON p.employeeID = s.employeeID
            WHERE p.employeeID = $employeeID AND p.salaryID = $salaryID"; 
}
else {
    $sql = "SELECT e.Name, e.DateHired, e.DOB, s.SalaryAmount, s.PayPeriod, s.SalaryStartDate, s.SalaryEndDate, s.BonusDeductions, 
                    p.ReviewDate, p.Rating, p.Feedback
            FROM Performance p
            LEFT JOIN Employee e ON p.employeeID = e.ID
            LEFT JOIN Salary s ON p.employeeID = s.employeeID ";           
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["Name"]. "</td>
            <td>" . $row["DateHired"]. "</td>
            <td>" . $row["DOB"]. "</td>
            <td>" . $row["SalaryAmount"]. "</td>
            <td>" . $row["PayPeriod"]. "</td>
            <td>" . $row["SalaryStartDate"]. "</td>
            <td>" . $row["SalaryEndDate"]. "</td>
            <td>" . $row["BonusDeductions"]. "</td>
            <td>" . $row["ReviewDate"]. "</td>
            <td>" . $row["Rating"]. "</td>
            <td>" . $row["Feedback"]. "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}
?>
</table>