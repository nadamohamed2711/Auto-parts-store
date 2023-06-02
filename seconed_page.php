<?php
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
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- Latest compiled JavaScript --> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="Css/style2.css">
</head>

<body>
  <div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
      <div class="nav-title">
        Car Project
      </div>
    </div>
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>

    <div class="nav-links">
      <a href=# target="_blank">Home</a>
      <a href=# target="_blank">About us</a>
      <a href=# target="_blank">Contact</a>
      <a href=# target="_blank">Services</a>
      <a href=# target="_blank">Log in</a>
    </div>
  </div>

  <div class="main">
    <ul class="cards">

      <?php
      $query = "SELECT * FROM product";
      $result = mysqli_query($connection, $query);


      while ($row = mysqli_fetch_array($result)) { ?>
        <li class="cards_item">
          <form action="" method="post">
            <div class="card">
              <div class="card_image"><img src="images/product_image/<?= $row['Image'] ?>" name="img"></div>
              <div class="card_content">
                <h2 class="card_title"><?= $row['Company'] ?></h2>
                <p class="card_text"> <?= substr($row['Description'], 0, 200) ?> </p>
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



               header('Location:thrid.php');

        

     
      
      }

  



      ?>




    </ul>
  </div>

  <h3 class="made_by">Made with ♡</h3>
</body>

</html>