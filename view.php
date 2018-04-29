<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<?php
$servername = "localhost";
$username = "venkat";
$password = "root";
$dbname = "course";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id,course_id, course_name, course_type FROM courses";
$result = $conn->query($sql);

    echo "<table>
    <tr>
        <th>S.N</th>
        <th>Course Id</th>
        <th>Course Name</th>
		<th>Course Type</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['course_id'] . "</td>";
        echo "<td>" . $row['course_name'] . "</td>";
		echo "<td>" . $row['course_type'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
 // else { echo "0 results"; }
?>
