<?php
  include_once("includes/header.php");
?>
  
  <div class="container">
    <?php
        session_start();
      $shoe_id = mysqli_real_escape_string($connect, $_GET['shoe_id']);

      $sqlSHOE = "SELECT * FROM shoes WHERE shoe_id='$shoe_id'";
      $resultSHOE = mysqli_query($connect, $sqlSHOE);
      $queryResultsSHOE = mysqli_num_rows($resultSHOE);
    
      if($queryResultsSHOE > 0){
        while($SHOErow = mysqli_fetch_assoc($resultSHOE)){
            $shoe_name = $SHOErow['shoe_name'];
            $shoe_price = $SHOErow['shoe_price'];
            
          echo "<div class='display-container container'>
                  <img src=".$SHOErow['shoe_img']." alt=".$SHOErow['shoe_id']." style='width:100%'>
                </div>
                <h2>".$SHOErow['shoe_brand']." ".$SHOErow['shoe_name']."</h2>
                <h1>".$SHOErow['shoe_gender']."</h1>
                <h1>$" .$SHOErow['shoe_price']."</h1>
                <p>Material: ".$SHOErow['shoe_material']."</p>
                <p>Type: ".$SHOErow['shoe_type']."<br></p>
                <p><br></p>
                <p>".$SHOErow['shoe_description']."</p>
                <br>";
        }
      }

      $sqlSTOCK = "SELECT * FROM stock WHERE shoe_id='$shoe_id'";
      $resultSTOCK = mysqli_query($connect, $sqlSTOCK);
      $queryResultsSTOCK = mysqli_num_rows($resultSTOCK);

      if($queryResultsSTOCK > 0){
        while($STOCKrow = mysqli_fetch_assoc($resultSTOCK)){
          echo "<div class='col s6'>
                  <p>Size: ".$STOCKrow['shoe_size']."</p>
                  <p>Colour: ".$STOCKrow['shoe_colour']."</p>
                  <p>Stock: ".$STOCKrow['shoe_stock']."</p>";
                if(isset($_SESSION["username"])){
                  echo "<a href='mycart.php?shoe_id=".$shoe_id."&shoe_name=".$shoe_name."&shoe_price=".$shoe_price."&shoe_size=".$STOCKrow['shoe_size']."&shoe_colour=".$STOCKrow['shoe_colour']."'>
                  <button type='submit' name='addtocart'>add to cart</button>
                  <p><br></p>
                  </a>
                  </div>";
                }
        }
      }
    ?>
  </div>

<?php
  include_once("includes/footer.php");
?>
