<?php
$servername = "devweb2020.cis.strath.ac.uk";
$username = "xeb18139";
$password = "OoJahShu7iw3";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed");
}
$paintingID = isset($_POST["id"])? $_POST["id"] : "";
$id = isset($id)? $id : "";
$name = isset($name)? $name : "";
$compDate = isset($compDate)? $compDate : "";
$width = isset($width)? $width : "";
$height = isset($height)? $height : "";
$price = isset($price)? $price : "";
$description = isset($description)? $description : "";
$image = isset($image)? $image : "";

if($paintingID != ""){
    $sql = "SELECT * FROM `Art` WHERE id = $paintingID";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id = $row["id"]; $name = $row["name"]; $compDate = $row["completion_date"];
            $width = $row["width"]; $height = $row["height"]; $price = $row["price"];
            $image = $row["image"];
            $description = $row["description"];
        }
    }
    else{
        die ("No Matches");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listings | Cara Art</title>
    <style>
        img{
            max-height: 66vh;
            max-width: 66vw;
        }
    </style>
</head>

<body>

<form action="MoreDetails.php" method="post" >
<table>
    <tr><td><h1><?php echo $id.": ".$name; ?> </h1></td></tr>
    <tr><td><?php echo "Completed On: ".$compDate; ?></td></tr>
    <tr><td><?php echo "Width: ".$width." Height: ".$height." Price: £".$price; ?> </td></tr>
    <tr><?php echo '<td><img src="data:image/png;base64,' . base64_encode($image) .'" alt="photo" /></td>'; ?></tr>
    <tr><td><?php echo "Description: ".$description; ?> </td></tr>
</table>
</form>

<form action="OrderForm.php" method=post name="orderForm">
   <button type='submit' name='id' value='<?php echo $id; ?>'>Order</button>
</form>

<br><button onclick="goBack()">Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>

