<?php

session_start();

require_once ("php/CreateDb.php");
require_once ("php/component.php");
include "config.php";


$db = new CreateDb("mobile_project", "tbl_product");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
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
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        
        body {
    font-family: Arial, sans-serif;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #F7F7F7;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    position: relative;
}

.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
}

.input-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.input-group input,
.input-group select {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

#placeOrderBtn {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
}

#placeOrderBtn:hover {
    background-color: #45a049;
}



.modal-confirm {		
	color: #636363;
	width: 325px;
	font-size: 14px;
}
.modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -15px;
}
.modal-confirm .form-control, .modal-confirm .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -5px;
}	
.modal-confirm .modal-footer {
	border: none;
	text-align: center;
	border-radius: 5px;
	font-size: 13px;
}	
.modal-confirm .icon-box {
	color: #fff;		
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -70px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #82ce34;
	padding: 15px;
	text-align: center;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-confirm .icon-box i {
	font-size: 58px;
	position: relative;
	top: 3px;
}
.modal-confirm.modal-dialog {
	margin-top: 80px;
}
.modal-confirm .btn {
	color: #fff;
	border-radius: 4px;
	background: #82ce34;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
	background: #6fb32b;
	outline: none;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}

        </style>
</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                $total = 0;

                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $product_id_json = json_encode($product_id);
                        $result = $db->getData();
                        while ($row = mysqli_fetch_array($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['imagename'], $row['name'],$row['sellprice'], $row['id']);
                                    $total = $total + (int)$row['sellprice'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₹<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>₹<?php  
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

            <div class="pt-4">  
                <h6>CHECKOUT</h6>
                <hr>
                <button class="checkout-button" id="checkoutBtn">Checkout</button>        
            </div>

        </div>

    </div>
</div>
<div id="checkoutModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 style="text-align:center">Checkout</h2>
       
        <form id="checkoutForm">
    <div class="mb-3">
        <label for="fname" class="form-label">First Name:</label>
        <input type="text" class="form-control" id="fname" name="fname" required>
    </div>

    <div class="mb-3">
        <label for="lname" class="form-label">Last Name:</label>
        <input type="text" class="form-control" id="lname" name="lname" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <textarea class="form-control" id="address" name="address" rows="4" required></textarea>
    </div>

    <div class="mb-3">
        <label for="contact" class="form-label">Contact:</label>
        <input type="number" class="form-control" id="contact" name="contact" required>
    </div>
    <div class="mt-4 mb-0">
                                                <div class="d-grid" style="justify-content: center;">
                                                    
                                                        <button type="submit" class="btn btn-primary" id="placeOrderBtn">Place Order</button>
                                                    </div>
                                            </div>
   
</form>

    </div>
</div>
    
<!-- <a href="#myModal" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a>
  </div> -->

  <!-- Modal HTML -->
  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="material-icons">&#xE876;</i>
          </div>
          <h4 class="modal-title w-100">Awesome!</h4>
        </div>
        <div class="modal-body">
          <p class="text-center">Your Order has been confirmed!.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success btn-block" data-dismiss="modal" id="okButton">OK</button>
        </div>
      </div>
    </div>
  </div>

     
          
   
    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    const checkoutModal = document.getElementById("checkoutModal");
    const checkoutBtn = document.getElementById("checkoutBtn");
    const closeModalBtn = document.getElementsByClassName("close")[0];
    const checkoutForm = document.getElementById("checkoutForm");

    checkoutBtn.addEventListener("click", function () {
        checkoutModal.style.display = "block";
    });

    closeModalBtn.addEventListener("click", function () {
        checkoutModal.style.display = "none";
    });

    checkoutForm.addEventListener("submit", function (e) {
        e.preventDefault();
        // Get form data
        const formData = new FormData(checkoutForm);
        // Convert form data to JSON
        var jsonData = {};
        formData.forEach((value, key) => {
            jsonData[key] = value;
        });
      
        jsonData.product_ids = <?= $product_id_json; ?>; 
        jsonData.total = <?= $total; ?>; 
        console.log(jsonData);
        
   
        // Send an AJAX request to insert data into tbl_order
        $.ajax({
            type: "POST",
            url: "insert_order.php", // Replace with your server-side script URL
            data: JSON.stringify(jsonData),
            contentType: "application/json",
            success: function (response) {
                // Handle the response (e.g., show a confirmation message)
                console.log(response);
                // Close the modal
                
                $.ajax({
                        url: 'clear_cart.php', // Replace with the actual URL of your PHP script
                        type: 'POST',
                        success: function (clearResponse) {
                            console.log(clearResponse); // Log the response from the clear_cart.php script
                            // alert('YOUR ORDER HAS BEEN SUCCESSFULLY PLACED');
                             //window.location.reload();
                            var modal = document.getElementById("myModal");

                            // You can use Bootstrap's JavaScript method to show the modal
                            $(modal).modal("show");
                            document.getElementById("okButton").addEventListener("click", function () {
                                // Redirect to the home page URL
                                window.location.href = "index.php"; // Replace with your home page URL
                            });
                            document.addEventListener("click", function (event) {
                                // Check if the clicked element is outside the modal
                                if (event.target === modal) {
                                    // Redirect to the shop.php page
                                    window.location.href = "index.php"; // Replace with your desired URL
                                }
                            });
                            // window.location.href = "shop.php"; 
                        }
                    });
                 checkoutModal.style.display = "none";
            },
            error: function (error) {
                // Handle errors (e.g., display an error message)
                console.error(error);
            }
        });
    });
});


    
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
