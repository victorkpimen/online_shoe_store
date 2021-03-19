<?php
  include_once("includes/header.php");
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
                echo "'s cart</h2>";
            }
    ?>
  </div>


<?php
    $shoe_id = mysqli_real_escape_string($connect, $_GET['shoe_id']);
    $shoe_name = mysqli_real_escape_string($connect, $_GET['shoe_name']);
    $shoe_price = mysqli_real_escape_string($connect, $_GET['shoe_price']);
    $shoe_size = mysqli_real_escape_string($connect, $_GET['shoe_size']);
    $shoe_colour = mysqli_real_escape_string($connect, $_GET['shoe_colour']);
    
    echo "<h4>Name: ".$shoe_name."</h4>
        <p>Size: ".$shoe_size."</p>
        <p>Colour: ".$shoe_colour."</p>
        <p>Price: ".$shoe_price."<br></p>
        <form method='POST'>
            <p>Quantity: <input type='text' name='quantity' id='quantity'></p>
            <input type='submit' onclick='myfunc()' value='Purchase'>
        </form>
        ";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = mysqli_real_escape_string($connect, $_POST['quantity']);
        
        if($quantity!=NULL){
            $sql = "UPDATE stock SET shoe_stock = (shoe_stock-$quantity) WHERE shoe_id = $shoe_id AND shoe_size = $shoe_size AND shoe_colour = '$shoe_colour'";
            if(mysqli_query($connect, $sql)){
                echo "<p>congratulations.. you have purchased shoes from the worlds best shoe shop</p>";
            }else{
                echo "<p>we do not have enough stock to process your request.. sorry</p>";
            }
        }
    }
    ?>
<div>

<script>
    function myfunc(){
        return true;
    }
</script>
</div>


<?php
    include_once("includes/footer.php");
?>

