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
        <h1>Search Employee</h1>
        <button class="top-right-button" onclick="window.location.href='displayJob.php';">Job Page</button>
        <form action="display.php" method="post">
        <label for="employeeID">Employee ID:</label>
        <input type="number" id="employeeID" name="employeeID">
        <input type="submit" value="Search">
        </form>

    <!-- Start of Employee table -->
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
            </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $employeeID = intval($_POST["employeeID"]);
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

            $sql = "SELECT * FROM employee WHERE ID = $employeeID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["ID"]. "</td>
                        <td>" . $row["Name"]. "</td>
                        <td>" . $row["DateHired"]. "</td>
                        <td>" . $row["DOB"]. "</td>
                        <td>" . $row["SSN"]. "</td>
                        <td>" . $row["Gender"]. "</td>
                        <td>" . $row["Job"]. "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No results found</td></tr>";
            }
            $conn->close();
        }
        ?>
        </table>

    <!-- End of Employee table -->

    <!-- Start of Contact Info table -->
    <h1>Contact Information</h1>
        <table>
        <tr>
            <th>EmployeeID</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Emergency Contact Number</th>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $employeeID = intval($_POST["employeeID"]);
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

            $sql = "SELECT EmployeeID, Address, Phone, Email, EmergencyContactNumber FROM contactinfo WHERE EmployeeID = $employeeID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["EmployeeID"]. "</td>
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
        }
        ?>
        </table>
    </body>
</html>