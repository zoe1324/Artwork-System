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
    <title>Track and Trace Bookings | Cara Art</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Track and Trace Bookings</h1>
        <button onclick="document.location='index.php'" class="btn btn-light">Home</button>
    </div>
    <div class="jumbotron">
     <form action="TrackAndTrace.php" method="post" name="TrackAndTrace" class="form">

        <table class='table table-centered table-transparent'>
            <tr><td class="label">Name</td><td><input type="text" name="bookingName" value="<?php echo $name; ?>" required/></td></tr>
            <tr><td class="label">Address</td><td><input type="text" name="address" value="<?php echo $address; ?>" required/></td></tr>
            <tr><td class="label">Phone No.</td><td><input type="number" name="phoneNo" value="<?php echo $phoneNo; ?>" required/></td></tr>
            <tr><td class="label">Date and Time</td><td><input type="datetime-local" name="dateTime" value="<?php echo $dateTime; ?>" required/></td></tr>
            <tr><td class="label"></td><td><button onclick="
            <?php if ($name != "" && $address != "" && $phoneNo != "" && $dateTime != ""){
                        $sql = "INSERT INTO `Appointments` (id, booking_name, postal_address, phone_no, date_time) VALUES (NULL,'$name','$address','$phoneNo','$dateTime');";
                        if ($conn->query($sql) === TRUE) {
                            echo "inserted new entry with id " . $conn->insert_id;
                        } else {
                            die ("Error: " . $sql . "<br>" . $conn->error);//FIXME only use during debugging
                        }
                    }
                    $conn->close();
                    ?>" class="btn btn-dark">Submit</button></td></tr>
        </table>
    </form>
    </div>
    <!--validate date time to be impossible to book before present time-->
</div>
</body>
</html>