<!DOCTYPE html>
<html>
    <head>
        <title>updateAcc</title>
    </head>

<body>

<?php
    session_start();

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

    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $adr = $_POST["adr"];
    $phn = $_POST["phn"];
    $uname = $_SESSION['username'];

    if($_SESSION['user_type']=="customer"){
    if($fname!=NULL){
        $fnameq = "UPDATE customer SET first_name = '$fname' WHERE username = '$uname'";
        if(mysqli_query($connect, $fnameq)){
            //echo "First name updated";
        }
        else{
            //echo "Error updating first name: " . mysqli_error($connect);
        }
        $_SESSION['first_name'] = $fname;
    }
    if($mname!=NULL){
        $mnameq = "UPDATE customer SET middle_name = '$mname' WHERE username = '$uname'";
        if(mysqli_query($connect, $mnameq)){
           // echo "Middle name updated";
        }
        else{
            //echo "Error updating middle name: " . mysqli_error($connect);
        }
        $_SESSION['middle_name'] = $mname;
    }
    if($lname!=NULL){
        $lnameq = "UPDATE customer SET last_name = '$lname' WHERE username = '$uname'";
        if(mysqli_query($connect, $lnameq)){
            //echo "Last name updated";
        }
        else{
           // echo "Error updating last name: " . mysqli_error($connect);
        }
        $_SESSION['last_name'] = $lname;
    }
    if($adr!=NULL){
        $adrq = "UPDATE customer SET address = '$adr' WHERE username = '$uname'";
        if(mysqli_query($connect, $adrq)){
           // echo "address updated";
        }
        else{
           // echo "Error updating address: " . mysqli_error($connect);
        }
        $_SESSION['address'] = $adr;
    }
    if($phn!=NULL){
        $phnq = "UPDATE customer SET phone_number = '$phn' WHERE username = '$uname'";
        if(mysqli_query($connect, $phnq)){
           // echo "Phone number updated";
        }
        else{
           // echo "Error updating phone number: " . mysqli_error($connect);
        }
        $_SESSION['phone_number'] = $phn;
    }
    header("location:myaccount.php");
    }

    if($_SESSION['user_type']=="staff"){
        $susername = $_POST["susername"];
        $spassword = $_POST["spassword"];
        $sfname = $_POST["sfname"];
        $slname = $_POST["slname"];
        $sadr = $_POST["sadr"];
        $sphn = $_POST["sphn"];

        $stockId = $_POST["stockId"];
        $shoeId = $_POST["shoeId"];
        $size = $_POST["size"];
        $colour = $_POST["colour"];
        $quantity = $_POST["quantity"];

        $MshoeId = $_POST["MshoeId"];
        $MshoeName = $_POST["MshoeName"];
        $MshoeBrand = $_POST["MshoeBrand"];
        $MshoeType = $_POST["MshoeType"];
        $MshoeGender = $_POST["MshoeGender"];
        $MshoeMaterial = $_POST["MshoeMaterial"];
        $MshoePrice = $_POST["MshoePrice"];
        $MshoeDescription = $_POST["MshoeDescription"];
        $MshoeImage = $_POST["MshoeImage"];

        if($fname!=NULL){
            $fnameq = "UPDATE staff SET first_name = '$fname' WHERE username = '$uname'";
            if(mysqli_query($connect, $fnameq)){
                //echo "First name updated";
            }
            else{
                //echo "Error updating first name: " . mysqli_error($connect);
            }
            $_SESSION['first_name'] = $fname;
        }
        if($mname!=NULL){
            $mnameq = "UPDATE staff SET middle_name = '$mname' WHERE username = '$uname'";
            if(mysqli_query($connect, $mnameq)){
               // echo "Middle name updated";
            }
            else{
                //echo "Error updating middle name: " . mysqli_error($connect);
            }
            $_SESSION['middle_name'] = $mname;
        }
        if($lname!=NULL){
            $lnameq = "UPDATE staff SET last_name = '$lname' WHERE username = '$uname'";
            if(mysqli_query($connect, $lnameq)){
                //echo "Last name updated";
            }
            else{
               // echo "Error updating last name: " . mysqli_error($connect);
            }
            $_SESSION['last_name'] = $lname;
        }
        if($adr!=NULL){
            $adrq = "UPDATE staff SET address = '$adr' WHERE username = '$uname'";
            if(mysqli_query($connect, $adrq)){
               // echo "address updated";
            }
            else{
               // echo "Error updating address: " . mysqli_error($connect);
            }
            $_SESSION['address'] = $adr;
        }
        if($phn!=NULL){
            $phnq = "UPDATE staff SET phone_number = '$phn' WHERE username = '$uname'";
            if(mysqli_query($connect, $phnq)){
               // echo "Phone number updated";
            }
            else{
               // echo "Error updating phone number: " . mysqli_error($connect);
            }
            $_SESSION['phone_number'] = $phn;
        }
        if($searchname!=NULL){
            $searchnameq = "SELECT * FROM customer WHERE username = '$searchname'";
            if(mysqli_query($connect, $searchnameq)){
                echo "UserName: " . $row['username'] . "FirstName: " . $row['first_name'] . "MiddleName: " . $row['middle_name'] . "LastName: " . $row['last_name'] . "Address: " . $row['address'] . "PhoneNumber: " . $row['phone_number'] . "<br>";
            }
            else{
                echo "Error searching name: " . mysqli_error($connect);
            }
        }
        if(($susername!=NULL)&&($spassword!=NULL)&&($sfname!=NULL)&&($slname!=NULL)&&($sadr!=NULL)&&($sphn!=NULL)){
            $snewstaff = "INSERT INTO staff (username, password, first_name, last_name, address, phone_number) VALUES ('$susername', '$spassword', '$sfname', '$slname', '$sadr', '$sphn')";
            if(mysqli_query($connect, $snewstaff)){
                //echo "New staff created!";
            }
            else{
                //echo "Error updating first name: " . mysqli_error($connect);
            }
        }
        if(($_POST['mode']=='ADD')&&($_POST['exnew']=='Existing Item')){
            $addExItem = "UPDATE stock SET shoe_stock = (shoe_stock+$quantity) WHERE shoe_id='$shoeId' AND shoe_size=$size AND shoe_colour='$colour'";
            if(mysqli_query($connect, $addExItem)){
                echo "shoe added";
            }
            else{
                //echo "Error adding shoe: " . mysqli_error($connect);
            }
        }
        if(($_POST['mode']=='ADD')&&($_POST['exnew']=='New Item')){
            $addNewItem = "INSERT INTO stock (stock_id, shoe_id, shoe_size, shoe_colour,shoe_stock) VALUES ($stockId, $shoeId, $size, '$colour', $quantity) ";
            if(mysqli_query($connect, $addNewItem)){
                echo "shoe added";
            }
            else{
                //echo "Error adding shoe: " . mysqli_error($connect);
            }
        }
        if(($_POST['mode']=='REMOVE')&&($_POST['exnew']=='Existing Item')){
            $removeExItem = "UPDATE stock SET shoe_stock = (shoe_stock-$quantity) WHERE shoe_id='$shoeId' AND shoe_size=$size AND shoe_colour='$colour'";
            if(mysqli_query($connect, $removeExItem)){
                echo "shoe removed";
            }
            else{
                //echo "Error adding shoe: " . mysqli_error($connect);
            }
        }
        if(($_POST['modeModel']=='ADD')){
            $addNewModel = "INSERT INTO shoes (shoe_id, shoe_name, shoe_brand, shoe_type, shoe_gender, shoe_material, shoe_price, shoe_description, shoe_img) VALUES ($MshoeId, '$MshoeName', '$MshoeBrand', '$MshoeType', '$MshoeGender', '$MshoeMaterial', $MshoePrice, '$MshoeDescription', '$MshoeImage') ";
            if(mysqli_query($connect, $addNewModel)){
                echo "new model added";
            }
            else{
                echo "Error adding shoe: " . mysqli_error($connect);
            }
        }
        if(($_POST['modeModel']=='REMOVE')){
            $addNewModel = "DELETE FROM shoes WHERE shoe_id=$MshoeId ";
            if(mysqli_query($connect, $addNewModel)){
                echo "new model added";
            }
            else{
                echo "Error adding shoe: " . mysqli_error($connect);
            }
        }
        header("location:myaccount.php");
        }
    mysqli_close($connect);
?>

</body>
</html>