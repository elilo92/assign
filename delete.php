<?php
$con=mysqli_connect("localhost", "root", "", "assign");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$employeeID = mysqli_real_escape_string($con, $_POST['employeeID']);

$result = mysqli_query($con,"SELECT * FROM time_entries
                            WHERE employeeID = '$employeeID'");

echo "The following entries are deleted from the database for Employee ID: $employeeID ";

echo "<table border='1'>
<tr>
<th>Employee ID</th>
<th>Date</th>
<th>Hours</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['employeeID'] . "</td>";
    echo "<td>" . $row['dDate'] . "</td>";
    echo "<td>" . $row['hours'] . "</td>";
    echo "</tr>";
}

echo "</table>";

$result2 = mysqli_query($con,"DELETE FROM time_entries
                            WHERE employeeID = '$employeeID'");

mysqli_close($con);
?>