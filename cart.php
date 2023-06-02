<?php
session_start();
if ( isset($_SESSION['user']))
{
	$user=$_SESSION['user'];
	$connection = mysqli_connect("localhost", "amr", "12345", "cardb");
	$query = "SELECT * FROM product_user where email = '$user'";
	$result = mysqli_query($connection, $query);





}
if(isset($_POST['add']))
{
$_SESSION['total']=rand(10,800);
echo $_SESSION['total'];
header('Location:pay.html');
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Update Quantity Shopping Cart Example</title>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
	<!-- Demo CSS (No need to include it into your project) -->
	<link rel="stylesheet" href="css/demo.css">
  
  </head>
  <body>
 
      
 <main>
     <!-- Start DEMO HTML (Use the following code into your project)-->
<header id="site-header">
		<div class="container">
			<h1>Shopping cart </h1>
		</div>
	</header>

	<div class="container">
		<?php
	while ($row = mysqli_fetch_array($result)) { ?>

		<section id="cart"> 
			<article class="product">
				<header>
					<a class="remove">
						<img src="./images/product_image/<?=$row["part"]?>.jpg" alt="item">

						<h3>Remove product</h3>
					</a>
				</header>

				<div class="content">

					<h1><?=$row["part"]?></h1>
					<h1><?=$row["company"]?></h1>
					
		
		
					<div title="You have selected this product to be shipped in the color yellow." style="top: 0" class="color yellow"></div>
			
				</div>

				<footer class="content">
					<span class="qt-minus">-</span>
					<span class="qt"><?=$row["quantity"]?></span>
					<span class="qt-plus">+</span>

					<h2 class="full-price">
					<?=$row["price"]?>
					</h2>

					<h2 class="price">
					<?=$row["price"]?>
					</h2>
				</footer>
			</article>

		
		</section>


		<?php }?>


	</div>

	<footer id="site-footer">
		<div class="container clearfix">

			<div class="left">
				<h2 class="subtotal">Subtotal: <span></span>€</h2>
				<h3 class="tax">Taxes (5%): <span></span>€</h3>
				<h3 class="shipping">Shipping: <span>5.00</span>€</h3>
			</div>

			<div class="right">
				<h1 class="total">Total: <span>177.16</span>€</h1>
				<form method="post">
					<input type="submit" name="add" value="Check out" style="background: grey;border: 0;padding: 20px;">
					<input type="text" class="hiden" name="total">

				</form>
				
			</div>

		</div>
	</footer>
     <!-- END EDMO HTML (Happy Coding!)-->
 </main>
 
      
 
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/cart.js"></script> 
      
      
      
              
  </body>
</html>