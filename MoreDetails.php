<?php
$servername = "devweb2020.cis.strath.ac.uk";
$username = "xeb18139";
$password = "OoJahShu7iw3";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed");
}

$sql = "SELECT * FROM `Art`";
$result = $conn->query($sql);
$painting = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listings | Cara Art</title>
</head>
<body>
<form action="MoreDetails.php" method="post" >
<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row["id"]."
            </td><td>".$row["name"]."
            </td><td>".$row["completion_date"]."
            </td><td>".$row["width"]."
            </td><td>".$row["height"]."
            </td><td>"."£".$row["price"]."
            </td><td>".$row["description"] ?>
</form>
<form action="OrderForm.php" method=post name="orderForm">
<table>
    <button type='submit' name='id' value='<?php $row["id"]?>'>Order</button></td></tr>\n";
    <?php
    }
}
else{
    die ("No Matches");
}
$conn->close();
echo "</table>\n";

?>
</table>
</form>

</body>
</html>

