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
<h2>Search Job</h2>

<!-- Buttons that switch to other pages -->
<div class="employee-button">
    <button onclick="window.location.href='display.php';">Employee Page</button>
</div>
<div class="performance-button">
    <button onclick="window.location.href='displayPerform.php';">Performance Page</button> 
</div>
<div class="experience-button">
    <button onclick="window.location.href='displayExperience.php';">Experience Page</button>
</div>
<div class="schedule-button">
    <button onclick="window.location.href='displaySchedule.php';">Schedule Page</button>
</div>
<style>
    .employee-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 400px; /* Distance from the right of the parent container */ 
    }
    .performance-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 260px; /* Distance from the right of the parent container */ 
    }
    .experience-button {
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

<!-- Search feature -->
<form action="displayJob.php" method="post">
<label for="jobID">Job ID:</label>
<input type="number" id="jobID" name="jobID">
<input type="submit" value="Search">
</form>

<!-- See all the data -->
<h2>See All</h2>
<form action="displayJob.php" method="get">
    <input type="submit" value="Search">
</form>

<h1>Job Info</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Manager ID</th>
        <th>Job Title</th>
        <th>Type</th>
        <th>Years of Experience</th>
        <th>Training Name</th>
        <th>Training Duration (Days)</th>
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
    $jobID = ($_POST["jobID"]);
    
    $sql = "SELECT Jobs.ID, Jobs.ManagerID, Jobs.JobTitle, JobRequiredExp.Type, JobRequiredExp.YearsOfExp, TrainingRequired.Name, TrainingRequired.DurationDays 
            FROM Jobs
            LEFT JOIN JobRequiredExp ON Jobs.ID = JobRequiredExp.JobID
            LEFT JOIN TrainingRequired ON Jobs.ID = TrainingRequired.JobID
            WHERE Jobs.ID = $jobID
            ORDER BY Jobs.ID ASC";
}
else {
    // SQL to fetch data from joined table
    $sql = "SELECT Jobs.ID, Jobs.ManagerID, Jobs.JobTitle, JobRequiredExp.Type, JobRequiredExp.YearsOfExp, TrainingRequired.Name, TrainingRequired.DurationDays 
            FROM Jobs
            LEFT JOIN JobRequiredExp ON Jobs.ID = JobRequiredExp.JobID
            LEFT JOIN TrainingRequired ON Jobs.ID = TrainingRequired.JobID
            ORDER BY Jobs.ID ASC";
}

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID"]. "</td>
            <td>" . $row["ManagerID"]. "</td>
            <td>" . $row["JobTitle"]. "</td>
            <td>" . $row["Type"]. "</td>
            <td>" . $row["YearsOfExp"]. "</td>
            <td>" . $row["Name"]. "</td>
            <td>" . $row["DurationDays"]. "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No results found</td></tr>";
}

$conn->close();
?>
</table>
</body>
</html>
