<?php
$con=mysqli_connect("localhost", "root", "", "assign");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$employeeID = mysqli_real_escape_string($con, $_POST['employeeID']);
$date = mysqli_real_escape_string($con, $_POST['date']);
$hours = mysqli_real_escape_string($con, $_POST['hours']);

$sql="INSERT INTO time_entries (employeeID, dDate, hours)
VALUES ('$employeeID', '$date', '$hours')";

if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}

$result = mysqli_query($con,"SELECT * FROM time_entries
                            WHERE employeeID = '$employeeID'
                            AND dDate = '$date'");

echo "The following entry is saved in database successfully!";

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

mysqli_close($con);
?>