
<?php
  include_once("includes/header.php");
?>

  <div class="container text-grey">
    <h2>our products</h2>

    <form action="search.php" method="POST">
    <input type="text" name="search" placeholder="search">
    <button type="submit" name="submit-search">search</button>
  </form>
  </div>


  <div>
    <div class="row">
        <?php
          $sql = "SELECT * FROM shoes";
          $result = mysqli_query($connect, $sql);
          $queryResults = mysqli_num_rows($result);
          
          if($queryResults > 0){
            while($row = mysqli_fetch_assoc($result)){

              echo "<div class='col s6'>
                      <a href='single_view.php?shoe_id=".$row['shoe_id']."'>
                        <img src=".$row['shoe_img']." style='width:100%'>
                      </a>
                        <p class='font_small text_center bold'>".$row['shoe_brand']."</p>
                        <p class='font_medium text_center'>".$row['shoe_name']."</p>
                        <p class='font_medium text_center'>$" .$row['shoe_price']."</p>
                    </div>";
            }
          }
          
        ?>
    </div>
  </div>

<?php
  include_once("includes/footer.php");
?>
