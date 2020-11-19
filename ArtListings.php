<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listings | Cara Art</title>
</head>
<body>
<h1>VIEW MY ART HERE</h1>
<?php $servername = "devweb2020.cis.strath.ac.uk";
$username = "xeb18139";
$password = "OoJahShu7iw3";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed");
}

$sql = "SELECT * FROM `Art`";
$result = $conn->query($sql);
$painting = "";
?>
<form action="OrderForm.php" method=post>
    <?php
    echo "<table><tr><th>ID</th><th>Painting</th><th>Completed On</th><th>Width</th><th>Height</th><th>Price</th><th>Description</th><th></th></tr>\n";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["id"]."
            </td><td>".$row["name"]."
            </td><td>".$row["completion_date"]."
            </td><td>".$row["width"]."
            </td><td>".$row["height"]."
            </td><td>"."£".$row["price"]."
            </td><td>".$row["description"]."
           </td><td><button type='submit' name='id' value='".$row["id"]."'>Order</button></td></tr>\n";

        }
    }
    else{
        die ("No Matches");
    }
    $conn->close();
    echo "</table>\n";
    ?>
</form>
<!--Art Listings Page:
    -Current art in Database in HTML table
    -An 'Order' button for each row (will take the user
    to a form to place an order)-->
</body>
</html>
