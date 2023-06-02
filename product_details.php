<?php
session_start();
$company=$_SESSION["company"];
$image=$_SESSION['image'];
$part=$_SESSION['part'];
$price=$_SESSION['price'];
$quantity=$_SESSION['Quantity'];
$description=$_SESSION['description'];
require "mysqli_db.php";
if(isset($_POST['add']))
{
    if(isset($_SESSION['user']))
    {
        $r=$_SESSION['user'];
      
        $sql = "SELECT COUNT(*) as count FROM product_user where company='$company' and part='$part' and email='$r'";

        // Execute query and get result
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        if ($row['count']==0) {
           
          

                

                $sql = "INSERT INTO product_user
                    VALUES ('$company', '$part', '$r',1,'$price')";

                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }




        }
        else
        {
            echo "already in";
        }

  
    }
else
echo "not user";
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <link rel="stylesheet" href="./Css/product_details.CSS"type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Card UI Design</title>

    <!-- Vendor Script -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="main.js"></script>
</head>

<body>

    <div class="container">
        <div class="imgBx">
            <img src="images/product_image/<?=$image?>" alt="Nike Jordan Proto-Lyte Image" width="500px" height="500px">
        </div>
        <div class="details">
            <div class="content">
                <h2><?=$part?> <br>
                    <span><?=$company?></span>
                </h2>
                <p><?=$description?></p>
                <p class="product-colors">Modes:
                    <span class="black active" data-color-primary="#000000" data-color-sec="#212121" data-pic="images/product_image/<?=$image?>?raw=true"></span>
                    <span class="red" data-color-primary="#7E021C" data-color-sec="#bd072d" data-pic="images/product_image/<?=$image?>?raw=true"></span>
                    <span class="orange" data-color-primary="#CE5B39" data-color-sec="#F18557" data-pic="images/product_image/<?=$image?>?raw=true"></span>
                </p>
                
                <div class="product-quantity">
                <label for="product-quantity-input" class="product-quantity-label">Quantity</label>
                        <div class="product-quantity-subtract">
                          <i class="fa fa-chevron-left"></i>
                        </div>
                     <div>
                     <input type="text" id="product-quantity-input" placeholder="0" value="<?=$quantity?>" readonly />
                     </div>
                  <div class="product-quantity-add">
                    <i class="fa fa-chevron-right"></i>
                  </div>
              </div>
                <h3><?=$price?>$</h3>
                <form method="post">
                    
                    <button type="submit" name="add" >Add to cart</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <a href="https://stylustechnepal.com" target="_blank">anuzbvbmaniac123@gmail.com</a>
    </footer>


    <script>
        // Change The Picture and Associated Element Color when Color Options Are Clicked.
        $(".product-colors span").click(function() {
            $(".product-colors span").removeClass("active");
            $(this).addClass("active");
            $(".active").css("border-color", $(this).attr("data-color-sec"))
            $("body").css("background", $(this).attr("data-color-primary"));
            $(".content h2").css("color", $(this).attr("data-color-sec"));
            $(".content h3").css("color", $(this).attr("data-color-sec"));
            $(".container .imgBx").css("background", $(this).attr("data-color-sec"));
            $(".container .details button").css("background", $(this).attr("data-color-sec"));
            $(".imgBx img").attr('src', $(this).attr("data-pic"));
        });
        
      
    </script>

</body>

</html>