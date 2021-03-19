<?php
  session_start();
  include("shoeDB.php");
?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="img/shoe_favicon.png" type="image/png">
    <title>theshoebox</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js" defer></script>
  </head>

  <body class="content">
    <nav class="sidebar bar-block white collapse top" id="mySidebar">
      <div class="container display-container padding-16">
        <i onclick="sidebar_close()" class="fa fa-remove hide-large button display-topright"></i>
        <a href="home.php"><h1>theshoebox</h1></a>
      </div>

      <div class="padding-64 font_large text-grey text_bold">
        <?php
          if(isset($_SESSION["username"])){
              echo "<a href='myaccount.php' class='bar-item button'>my account</a>";
              echo "<a href='mycart.php' class='bar-item button'>my cart</a>";
          }else{
            echo "<a href='login.php' class='bar-item button'>log in</a>";
            echo "<a href='register.php' class='bar-item button'>sign up</a>";
          }
        ?>
        <a href="products.php" class="bar-item button">our products</a>
        <a href="help.php" class="bar-item button">help me</a>
        <a href="contactus.php" class="bar-item button">contact us</a>
        <?php
          if(isset($_SESSION["username"])){
              echo "<a href='logout.php' class='bar-item button'>sign out</a>";
          }
          
        ?>
      </div>
    </nav>

    <header class="bar top hide-large black font_xlarge">
      <div class="bar-item padding-16"><a href="home.php"><h1>theshoebox</h1></a></div>
      <a href="#" class="bar-item button padding-24 right" onclick="sidebar_open()">
        <i class="fa fa-bars"></i>
      </a>
    </header>

    <div class="overlay hide-large" onclick="sidebar_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="main">
      <header class="container padding-24">
        <p class="right">
          <br><br>
        </p>
      </header>
