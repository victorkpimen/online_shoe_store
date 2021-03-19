<?php
  include_once("includes/header.php");
?>

<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = mysqli_real_escape_string($connect,$_POST['fname']);
        $mname = mysqli_real_escape_string($connect,$_POST['mname']);
        $lname = mysqli_real_escape_string($connect,$_POST['lname']);
        $adr = mysqli_real_escape_string($connect,$_POST['adr']);
        $phn = mysqli_real_escape_string($connect,$_POST['phn']);

    if ($_POST['user_type'] == 'customer'){
        if($fname!=NULL){
            $fnameq = "UPDATE customer SET first_name = '$fname' WHERE username = '$uname'";
            if(mysqli_query($connect, $fnameq)){
               // echo "First name updated";
            }
            else{
               // echo "Error updating first name: " . mysqli_error($connect);
            }
            $_SESSION['first_name'] = $fname;
        }
        if($mname!=NULL){
            $mnameq = "UPDATE customer SET middle_name = '$mname' WHERE username = '$uname'";
            if(mysqli_query($connect, $mnameq)){
               // echo "Middle name updated";
            }
            else{
                echo "Error updating middle name: " . mysqli_error($connect);
            }
            $_SESSION['middle_name'] = $mname;
        }
        if($lname!=NULL){
            $lnameq = "UPDATE customer SET last_name = '$lname' WHERE username = '$uname'";
            if(mysqli_query($connect, $lnameq)){
               // echo "Last name updated";
            }
            else{
                echo "Error updating last name: " . mysqli_error($connect);
            }
            $_SESSION['last_name'] = $lname;
        }
        if($adr!=NULL){
            $adrq = "UPDATE customer SET address = '$adr' WHERE username = '$uname'";
            if(mysqli_query($connect, $adrq)){
               // echo "address updated";
            }
            else{
                echo "Error updating address: " . mysqli_error($connect);
            }
            $_SESSION['address'] = $adr;
        }
        if($phn!=NULL){
            $phnq = "UPDATE customer SET phone_number = '$phn' WHERE username = '$uname'";
            if(mysqli_query($connect, $phnq)){
               // echo "Phone number updated";
            }
            else{
                echo "Error updating phone number: " . mysqli_error($connect);
            }
            $_SESSION['phone_number'] = $phn;
        }
        header("location:myaccount.php");
    }

    if ($_POST['user_type'] == 'staff'){
        $searchname = mysqli_real_escape_string($connect,$_POST['searchname']);
        $sfname = mysqli_real_escape_string($connect,$_POST['sfname']);
        $smname = mysqli_real_escape_string($connect,$_POST['smname']);
        $slname = mysqli_real_escape_string($connect,$_POST['slname']);
        $sadr = mysqli_real_escape_string($connect,$_POST['sadr']);
        $sphn = mysqli_real_escape_string($connect,$_POST['sphn']);

        if($fname!=NULL){
            $fnameq = "UPDATE staff SET first_name = '$fname' WHERE username = '$uname'";
            if(mysqli_query($connect, $fnameq)){
               // echo "First name updated";
            }
            else{
               // echo "Error updating first name: " . mysqli_error($connect);
            }
            $_SESSION['first_name'] = $fname;
        }
        if($mname!=NULL){
            $mnameq = "UPDATE staff SET middle_name = '$mname' WHERE username = '$uname'";
            if(mysqli_query($connect, $mnameq)){
               // echo "Middle name updated";
            }
            else{
                echo "Error updating middle name: " . mysqli_error($connect);
            }
            $_SESSION['middle_name'] = $mname;
        }
        if($lname!=NULL){
            $lnameq = "UPDATE staff SET last_name = '$lname' WHERE username = '$uname'";
            if(mysqli_query($connect, $lnameq)){
               // echo "Last name updated";
            }
            else{
                echo "Error updating last name: " . mysqli_error($connect);
            }
            $_SESSION['last_name'] = $lname;
        }
        if($adr!=NULL){
            $adrq = "UPDATE staff SET address = '$adr' WHERE username = '$uname'";
            if(mysqli_query($connect, $adrq)){
               // echo "address updated";
            }
            else{
                echo "Error updating address: " . mysqli_error($connect);
            }
            $_SESSION['address'] = $adr;
        }
        if($phn!=NULL){
            $phnq = "UPDATE staff SET phone_number = '$phn' WHERE username = '$uname'";
            if(mysqli_query($connect, $phnq)){
               // echo "Phone number updated";
            }
            else{
                echo "Error updating phone number: " . mysqli_error($connect);
            }
            $_SESSION['phone_number'] = $phn;
        }
        if($searchname!=NULL){
            $searchnameq = "SELECT * FROM customer WHERE username = '$searchname'";
            if(mysqli_query($connect, $searchnameq)){
                echo "UserName: " . $row['username'] . "FirstName: " . $row['first_name'] . "MiddleName: " . $row['middle_name'] . "LastName: " . $row['last_name'] . "Address: " . $row['address'] . "PhoneNumber: " . $row['phone_number'] . "<br>";
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
        header("location:myaccount.php");
    }
    echo "Information updated/account created!";
}
?>
  <div class="container text-grey">  
    <?php   if (isset($_SESSION['username'])){
                echo "<h2> ";
                if(isset($_SESSION['first_name'])){
                    echo $_SESSION['first_name'];
                }
                echo " ";
                if(isset($_SESSION['last_name'])){
                    echo $_SESSION['last_name'];
                }
                echo "'s account </h2>";
            }
    ?>
  </div>
  <div class="container">  
  <form method = "POST" action = "http://ceto.murdoch.edu.au/~32195986/theshoebox/updateAccount.php" id="updateAcc">
                
                <h4>Current personal details:</h4>
                <p>First name: <?php echo $_SESSION['first_name'];?></p>
                <?php if(isset($_SESSION['middle_name'])){
                    echo "<p>Middle name: ";
                    echo $_SESSION['middle_name'];
                    echo "</p>";
                }
                ?>
                <p>Last name: <?php echo $_SESSION['last_name'];?></p>
                <p>Address: <?php echo $_SESSION['address'];?></p>
                <p>Phone number: <?php echo $_SESSION['phone_number'];?></p>
               
                <h4>Update personal details:</h4>
                    <div>
                        <p>First name: <input type="text" name="fname" class="form-control" id="fname"></p>
                        <p>Middle name: <input type="text" name="mname" class="form-control" id="mname"></p>
                        <p>Last name: <input type="text" name="lname" class="form-control" id="lname"></p>
                        <p>Address: <input type="text" name="adr" class="form-control" id="adr"></p>
                        <p>Phone number: <input type="text" name="phn" class="form-control" id="phn"></p>
                    </div>

                <?php if($_SESSION['user_type']=="staff"):?>
                 <h4>Search for customer details(enter username):                      
                    <div>
                        <input type="text" name="searchname" class="form-control" id="searchname"><br>
                        <p id="customerSearch"></p>
                    </div> 

                  <h4>Create a new staff account:</h4>
                  <div>
                        <p>User name: <input type="text" name="susername" class="form-control" id="susername"></p>
                        <p>Password: <input type="password" name="spassword" class="form-control" id="spassword"></p>
                        <p>First name: <input type="text" name="sfname" class="form-control" id="sfname"></p>
                        <p>Middle name: <input type="text" name="smname" class="form-control" id="smname"></p>
                        <p>Last name: <input type="text" name="slname" class="form-control" id="slname"></p>
                        <p>Address: <input type="text" name="sadr" class="form-control" id="sadr"></p>
                        <p>Phone number: <input type="text" name="sphn" class="form-control" id="sphn"></p>
                    </div>

                    <h4>Modify product details (existing models):</h4>
                    <div>
                        <select name="mode">
                        <option value="ADD">ADD</option>
                        <option value="REMOVE">REMOVE</option>
                        </select>

                        <select name="exnew">
                        <option value="Existing Item">Existing Item</option>
                        <option value="New Item">New Item</option>
                        </select>

                        <p>Stock ID: <input type="text" name="stockId" class="form-control" id="stockId"></p>
                        <p>Shoe ID: <input type="text" name="shoeId" class="form-control" id="shoeId"></p>
                        <p>Shoe size: <input type="text" name="size" class="form-control" id="size"></p>
                        <p>Shoe colour: <input type="text" name="colour" class="form-control" id="colour"></p>
                        <p>Quantity: <input type="text" name="quantity" class="form-control" id="quantity"></p>
                    </div>

                    <h4>ADD/DELETE Models (only Shoe ID needed for DELETING)</h4>
                    <div>
                        <select name="modeModel">
                        <option value="ADD">ADD</option>
                        <option value="REMOVE">REMOVE</option>
                        </select>

                        <p>Shoe ID: <input type="text" name="MshoeId" class="form-control" id="MshoeId"></p>
                        <p>Shoe name: <input type="text" name="MshoeName" class="form-control" id="MshoeName"></p>
                        <p>Shoe brand: <input type="text" name="MshoeBrand" class="form-control" id="MshoeBrand"></p>
                        <p>Shoe type: <input type="text" name="MshoeType" class="form-control" id="MshoeType"></p>
                        <p>Shoe gender: <input type="text" name="MshoeGender" class="form-control" id="MshoeGender"></p>
                        <p>Shoe material: <input type="text" name="MshoeMaterial" class="form-control" id="MshoeMaterial"></p>
                        <p>Shoe price: <input type="text" name="MshoePrice" class="form-control" id="MshoePrice"></p>
                        <p>Shoe description: <input type="text" name="MshoeDescription" class="form-control" id="MshoeDescription"></p>
                        <p>Shoe image: <input type="text" name="MshoeImage" class="form-control" id="MshoeImage"></p>
                    </div>
                <?php endif ?>
                <div>
                    <br>
                    <input type="submit" onclick="update()" value="Go">
                    <input type="reset" value="reset">
                </div>
            </form>
                <script>
                   function update() {
                        return true;
                    }
                </script>
</div>
<?php
  include_once("includes/footer.php");
?>
