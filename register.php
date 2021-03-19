<?php
 include("shoeDB.php");
 session_start();
 
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connect,$_POST['uname']);
    $password = mysqli_real_escape_string($connect,$_POST['pword']);
    $first_name = mysqli_real_escape_string($connect,$_POST['fname']);
    $middle_name = mysqli_real_escape_string($connect,$_POST['mname']);
    $last_name = mysqli_real_escape_string($connect,$_POST['lname']);
    $address = mysqli_real_escape_string($connect,$_POST['adr']);
    $phone_number = mysqli_real_escape_string($connect,$_POST['phn']);

    $sql = "INSERT INTO customer VALUES ('$username', '$password', '$first_name', '$middle_name', '$last_name', '$address', '$phone_number')";
    if($connect->query($sql) === TRUE){
        echo "New record created successfully";
        header("location:login.php");
    } else {
      echo "Error: " . $sql . "<br>" . $connect->error;
    }
    mysqli_close($link);
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="img/shoe_favicon.png" type="image/png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <main class="hero">
    <section class="register-card">
      <a href="home.php"><h3>theshoebox<br></h3></a>
      <h2>register</h2>
      <form method="post">
        <div class="inner-card">
          <div class="text_right margin-right">
            <label>username</label><br>
            <label>password</label><br>
            <label>first name</label><br>
            <label>middle name</label><br>
            <label>last name</label><br>
            <label>address</label><br>
            <label>phone number</label>
          </div>
          <div>
            <input type="text" name="uname" class="form-control"><br>
            <input type="password" name="pword" class="form-control"><br>
            <input type="text" name="fname" class="form-control"><br>
            <input type="text" name="mname" class="form-control"><br>
            <input type="text" name="lname" class="form-control"><br>
            <input type="text" name="adr" class="form-control"><br>
            <input type="text" name="phn" class="form-control"><br>
          </div>
        </div>
        <div>
          <br>
          <input type="submit" value="submit">
          <input type="reset" value="reset">
        </div>
        <p>already have an account? <a href="login.php">login here</a>.</p>
      </form>
    </section>
  </main>
</body>
</html>
