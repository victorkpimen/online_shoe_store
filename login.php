<?php
 include("shoeDB.php");
 session_start();
 
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);

    
    if ($_POST['user_type'] == 'customer'){
      $sql = "SELECT * FROM customer WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);

      if($count == 1) {
          $_SESSION['user_type'] = "customer";
          $_SESSION['username'] = $username;
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['middle_name'] = $row['middle_name'];
          $_SESSION['last_name'] = $row['last_name'];
          $_SESSION['address'] = $row['address'];
          $_SESSION['phone_number'] = $row['phone_number'];
          header("location:home.php");
          echo "$username is logged in!";
      }else {
          echo "Your Login Name or Password is invalid";
      }
  }

  if ($_POST['user_type'] == 'staff'){
      $sql = "SELECT * FROM staff WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
          $_SESSION['user_type'] = "staff";
          $_SESSION['username'] = $username;
          $_SESSION['first_name'] = $row['first_name'];
          $_SESSION['middle_name'] = $row['middle_name'];
          $_SESSION['last_name'] = $row['last_name'];
          $_SESSION['address'] = $row['address'];
          $_SESSION['phone_number'] = $row['phone_number'];
          header("location:home.php");
          echo "$username is logged in!";
      }else {
          echo "Your Login Name or Password is invalid";
      }

  }

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="img/shoe_favicon.png" type="image/png">
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<main class="hero">
<section class="login-card">
<a href="home.php"><h3>theshoebox<br></h3></a>
<h2>log in</h2>
<form method="post">
<select name="user_type">
<option value="customer">customer</option>
<option value="staff">staff</option>
</select>
<div class="inner-card">
<div class="text_right margin-right">
<label>username</label><br>
<label>password</label>
</div>
<div>
<input type="text" name="username"><br>
<input type="password" name="password">
</div>
</div>

<div>
<br>
<input type="submit" value="login">
</div>
<p><br>don't have an account? <a href="register.php">sign up now</a>.</p>
</form>
</section>
</main>
</body>
</html>
