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

$sql = "SELECT `name`,`width`, `height`, `price` FROM `Art`";
$result = $conn->query($sql);
$painting = "";
?>
<form action="MoreDetails.php" method=post>
    <?php
    echo "<table><tr><th>Painting</th><th>Width</th><th>Height</th><th>Price</th><th></th></tr>\n";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["name"]."
            </td><td>".$row["width"]."
            </td><td>".$row["height"]."
            </td><td>"."£".$row["price"]."
            </td><td><button type='submit' name='id' value='".$row["name"]."'>More</button></td></tr>\n";

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
    -Rework the listing so that users are
    presented with only basic info on paintings (name, price and size).
    -Replace the order button with a “More” button that takes the user
    to a details page with full details (basic plus description),
    an order button and a back button.
    -Change the art listing page to show 12 paintings per page
    with next and previous page buttons.-->
</body>
</html>
