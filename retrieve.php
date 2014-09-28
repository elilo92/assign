<?php
$con=mysqli_connect("127.8.69.130", "adminEWwBIGn", "4PsDAP5ce1x8", "assign");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$employeeID2 = mysqli_real_escape_string($con, $_POST['employeeID2']);
$sdate = mysqli_real_escape_string($con, $_POST['sDate']);
$edate = mysqli_real_escape_string($con, $_POST['eDate']);

$result = mysqli_query($con,"SELECT * FROM time_entries
                            WHERE employeeID = '$employeeID2'
                            AND dDate BETWEEN '$sdate' and '$edate'");

echo "The following entries exist in database for Employee ID: $employeeID2 ";

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