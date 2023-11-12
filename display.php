<!DOCTYPE html>
<head>
    <title>Employee Info</title>
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
    <div class="job-button">
        <button onclick="window.location.href='displayJob.php';">Job Page</button>
    </div>
    <div class="performance-button">
        <button onclick="window.location.href='displayPerform.php';">Performance Page</button>
    </div>
    <style>
    .job-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 150px; /* Distance from the right of the parent container */ 
    }

    .performance-button {
        position: absolute;
        top: 20px; /* Distance from the top of the parent container */
        right: 10px; /* Distance from the right of the parent container */ 
    }
    </style>
    
    <!-- Search feature -->
    <form action="display.php" method="post">
    <label for="employeeID">Employee ID:</label>
    <input type="number" id="employeeID" name="employeeID">
    <input type="submit" value="Search">
    </form>

<!-- Join Table -->
<h1> Employee Data </h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date Hired</th>
        <th>DOB</th>
        <th>SSN</th>
        <th>Gender</th>
        <th>Job</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Emergency Contact Number</th>
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
    $employeeID = intval($_POST["employeeID"]);

    $sql = "SELECT Employee.ID, Name, DateHired, DOB, SSN, Gender, Job, Address, Phone, Email, EmergencyContactNumber
    FROM Employee
    LEFT JOIN ContactInfo ON Employee.ID = ContactInfo.employeeID
    WHERE employee.ID = $employeeID";
}

else {
    $sql = "SELECT Employee.ID, Name, DateHired, DOB, SSN, Gender, Job, Address, Phone, Email, EmergencyContactNumber
    FROM Employee
    LEFT JOIN ContactInfo ON Employee.ID = ContactInfo.employeeID";
}
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["ID"]. "</td>
            <td>" . $row["Name"]. "</td>
            <td>" . $row["DateHired"]. "</td>
            <td>" . $row["DOB"]. "</td>
            <td>" . $row["SSN"]. "</td>
            <td>" . $row["Gender"]. "</td>
            <td>" . $row["Job"]. "</td>
            <td>" . $row["Address"]. "</td>
            <td>" . $row["Phone"]. "</td>
            <td>" . $row["Email"]. "</td>
            <td>" . $row["EmergencyContactNumber"]. "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}
    $conn->close();
?>
</table>
</body>
</html>
