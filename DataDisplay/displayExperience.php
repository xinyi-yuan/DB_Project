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
<div class="schedule-button">
    <button onclick="window.location.href='displaySchedule.php';">Schedule Page</button>
</div>

<style>
    .employee-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 360px; /* Distance from the right of the parent container */ 
    }
    .job-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 270px; /* Distance from the right of the parent container */ 
    }
    .perform-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 130px; /* Distance from the right of the parent container */ 
    }
    .schedule-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 10px; /* Distance from the right of the parent container */ 
    }
</style>

<!-- Search feature filters employee -->
<h2>Search Employee</h2>
<form action="displayExperience.php" method="post">
    <label for="employeeID">Employee ID:</label>
    <input type="number" id="employeeID" name="employeeID">
    <input type="submit" value="Search" name="searchById">
</form>

<!-- Search feature filters present employee -->
<h2>Find Present</h2>
<form action="displayExperience.php" method="get">
    <input type="submit" value="Find" name="findPresent">
</form>

<!-- See all the data -->
<h2>See All</h2>
<form action="displayExperience.php" method="get">
    <input type="submit" value="Search">
</form>

<!-- Join Table (Employee.Name, Experience, PostEmployement) -->
<h1> Experience Info </h1>
<table>
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Past Experience Type</th>
        <th>Years of Experience</th>
        <th>Date Of Leave</th>
        <th>Reasoning</th>
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

if (isset($_POST["searchById"])) {
    $employeeID = intval($_POST["employeeID"]);

    $sql = "SELECT e.ID, e.Name, ex.TYPE, ex.YearsOfExperience, p.DateOfLeave, p.Reasoning
    FROM Employee e
    LEFT JOIN Experience ex ON e.ID = ex.ID
    LEFT JOIN PostEmployment p ON e.ID = p.employeeID
    WHERE e.ID = $employeeID
    ORDER BY e.ID ASC";
}

elseif (isset($_GET["findPresent"])) {
    $sql = "SELECT e.ID, e.Name, ex.TYPE, ex.YearsOfExperience, p.DateOfLeave, p.Reasoning
    FROM Employee e
    LEFT JOIN PostEmployment p ON e.ID = p.employeeID
    LEFT JOIN Experience ex ON e.ID = ex.employeeID
    WHERE p.employeeID IS NULL
    ORDER BY e.ID ASC";
}

else {
    $sql = "SELECT e.ID, e.Name, ex.TYPE, ex.YearsOfExperience, p.DateOfLeave, p.Reasoning
    FROM Employee e
    LEFT JOIN Experience ex ON e.ID = ex.employeeID
    LEFT JOIN PostEmployment p ON e.ID = p.employeeID
    ORDER BY e.ID ASC";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID"]. "</td>
            <td>" . $row["Name"]. "</td>
            <td>" . $row["TYPE"]. "</td>
            <td>" . $row["YearsOfExperience"]. "</td>
            <td>" . $row["DateOfLeave"]. "</td>
            <td>" . $row["Reasoning"]. "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No results found</td></tr>";
}

?>
</table>
</body>
</html>