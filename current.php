<!DOCTYPE html>
<html>
    <head>
        <title>updateAcc</title>
</head>

<body>

<?php
    $servername = "localhost";
    $username = "X32195986";
    $password = "X32195986";
    $dbname = "X32195986";

    //Create connection
    $connect = mysqli_connect($servername, $username, $password, $dbname);

    //Check connection
    if(!$connect){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "Connected successfully"."<br>"; //delete this line once connection is ok
    }

        $sql = "SELECT * FROM staff";
        $result = mysqli_query($connect, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo "username:"  . $row["username"]. " - password: ". $row["password"]." - firstName: " . $row["first_name"]. " - lastName:" . $row["last_name"]. " - address:" . $row["address"]. " - phone:" . $row["phone_number"]. "<br>";
            //echo "ID: ".$row["shoe_id"]."<br>"."    Name: ".$row["shoe_name"]."<br>"."     Brand: ".$row["shoe_brand"]."<br>"."     Type: ".$row["shoe_type"]."<br>"."     Gender: ".$row["shoe_gender"]."<br>"."        Material: ".$row["shoe_material"]."<br>"."        Price: ".$row["shoe_price"]."<br>"."        Description: ".$row["shoe_description"]."<br>"."         Image: ".$row["shoe_img"]."<br>";
            //echo "stockID: ".$row["stock_id"]. "shoeID: ".$row["shoe_id"]. "SIZE: ".$row["shoe_size"]. "STOCK: ".$row["shoe_stock"]. "COLOUR: ".$row["shoe_colour"]. "img: ".$row["shoe_img"]."<br>";
            //echo $row['Field']."<br>";
            }
          } else {
            echo "0 results";
          }
    mysqli_close($connect);
?>

</body>
</html>