<?php $servername = "devweb2020.cis.strath.ac.uk";
$username = "xeb18139";
$password = "OoJahShu7iw3";
$dbname = $username;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
    die("Connection failed");
}
$name = strip_tags(isset($_POST["bookingName"])? $_POST["bookingName"] : "");
$phoneNo = strip_tags(isset($_POST["phoneNo"])? $_POST["phoneNo"] : "");
$dateTime = strip_tags(isset($_POST["dateTime"])? $_POST["dateTime"] : "");
$address = strip_tags(isset($_POST["address"])? $_POST["address"] : "");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View My Art | Cara Art</title>
</head>
<body>
<h1>BOOK ART GALLERY APPOINTMENTS HERE</h1>

<div id="formDIV">
    <form action="TrackAndTrace.php" method="post" name="TrackAndTrace">

        <table>
            <tr><td class="label">Name</td><td><input type="text" name="bookingName" value="<?php echo $name; ?>" required/></td></tr>
            <tr><td class="label">Address</td><td><input type="text" name="address" value="<?php echo $address; ?>" required/></td></tr>
            <tr><td class="label">Phone No.</td><td><input type="number" name="phoneNo" value="<?php echo $phoneNo; ?>" required/></td></tr>
            <tr><td class="label">Date and Time</td><td><input type="datetime-local" name="dateTime" value="<?php echo $dateTime; ?>" required/></td></tr>
            <tr><td class="label"><button onclick="
            <?php if ($name != "" && $address != "" && $phoneNo != "" && $dateTime != ""){
                        $sql = "INSERT INTO `Appointments` (id, booking_name, postal_address, phone_no, date_time) VALUES (NULL,'$name','$address','$phoneNo','$dateTime');";
                        if ($conn->query($sql) === TRUE) {
                            echo "inserted new entry with id " . $conn->insert_id;
                        } else {
                            die ("Error: " . $sql . "<br>" . $conn->error);//FIXME only use during debugging
                        }
                    }
                    $conn->close();
                    ?>">Submit</button></td></tr>
        </table>
    </form>

<!--validate date time to be impossible to book before present time-->

</body>
</html>