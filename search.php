<?php
  include_once("includes/header.php");
?>

  <div class="container text-grey">
    <h2>search result(s)</h2>
    <form action="search.php" method="POST">
    <input type="text" name="search" placeholder="search">
    <button type="submit" name="submit-search">search</button>
  </div>


  <div class="article-container">
    <div class="row">
        <?php
            if(isset($_POST['submit-search'])){
                $search = mysqli_real_escape_string($connect, $_POST['search']);
                $sql = "SELECT * FROM shoes WHERE shoe_name LIKE '%$search%' OR shoe_brand LIKE '%$search%' OR shoe_gender LIKE '%$search%' OR shoe_material LIKE '%$search%'";
                $result = mysqli_query($connect, $sql);
                $queryResults = mysqli_num_rows($result);
                
                echo"<div class='container text-grey'><br>
                <p class='font_small text_left bold'> ".$queryResults." results</p>
                </div>";

                if($queryResults > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<div class='col s6'>
                                <a href='single_view.php?shoe_id=".$row['shoe_id']."'>
                                    <img src=".$row['shoe_img']." style='width:100%'>
                                    <p class='font_small text_center bold'>".$row['shoe_brand']."</p>
                                    <p class='font_medium text_center'>".$row['shoe_name']."</p>
                                    <p class='font_medium text_center'>$" .$row['shoe_price']."</p>
                                </a>
                            </div>";
                    }
                }else{
                    echo "There are no results matching your search";
                }


            }
          
        ?>
    </div>
  </div>

<?php
  include_once("includes/footer.php");
?>
