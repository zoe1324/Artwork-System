<?php $servername = "devweb2020.cis.strath.ac.uk";
$username = "xeb18139";
$password = "OoJahShu7iw3";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed");
}
$painting = isset($_POST["id"])? $_POST["id"] : "";
$buyerName = strip_tags(isset($_POST["buyerName"])? $_POST["buyerName"] : "");
$phoneNo = strip_tags(isset($_POST["phoneNo"])? $_POST["phoneNo"] : "");
$email = strip_tags(isset($_POST["email"])? $_POST["email"] : "");
$address = strip_tags(isset($_POST["address"])? $_POST["address"] : "");

$id = isset($id)? $id : "";
$name = isset($name)? $name : "";


if($painting != ""){
    $sql = "SELECT * FROM `Art` WHERE id = $painting";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id = $row["id"]; $name = $row["name"];
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
    <title>Make an Order | Cara Art</title>
<!--    <script src="validateForm.js"></script>-->
</head>
<body>
<div id="paintingOrderDIV">
    <?php
    echo "<h1> Order of ".$name." with ID: ".$id.".</h1>";
    ?>
    <button onclick="goBack()">Back</button>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>
<div id="formDIV">
    <form action="OrderForm.php" method="post" name="orderForm">

        <table>
            <tr><td><input type="hidden" name="name" value="<?php echo $name; ?>"/></td><td></td></tr>
            <tr><td><input type="hidden" name="id" value="<?php echo $id; ?>"/></td><td></td></tr>
            <tr><td class="label">Name</td><td><input type="text" name="buyerName" value="<?php echo $buyerName; ?>" required/></td></tr>
            <tr><td class="label">Phone No.</td><td><input type="number" name="phoneNo" value="<?php echo $phoneNo; ?>" required/></td></tr>
            <tr><td class="label">Email</td><td><input type="email" name="email" value="<?php echo $email; ?>" required/></td></tr>
            <tr><td class="label">Address</td><td><input type="text" name="address" value="<?php echo $address ?>" required/></td></tr>
            <tr><td class="label"></td><td><button onclick="
            <?php if ($buyerName != "" && $phoneNo != "" && $email != "" && $address != ""){
                        $sql = "INSERT INTO `ArtOrders` (order_id, painting_id, painting_name, buyer_name, email, address, phone_no) VALUES (NULL,'$id','$name','$buyerName','$email','$address','$phoneNo');";
                        if ($conn->query($sql) === TRUE) {
                        } else {
                            die ("Error ");
                        }
                    }
                    $conn->close();
                    ?>">Submit</button></td></tr>
        </table>
    </form>
</div>

<!--
For assessment 2 it is better if you apply best
practice for "safety". All errors should ideally
be reported on the browser using HTML/JS/CSS.
The PHP should still do basic checks for
safety and database integrity in case of someone
hacking the page or managing get their browser
to not run JavaScript (maybe add blocker gone wrong).
But PHP doesn't have to do the dynamic redisplay of
pages - you've done that in assessment 1.
So PHP can just do simple list of errors and
ask user to go back and fix them.
     -->
</body>
</html>