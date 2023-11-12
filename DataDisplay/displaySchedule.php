<!DOCTYPE html>
<head>
    <title>Experience Info</title>
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

<!-- Buttons that switch to other pages -->
<div class="employee-button">
    <button onclick="window.location.href='display.php';">Employee Page</button>
</div>
<div class="job-button">
    <button onclick="window.location.href='displayJob.php';">Job Page</button>
</div>
<div class="perform-button">
    <button onclick="window.location.href='displayPerform.php';">Performance Page</button>
</div>
<div class="experience-button">
    <button onclick="window.location.href='displayExperience.php';">Experience Page</button>
</div>

<style>
    .employee-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 370px; /* Distance from the right of the parent container */ 
    }
    .job-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 280px; /* Distance from the right of the parent container */ 
    }
    .perform-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 140px; /* Distance from the right of the parent container */ 
    }
    .experience-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 10px; /* Distance from the right of the parent container */ 
    }
</style>

<!-- Search feature filters employee -->
<h2>Search Employee</h2>
<form action="displaySchedule.php" method="post">
    <label for="employeeID">Employee ID:</label>
    <input type="number" id="employeeID" name="employeeID">
    <input type="submit" value="Search" name="searchById">
</form>

<h2>Search Week Number</h2>
<form action="displaySchedule.php" method="post">
<label for="weekNumber">Week Number:</label>
    <input type="number" id="weekNumber" name="weekNumber">
    <input type="submit" value="Find" name="findWeek">
</form>

<!-- See all the data -->
<h2>See All</h2>
<form action="displaySchedule.php" method="get">
    <input type="submit" value="Search">
</form>

<!-- Join Table (Employee, Schedule) -->
<h1> Experience Info </h1>
<table>
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Job</th>
        <th>Week Number</th>
        <th>Hours Worked</th>
        <th>PTO Balance</th>
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

/* If use search feature */
if (isset($_POST["searchByID"])) {
    $employeeID = ($_POST["employeeID"]);

    $sql = "SELECT e.ID, e.Name, e.Job, s.WeekNumber, s.HoursWorked, s.PTOBalance
            FROM Employee e
            LEFT JOIN Schedule s ON s.employeeID = e.ID
            WHERE e.ID = $employeeID
            ORDER BY e.ID ASC"; 
}

/* Search by week number */
elseif (isset($_POST["findWeek"])) {
    $weekNumber = ($_POST["weekNumber"]);

    $sql = "SELECT e.ID, e.Name, e.Job, s.WeekNumber, s.HoursWorked, s.PTOBalance
            FROM Employee e
            LEFT JOIN Schedule s ON s.employeeID = e.ID
            WHERE s.WeekNumber = $weekNumber
            ORDER BY s.WeekNumber ASC";
}

/* Default set up, user will see all the records */
else {
    $sql = "SELECT e.ID, e.Name, e.Job, s.WeekNumber, s.HoursWorked, s.PTOBalance
            FROM Employee e
            LEFT JOIN Schedule s ON s.employeeID = e.ID
            ORDER BY e.ID ASC";           
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID"]. "</td>
            <td>" . $row["Name"]. "</td>
            <td>" . $row["Job"]. "</td>
            <td>" . $row["WeekNumber"]. "</td>
            <td>" . $row["HoursWorked"]. "</td>
            <td>" . $row["PTOBalance"]. "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No results found</td></tr>";
}

?>
</table>
</body>
</html>
