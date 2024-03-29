<?php

session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');


// create instance of Createdb class
$database = new CreateDb("mobile_project", "tbl_product");

if (isset($_POST['add'])){
     //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <style>
          /*
Removes white gap between slides
*/
.carousel {
  background:#444;
}

/*
Forces image to be 100% width and not max width of 100%
*/
.carousel-item .img-fluid {
  width:100%;
  height:650px;
}

/* 
anchors are inline so you need ot make them block to go full width
*/
.carousel-item a {
  display: block;
  width:100%;
}



/* css for 3 card  */
.custom-section .services-title {
  font-size: 45px;
  font-family: 'Jost', sans-serif;
  font-weight: bold; /* You can adjust the font weight as needed */
  color: var(--text-color); /* Set the desired text color */
  margin-bottom: 20px; /* Add margin to space it from the cards */
}
/*==================== CUSTOM STYLES ====================*/
.custom-section {
  max-width: 1140px;
  width: 100%;
  margin: 0 auto;
  padding: 3rem 0;
  min-height: 100vh;
  display: grid;
  place-items: center;
  background-color: transparent; /* Customize background if needed */
  text-align: center;
}

.custom-card-container {
  display: flex;
  flex-wrap: wrap;
  gap: 60px;
  justify-content: center;
  width: 100%;
  max-width: 90%;
  margin: auto;
  padding: 60px 0;
}

.custom-card-box {
  --dark-color: #2e2e2e;
  --dark-alt-color: #777777;
  --white-color: #ffffff;
  --button-color: #333333;
  --transition: 0.5s ease-in-out;

  font-family: inherit;
  height: 350px;
  width: 300px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  background: var(--dark-color);
  transition: var(--transition);
}

.custom-card-box::before,
.custom-card-box::after {
  content: "";
  position: absolute;
  z-index: -1;
  transition: var(--transition);
}

.custom-card-box::before {
  inset: -10px 50px;
  border-top: 4px solid var(--clr);
  transform: skewY(15deg);
  border-bottom: 4px solid var(--clr);
}

.custom-card-box:hover::before {
  inset: -10px 40px;
  transform: skewY(0deg);
}

.custom-card-box::after {
  inset: 60px -10px;
  border-left: 4px solid var(--clr);
  transform: skew(15deg);
  border-right: 4px solid var(--clr);
}

.custom-card-box:hover::after {
  inset: 40px -10px;
  transform: skew(0deg);
}

.custom-card-box .custom-card-data {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 30px;
  text-align: center;
  padding: 0 20px;
  height: 100%;
  width: 100%;
  overflow: hidden;
}

.custom-card-box .custom-card-data .custom-card-icon {
  height: 80px;
  width: 80px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 3rem;
  color: var(--text-color);
  background-color: var(--dark-color);
  transition: var(--transition);
}

.custom-card-box .custom-card-data .custom-card-icon {
  color: var(--clr);
  box-shadow: 0 0 0 4px var(--dark-color), 0 0 0 6px var(--clr);
}

.custom-card-box:hover .custom-card-data .custom-card-icon {
  color: var(--dark-color);
  background-color: var(--clr);
  box-shadow: 0 0 0 4px var(--dark-color), 0 0 0 300px var(--clr);
}

.custom-card-box .custom-card-data .custom-card-content {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 10px;
}

.custom-card-box .custom-card-data h3 {
  font-size: 1.5rem;
  font-weight: 500;
  color: var(--white-color);
  transition: var(--transition);
}

.custom-card-box:hover .custom-card-data h3 {
  color: var(--dark-color);
  transition: var(--transition);
}

.custom-card-box .custom-card-data p {
  font-size: 0.9rem;
  color: var(--dark-alt-color);
  transition: var(--transition);
}

.custom-card-box:hover .custom-card-data p {
  color: var(--dark-color);
  transition: var(--transition);
}

.custom-card-box .custom-card-data a {
  position: relative;
  display: inline-flex;
  padding: 8px 15px;
  text-decoration: none;
  font-weight: 500;
  margin-top: 10px;
  border: 2px solid var(--clr);
  color: var(--dark-color);
  background-color: var(--clr);
  transition: var(--transition);
}

.custom-card-box:hover .custom-card-data a {
  color: var(--clr);
  background-color: var(--dark-color);
}

.custom-card-box:hover .custom-card-data a:hover {
  border-color: var(--dark-color);
  color: var(--dark-color);
  background-color: var(--clr);
}


/* end of 3 card */


.social-icon-circle {
      display: inline-block;
      width: 60px; /* Set the desired width and height for the circle */
      height: 60px;
      text-align: center;
      line-height: 60px; /* Vertical alignment for the icon */
      border-radius: 50%; /* Create a circle using border-radius */
      margin: 10px; /* Adjust margin as needed */
      font-size: 24px; /* Set the desired font size for the icon */
    }
    </style>
    
</head>
<body>


<?php require_once ("php/header.php"); ?>


<!-- Full width slider template  -->
<div id="carousel-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
  <ol class="carousel-indicators">
    <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-2" data-slide-to="1"></li>
    <li data-target="#carousel-2" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">

    <div class="carousel-item active">
      <a href="#">

        <img src="image/1.jpg" alt="responsive image" class="d-block img-fluid">

        <div class="carousel-caption">
          <div>
            <h2>Digital Craftsmanship</h2>
            <p>We meticously build each products to get results</p>
            <span class="btn btn-sm btn-dark">Learn More</span>
          </div>
        </div>
      </a>
    </div>
    <!-- /.carousel-item -->

    <div class="carousel-item">
      <a href="#">
        <img src="image/2.jpg" alt="responsive image" class="d-block img-fluid">

        <div class="carousel-caption justify-content-center align-items-center">
          <div>
            <h2>Every project begins with a sketch</h2>
            <p>We work as an extension of your business to explore solutions</p>
            <span class="btn btn-sm btn-light">Our Process</span>
          </div>
        </div>
      </a>
    </div>
    <!-- /.carousel-item -->
    <div class="carousel-item">
      <a href="#">

        <img src="image/3.png" alt="responsive image" class="d-block img-fluid">

        <div class="carousel-caption justify-content-center align-items-center">
          <div style="color:red;">
            <h2>Performance Optimization</h2>
            <p>We monitor and optimize your site's long-term performance</p>
            <span class="btn btn-sm btn-secondary">Learn How</span>
          </div>
        </div>
      </a>
    </div>
    <!-- /.carousel-item -->
  </div>
  <!-- /.carousel-inner -->
  <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" ></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- /.carousel -->

<!-- End of full width slider -->

<!-- 
overlay image  -->

<section class="custom-section">
<h2 class="services-title">Our Services</h2>
  <section class="custom-card-container">
    <div class="custom-card-box" style="--clr: #89ec5b">
      <div class="custom-card-data">
        <div class="custom-card-icon">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        </div>
        <div class="custom-card-content">
          <h3>Email Support</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          <a href="#">Read More</a>
        </div>
      </div>
    </div>
    <div class="custom-card-box" style="--clr: #eb5ae5">
      <div class="custom-card-data">
        <div class="custom-card-icon">
        <i class="fa fa-headphones" aria-hidden="true"></i>
        </div>
        <div class="custom-card-content">
          <h3>24 x 7 tech Support</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          <a href="#">Read More</a>
        </div>
      </div>
    </div>
    <div class="custom-card-box" style="--clr: #5b98eb">
      <div class="custom-card-data">
        <div class="custom-card-icon">
        <i class="fa fa-cogs" aria-hidden="true"></i>
        </div>
        <div class="custom-card-content">
          <h3>Product Service</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
          <a href="#">Read More</a>
        </div>
      </div>
    </div>
  </section>
</section>


<!-- end overlay image  -->


<div class="container-fluid" style="background:#f2f2f2;padding-bottom:80px;">
<div class="container">
		<div class="row text-center py-5">
			<div class="col-md-12">
				<h2 class="services-title" style="text-align:center;margin-top:20px;margin-bottom:0;">Our Products</h2>
			</div>
		</div>
		<div class="row text-center">
			<?php
                $result = $database->getData();
                while ($row = mysqli_fetch_array($result)){
                    component($row['name'], $row['price'],$row['sellprice'],$row['description'], $row['imagename'], $row['id']);
                }
            ?>
        </div>
</div>
</div>
<footer class="bg-dark text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0 d-flex justify-content-between align-items-center">
    <!-- Copyright (Left Aligned) -->
    <div class="text-left">
      © 2023 Copyright:
      <a class="text-white" href="#">XYZ.com</a>
    </div>

    <!-- Social Icons (Right Aligned) -->
    <section class="mb-4 text-right">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
    </section>
    <!-- Social Icons -->
  </div>
  <!-- Grid container -->
</footer>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Zi7zqzItW5jtr9M8wEq1J5TFC+xol/3UnOe5x0CxhEFGftKZdSGZavkM6vOcQ3i5atwBJloM5b3QSSkNga41zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</body>
</html>
