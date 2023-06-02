<?php
ob_start();
$connection = mysqli_connect("localhost", "amr", "12345", "cardb");
if(!isset($_SESSION))
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="Css/AllProduct.CSS" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>


<nav>
  <ul id="menuitems">
    <li><a href="#">Home</a></li>
    <li><a href="#">About Us</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="cart.php">MY Cart</a></li>
    <li><button class="logbtn" onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button></li>
  </ul>
</nav>


<div class="main">

  <p class="p2" align="center">Car Parts</p>

  <ul class="cards">
    
  <?php
      $query = "SELECT * FROM product";
      $result = mysqli_query($connection, $query);


      while ($row = mysqli_fetch_array($result)) { ?>
        <li class="cards_item">
          <form action="" method="post">
            <div class="card">
              <div class="card_image"><img src="images/product_image/<?= $row['Image'] ?>" name="img" width="500px"></div>
              <div class="card_content">
                <h2 class="card_title"><?= $row['Part'] ?></h2>
                <p class="card_text" style="text-align: center;" > <?= substr($row['Price'], 0, 30) ?>$ </p>

                <input type="hidden" name="company" value="<?= $row['Company'] ?>">
                <input type="hidden" name="description" value="<?= $row['Description'] ?>"> 
                 <input type="hidden" name="image" value="<?= $row['Image'] ?>">
                <input type="hidden" name="price" value="<?= $row['Price'] ?>">
                <input type="hidden" name="Quantity" value="<?= $row['Quantity'] ?>">
                <input type="hidden" name="part" value="<?= $row['Part'] ?>">
                
                <button type="submit" name="read" class="btn card_btn">Read More</button>
              </div>
            </div>

          </form>
        </li>
      <?php } ?>
      <?php
      if (isset($_POST['read']))
      {
        foreach($_POST as $e=>$r)
        $_SESSION[$e]=$r;
        header('Location:product_details.php');
      }
      ob_end_flush();
     ?>
  </ul>
</div>

