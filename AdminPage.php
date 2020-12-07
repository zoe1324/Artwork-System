<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Cara Art</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Admin</h1>
        <button onclick="document.location='index.php'" class="btn btn-light">Home</button>
    </div>
    <div class="jumbotron">
    <?php $pass = strip_tags(isset($_POST["password"])? $_POST["password"] : "");
    showForm($pass);
    function showForm($pass){
        if($pass == ""){?>
            <form action="AdminPage.php" method="post" name="passForm" class="form">
                <table class="table table-centered table-transparent">
                    <tr><td class="label">Password:<input type="password" name="password" required/></td></tr>
                    <tr><td><button type="submit" class="btn btn-light">Submit</td></tr>
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
        echo "<h1 class='label'>Orders</h1>\n";
        echo "<table class='table table-centered table-transparent'><tr><th>OrderID</th><th>PaintingID</th><th>Painting</th><th>Name</th><th>Email</th><th>Address</th><th>PhoneNo.</th></tr>\n";
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

        echo "<table class='table table-centered table-transparent'><tr><th>AppointmentID</th><th>Name</th><th>Postal Address</th><th>Phone No.</th><th>Date and Time</th></tr>\n";
        if($result->num_rows > 0){
            echo "<h1 class='label'>Bookings</h1>\n";
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
    </div>
</div>
</body>
</html>