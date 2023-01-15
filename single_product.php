<?php
 include('server/connection.php');
	if(isset($_GET['product_id'])){

		$product_id = $_GET['product_id'];
		$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? ");
		$stmt->bind_param("i",$product_id);

		$stmt->execute();
		
		$product = $stmt->get_result();

	}else{
		//If you try passing or navigation to product_id without specifying the ID
		//Take user back to index.php
		header('location:index.php');
	}
?>
 
 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


	<link rel="stylesheet" href="assests/css/styles1.css">


</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light py-3 fixed-top bg-white">
		<div class="container">
			<img class="logo" src="assests/imgs/logo111.jpg" />
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

					<li class="nav-item">
						<a class="nav-link" href="index.html">Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="shop.html">Shop</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Blog</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">
							<i class="fa-solid fa-cart-shopping"></i>
							<i class="fa-solid fa-user"></i>
						</a>
					</li>

				</ul>

			</div>
		</div>
	</nav>
	</nav>

	<!--SINGLE-->
	<section class="single-product my-5 pt-5">
		<div class="row mt-5">


		<?php while($row = $product->fetch_assoc()) {?>
			
			<div class="col-lg-5 col-md-6 col-sm-12">
				<img classs="img-fluid w-100 pb-1"src="assests/imgs/<?= $row['product_image']; ?>" id="mainImg">
				<div class="small-img-group">
					<div class="small-img-col">
						<img src="assests/imgs/<?= $row['product_image2']; ?>" width="100%" class="small-img" />
					</div>

					<div class="small-img-col">
						<img src="assests/imgs/<?= $row['product_image3']; ?>" width="100%" class="small-img" />
					</div>

					<div class="small-img-col">
						<img src="assests/imgs/<?= $row['product_image4']; ?>.jpg" width="100%" class="small-img" />
					</div>

			
				</div>
			</div>

		
			<div class="col-lg-6 col-md-12 col-12">
				<h6>Men/Shoes</h6>
				<h3 class="py-4"><?= $row['product_name']; ?></h3>
				<h2>R<?= $row['product_price']; ?></h2>

				<form method="POST" action="cart.php">
					<input type="hidden" name="product_id" value="<?= $row['product_id']; ?>"/>
					<input type="hidden" name="product_image" value="<?= $row['product_image']; ?>"/>
					<input type="hidden" name="product_name" value="<?= $row['product_name']; ?>" />
					<input type="hidden" name="product_price" value="<?= $row['product_price']; ?>" />
					
					<input type="number" name="product_quantity" value="1">
					<button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
				</form> 
				
				<h4 class="mt-5 mb-5">Product Details</h4>
				<span><?= $row['product_description']; ?></span>

			</div>



			<?php } ?>
		</div>
	</section>


	<!--FOOTER-->
	<footer class="" mt-5 py-5>
		<div class="row container mx-auto pt-5">
			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<img class="logo" src="assests/imgs/logo111.jpg" alt="">
				<p class="pt-3">We provide the best products for the most affordable prices</p>
			</div>

			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<h5 class="pb-2">Featured</h5>
				<ul class="text-uppercase">
					<li><a href="#">Men</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Boys</a></li>
					<li><a href="#">Girls</a></li>
					<li><a href="#">New Arrivals</a></li>
					<li><a href="#">Clothes</a></li>
				</ul>
			</div>

			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<h5 class="pb-2">Contact Us</h5>
				<div>
					<h6 class="text-uppercase">Address</h6>
					<p>123 Lalas Street</p>
				</div>

				<div>
					<h6 class="text-uppercase">Phone</h6>
					<p>+ (27) 6374956332</p>
				</div>

				<div>
					<h6 class="text-uppercase">Email</h6>
					<p>info@gmail.com</p>
				</div>
			</div>
			<div class="footer-one col-lg-3 col-md-6 col-sm-12">
				<h5 class="pb-2">Instagram</h5>
				<div class="row">
					<img src="assests/imgs/featured1.jpg" class="img-fluid w-25 h-100 m2" alt="">
					<img src="assests/imgs/featured2.jpg" class="img-fluid w-25 h-100 m2" alt="">
					<img src="assests/imgs/featured3.jpg" class="img-fluid w-25 h-100 m2" alt="">
					<img src="assests/imgs/featured4.jpg" class="img-fluid w-25 h-100 m2" alt="">


				</div>
			</div>
		</div>

		<div class="copyright mt-5">
			<div class="row container mx-auto">
				<div class="col-lg-3 col-md-5 col-sm-12 mb-4">
					<img src="assests/imgs/payment.png" alt="">
				</div>

				<div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
					<p>eCommerce @ 2023 All Rights Reserved</p>
				</div>

				<div class="col-lg-3 col-md-5 col-sm-12 mb-4">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
		</div>

	</footer>






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">

	</script>

	<script>
		var mainImg  = document.getElementById("mainImg");
		var smallImg = document.getElementsByClassName("small-img");

		for(let i = 0; i < 4; i++){

			smallImg[i].onClick =  function(){
			mainImg.src = smallImg[i].src;
		}

		}
	
	</script>
</body>

</html>

<!--Continue form 40-->