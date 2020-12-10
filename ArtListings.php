<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listings | Cara Art</title>
    <style>
        img{
            max-height: 10vh;
            max-width: 10vw;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
</head>
<body>
<div class="container">
    <div class="page-header">
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
        <button onclick="document.location='index.php'" class="btn btn-light">Home</button>
    </div>

    <div class="jumbotron">

    <form action="MoreDetails.php" method="post">
        <?php
        echo "<table class='table table-centered table-transparent'><tr><th class='text-center'>Painting</th><th class='text-center'>Size</th><th class='text-center'>Price</th><th class='text-center'></th><th class='text-center'></th></tr>\n";
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<tr><td>".$row["name"]."</td>
            <td>".$row["width"]."x".$row["height"]." mm"."</td>
            <td>"."£".$row["price"]."</td>
            <td><img src='data:image/png;base64," . base64_encode($row["image"]) ."' alt='photo' /></td>
            <td><button type='submit' name='id' value='".$row["id"]."' class='btn btn-light'>More</button></td></tr>\n";
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
        <table>
            <tr><td><input type="hidden" name="currPage" value="<?php echo $currPage - 1;?>"></td></tr>
            <tr><td><input type="hidden" name="count" value="<?php echo $count - $offset;?>"></td></tr>
            <tr><td><input type="hidden" name="recsPerPage" value="<?php echo $recsPerPage - $offset;?>"></td></tr>
            <tr><td><button type="submit" class="btn btn-light">Prev</button></td></tr>
        </table>
    </form>
<?php }
if($currPage < $pages){
    ?>
    <form action="ArtListings.php" method="post">
    <table>
        <tr><td><input type="hidden" name="currPage" value="<?php echo $currPage + 1;?>"></td></tr>
        <tr><td><input type="hidden" name="count" value="<?php echo $count + $offset;?>"></td></tr>
        <tr><td><input type="hidden" name="recsPerPage" value="<?php echo $recsPerPage + $offset;?>"></td></tr>
        <tr><td><button type="submit" class="btn btn-light">Next</button></td></tr>
    </table>
    </form><?php } ?>
    </div>
</div>
</body>
</html>