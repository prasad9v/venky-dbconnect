<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
</head>

<body>

    <?php
$q = $_GET['q'];

$dbservername = 'localhost';
$username= 'root';
$password='';
$databasename = '';

$con = mysqli_connect($dbservername,$username,$password,$databasename);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"delemployee");
$sql="SELECT * FROM employee WHERE empname = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table class='table'>
<tr>
<th scope='col'>emp name</th>
<th scope='col'>emp id</th>
<th scope='col'>emp salary</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['empname'] . "</td>";
    echo "<td>" . $row['empid'] . "</td>";
    echo "<td>" . $row['empsalary'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>

</html>
