<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listings | Cara Art</title>
</head>
<style>
    img{
        height: 10vh;
        width: 10vw;
    }
</style>
<body>
<h1>My Art Listings</h1>
<?php $servername = "devweb2020.cis.strath.ac.uk";
$username = "xeb18139";
$password = "OoJahShu7iw3";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed");
}
//$recsPerPage = 12;
$count = isset($_POST["count"])? $_POST["count"] : 0;
$sql = "SELECT `id`,`name`,`width`, `height`, `price`, `image` FROM `Art`";
//$count = "SELECT COUNT(*) FROM `Art`";
//$total = $conn->query($count);
$result = $conn->query($sql);
$painting = "";


?>
<form action="MoreDetails.php" method="post">
    <?php
    echo "<table><tr><th>Painting</th><th>Size</th><th>Price</th><th></th></tr>\n";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["name"]."
            </td><td>".$row["width"]."x".$row["height"]." mm"."
            </td><td>"."£".$row["price"]."
            </td><td><img src='data:image/png;base64,".base64_encode($row["image"])."'
            </td><td><button type='submit' name='id' value='".$row["id"]."'>More</button></td></tr>\n";

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
    -Change the art listing page to show 12 paintings per page
    with next and previous page buttons.-->
</body>
</html>