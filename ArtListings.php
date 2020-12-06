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
$offset = 12;
$recsPerPage = isset($_POST["recsPerPage"])? $_POST["recsPerPage"] : $offset;
$count = isset($_POST["count"])? $_POST["count"] : 0;
$total = "SELECT `id` FROM `Art`";
$sql = "SELECT `id`,`name`,`width`, `height`, `price`, `image` FROM `Art` WHERE `id` > $count AND `id` <= $recsPerPage";

$result = $conn->query($sql);
$amount = $conn->query($total);
$painting = "";
$pages = ceil($amount->num_rows / $offset);
$currPage = isset($_POST["currPage"])? $_POST["currPage"] : 1;
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

<form action="ArtListings.php" method="post">
    <?php
    if ($currPage > 1){
    ?>
    <tr><td><input type="hidden" name="currPage" value="<?php echo $currPage - 1;?>"></td></tr>
    <tr><td><input type="hidden" name="count" value="<?php echo $count - $offset;?>"></td></tr>
    <tr><td><input type="hidden" name="recsPerPage" value="<?php echo $recsPerPage - $offset;?>"></td></tr>
    <tr><td><button type="submit">Prev</button></td></tr>
</form>
<?php
}
if($currPage < $pages){?>
    <form action="ArtListings.php" method="post">
    <tr><td><input type="hidden" name="currPage" value="<?php echo $currPage + 1;?>"></td></tr>
    <tr><td><input type="hidden" name="count" value="<?php echo $count + $offset;?>"></td></tr>
    <tr><td><input type="hidden" name="recsPerPage" value="<?php echo $recsPerPage + $offset;?>"></td></tr>
    <tr><td><button type="submit">Next</button></td></tr>
    </form><?php } ?>
</body>
</html>