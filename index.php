<?php 
// ربط السيرفر وقاعدة البيانات مع صفحة بي اتش بي 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?> 


<body> 
<table border ="1" >
<th> Number Book </th>
<th> Name Book </th>
<th> Pic </th>
<th> Writing Book </th>
<?php 
// سحب  البيانات من قاعدة البيانات 
$sql = "SELECT id,bk_name,pic,r_name FROM books ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       echo "<tr>";
       echo "<td>". $row["id"]."</td><td>". $row["bk_name"]. "</td><td> " ."<img src=\"". $row["pic"]."\"width=\"100px\" height=\"100px\">"."</td><td>". $row["r_name"]."</td>";
       echo "<br>";
       echo "</tr>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>
</table>
</body>
