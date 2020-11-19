<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Cara Art</title>
</head>
<body>

<?php $pass = strip_tags(isset($_POST["password"])? $_POST["password"] : "");
showForm($pass);
function showForm($pass){
    if($pass == ""){?>
        <form action="AdminPage.php" method="post" name="passForm">
            <table>
                <tr>Password:<td><input type="password" name="password" required/></td></tr>
                <tr><td><input type="submit"/></td></tr>
            </table>
        </form>
    <?php }
}
if($pass === "letMEin2020"){
    displayInfo();
} else if ($pass != ""){
    showForm("");
    echo "<p>Wrong Password. Please Try Again.</p>";
}
function displayInfo(){
    $servername = "devweb2020.cis.strath.ac.uk";
    $username = "xeb18139";
    $password = "OoJahShu7iw3";
    $dbname = $username;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error){
        die("Connection failed");
    }

    $sql = "SELECT * FROM `ArtOrders`";
    $result = $conn->query($sql);
    echo "<h1>Orders</h1>\n";
    echo "<table><tr><th>OrderID</th><th>PaintingID</th><th>Painting</th><th>Name</th><th>Email</th><th>Address</th><th>PhoneNo.</th></tr>\n";
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["order_id"]."</td><td>".$row["painting_id"]."</td><td>".$row["painting_name"]."</td><td>".$row["buyer_name"]."</td><td>".$row["email"]."</td><td>".$row["address"]."</td><td>".$row["phone_no"]."</td></tr>\n";

        }
    }
    else{
        die ("No Matches");
    }

    $sql = "SELECT * FROM `Appointments`";
    $result = $conn->query($sql);

    echo "<table><tr><th>AppointmentID</th><th>Name</th><th>Postal Address</th><th>Phone No.</th><th>Date and Time</th></tr>\n";
    if($result->num_rows > 0){
        echo "<h1>Bookings</h1>\n";
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["id"]."</td><td>".$row["booking_name"]."</td><td>".$row["postal_address"]."</td><td>".$row["phone_no"]."</td><td>".$row["date_time"]."</td></tr>\n";

        }
    }
    else{
        die ("No Matches");
    }
    $conn->close();
    echo "</table>\n";
}
?>
</body>
</html>