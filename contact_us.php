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
    <title>Contact Us</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="admin/css/style.css">
    <link href="css/styles.css" rel="stylesheet" />
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
  height:auto;
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
<?php
include "config.php";
if (isset($_POST['submit'])) {



    $name = $_POST['inputName'];

    $email = $_POST['inputEmail'];

    $msg =$_POST['inputMsg'];
   

    $sql = "INSERT INTO `tbl_enquiry` ( `name`, `email`, `message`) VALUES ('$name', '$email', '$msg');";

    $result = $conn->query($sql);

    if ($result == TRUE) {  
        // header( "Location: list.php" ); 
        // exit;
     echo "<script>alert('Enquiry successfully submitted.Continue Shopping with us.')</script>";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  
}


?>
<body>


<?php require_once ("php/header.php"); ?>

<form action="" method="post">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Contact Us</h3>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            
                                            <div class="form-floating mb-3">
											<label for="inputEmail" >Name</label>
                                                <input class="form-control" id="inputName" name="inputName"
                                                    type="text" placeholder="Good name" required />
                                                
                                            </div>
                                            <div class="form-floating mb-3">
											<label for="inputEmail" >Email address</label>
                                                <input class="form-control" id="inputEmail" name="inputEmail"
                                                    type="email" placeholder="name@example.com" required />
                                                
                                            </div>
                                            <div class="form-group">
                                             <label for="inputMsg">Message</label>
                                            <textarea class="form-control rounded-0" id="inputMsg" name="inputMsg" rows="3" required></textarea>
                                            </div>
                                            <!-- <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword"
                                                            name="inputPassword" type="password"
                                                            placeholder="Create a password" required/>
                                                        <label for="inputPassword" >Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm"
                                                            name="inputPasswordConfirm" type="password"
                                                            placeholder="Confirm password"required />
                                                        <label for="inputPasswordConfirm" >Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid" style="justify-content: center;">
                                                    <!-- <a class="btn btn-primary btn-block" href=""
                                                        type="submit">Create Account</a> -->
                                                        <button type="submit" class="btn btn-dark " value="submit" name="submit">SEND</button>
                                                    
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Go to shop</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
</form>
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
