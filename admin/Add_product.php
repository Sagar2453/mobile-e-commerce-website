
<?php
include "config.php";

// if(isset($_GET['id']))
// {   

//     $id=$_GET['id'];
//     $sql_s = "SELECT `id`, `name` FROM `tbl_country` WHERE `id`='$id'";
    
//     $result = $conn->query($sql_s);
    
//     if ($result->num_rows == 1) {

//         $row = $result->fetch_assoc();
//             echo '<script>';
//             echo 'document.getElementById("record_id").value = "' . $row['id'] . '";';
//             echo 'document.getElementById("inputCountryName").value = "' . $row['name'] . '";'; 
//             echo '</script>';
         
        
//         }
       
// }

    if(isset($_POST['submit'])){

        // $name = $_POST['inputCountryName'];
       
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $name = $_POST['productName'];
            $des = $_POST['productDescription'];
            $cat = $_POST['ddlprocat'];
            $price = $_POST['productPrice'];
            $sellprice = $_POST['productSellPrice'];
            $image = $_POST['record_iname'];
            echo $image;
            if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0)
            {
                $uploadDirectory = 'admin_upload/'; // Directory where you want to save the uploaded images
        
                // Generate a unique filename to prevent overwriting existing files
                $originalFileName = $_FILES['productImage']['name'];
                $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $extension;
        
                // Specify the full path for the uploaded file
                $uploadPath = $uploadDirectory . $uniqueFileName;
        
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadPath)) {
                    echo "File uploaded successfully!";
                    $sql = "UPDATE `tbl_product` SET `name`='$name',`description`='$des',`category`='$cat',`price`='$price',`sellprice`='$sellprice',`imagename`='$uniqueFileName' WHERE id='$id'";
    
                } else {
                    echo "Error uploading file.";
                }
            }
            else
            {
              
                $sql = "UPDATE `tbl_product` SET `name`='$name',`description`='$des',`category`='$cat',`price`='$price',`sellprice`='$sellprice',`imagename`='$image' WHERE id='$id'";
    
            }

       }
        else
        {
            $name = $_POST['productName'];
            $des = $_POST['productDescription'];
            $cat = $_POST['ddlprocat'];
            $price = $_POST['productPrice'];
            $sellprice = $_POST['productSellPrice'];
            $image = $_POST['record_iname'];

           
            if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === 0)
            {
                $uploadDirectory = 'admin_upload/'; // Directory where you want to save the uploaded images
        
                // Generate a unique filename to prevent overwriting existing files
                $originalFileName = $_FILES['productImage']['name'];
                $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid() . '.' . $extension;
        
                // Specify the full path for the uploaded file
                $uploadPath = $uploadDirectory . $uniqueFileName;
        
                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadPath)) {
                    echo "File uploaded successfully!";
                    $sql = "INSERT INTO `tbl_product`( `name`, `description`, `category`, `price`, `sellprice`, `imagename`) VALUES ('$name','$des','$cat','$price','$sellprice','$uniqueFileName')";
            
                } else {
                    echo "Error uploading file.";
                }
            }
            else
            {
                echo "No file was uploaded or an error occurred.";
            }
        }
        
        $result = $conn->query($sql);
        if ($result == true)
        {
            
            header( "Location: http://localhost/mobile/admin/All_products.php" ); 
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Products</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
             #ddlprocat {
        width: 300px; /* Set the width as needed */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none; /* Remove the default focus outline */
        font-size: 20px;
    }

    /* Style the dropdown options */
    #ddlprocat option {
        font-size: 20px;
    }
    .form-group {
            margin-bottom: 15px;
        }

        /* Style for labels */
        label {
            font-weight: bold;
            display: block;
        }

        /* Style for textareas */
        textarea.form-control {
            height: 100px; /* Adjust the height as needed */
        }

        /* Style for select elements */
        select.form-control {
            width: 100%;
        }

        /* Style for input fields */
        input.form-control,
        textarea.form-control,
        select.form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: none;
            font-size: 16px;
        }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Admin Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin_dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- user icon -->
                            <a class="nav-link" href="http://localhost/mobile/admin/usertable.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                                User 
                            </a>

                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutpro" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutpro" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="Add_product.php">Add Product</a>
                                    <a class="nav-link" href="All_products.php">All Products</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutorder" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fab fa-first-order"></i></div>
                                Orders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutorder" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    
                                    <a class="nav-link" href="All_orders.php">All Orders</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouten" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                                Enquiries
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouten" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="All_enquiry.php">All Enquiries</a>
                                </nav>
                            </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <!-- <h1 class="mt-4">Add Country</h1> -->
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol> -->
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    This page is an example of using static navigation. By removing the
                                    <code>.sb-nav-fixed</code>
                                    class from the
                                    <code>body</code>
                                    , the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.
                                </p>
                            </div>
                        </div> -->
                        

    <form enctype="multipart/form-data" action="" method="POST">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Product</h3>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            
                                            <div class="form-floating mb-3">
                                            
                                            <?php
                                            if(isset($_GET['id']))
                                            {   
                                            
                                                $id=$_GET['id'];
                                                $sql_s = "SELECT * FROM `tbl_product` WHERE `id`='$id'";
                                                
                                                $result = $conn->query($sql_s);
                                                
                                                if ($result->num_rows == 1) {
                                            
                                                    $row = $result->fetch_assoc();
                                                   
                                                echo ' <div class="form-group">
                                                <label for="productName">Product Name</label>
                                                <input class="form-control" id="productName" value="'.$row['name'].'" name="productName" type="text" placeholder="Product Name" required/>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="productDescription">Product Description</label>
                                                <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Product Description" required>'.$row['description'].'</textarea>
                                            </div>
                                            
                                            ';

                                            echo'<select id="ddlprocat" name="ddlprocat" required>';
                                            echo '<option value="0" disabled>-Select Category-</option>';
                                            
                                            $category = $row['category']; // Assuming $row['category'] contains the category value
                                            if ($category == "Phone") {
                                                echo '<option value="Phone" selected>Phone</option>';
                                                echo '<option value="Tablet">Tablet</option>';
                                                echo '<option value="Watch">Watch</option>';
                                            } elseif ($category == "Tablet") {
                                                echo '<option value="Phone">Phone</option>';
                                                echo '<option value="Tablet" selected>Tablet</option>';
                                                echo '<option value="Watch">Watch</option>';
                                            } else if($category == "Watch"){
                                                echo '<option value="Phone">Phone</option>';
                                                echo '<option value="Tablet">Tablet</option>';
                                                echo '<option value="Watch" selected>Watch</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="Phone">Phone</option>';
                                                echo '<option value="Tablet">Tablet</option>';
                                                echo '<option value="Watch">Watch</option>';
                                            }
                                        
                                            echo '</select>';       
                                             
                                           

                                            echo '<div class="form-group">
                                                <label for="productPrice">Product Price</label>
                                                <input class="form-control" id="productPrice" name="productPrice"  value="'.$row['price'].'" type="number" step="1" placeholder="Product Price" required/>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="productSellPrice">Product Sell Price</label>
                                                <input class="form-control" id="productSellPrice" name="productSellPrice" type="number"  value="'.$row['sellprice'].'" step="1" placeholder="Product Sell Price" required/>
                                            </div>

                                            <div class="form-group">
                                            <label for="productImage">Product Image</label>
                                            <img src="admin_upload/'.$row["imagename"].'" style="height:300px;width:300px;"> 
                                            <input type="file" id="productImage" name="productImage" accept="image/*"  value="admin_upload/'.$row["imagename"].'"/>
                                            <label class="upload-label" for="productImage">Choose Other File</label>
                                            <p class="selected-file">No file selected</p>
                                            
                                            </div>
                                            <input type="hidden" name="record_iname" id="record_iname" value="'.$row["imagename"].'"> 
                                            <input type="hidden" name="record_id" id="record_id" value="'.$row["id"].'"> 

                                        ';
                                                    
                                                    }


                                            
                                            }
                                            else{
                                                echo ' <div class="form-group">
                                                <label for="productName">Product Name</label>
                                                <input class="form-control" id="productName" name="productName" type="text" placeholder="Product Name" required/>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="productDescription">Product Description</label>
                                                <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Product Description" required></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label for="productcategory">Product Category</label>
                                            <select id="ddlprocat" name="ddlprocat" required>
                                            <option selected="true" value="0" disabled>-Select Category-</option>
                                                <option value="Phone">Phone</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Watch">Watch</option>
                                            </select>
                                             </div>
                                           

                                            <div class="form-group">
                                                <label for="productPrice">Product Price</label>
                                                <input class="form-control" id="productPrice" name="productPrice" type="number" step="1" placeholder="Product Price" required/>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label for="productSellPrice">Product Sell Price</label>
                                                <input class="form-control" id="productSellPrice" name="productSellPrice" type="number" step="1" placeholder="Product Sell Price" required/>
                                            </div>

                                            <div class="form-group">
                                            <label for="productImage">Product Image</label>
                                            <input type="file" id="productImage" name="productImage" accept="image/*" />
                                            <label class="upload-label" for="productImage">Choose File</label>
                                            <p class="selected-file">No file selected</p>
                                            
                                            </div>
                                            <input type="hidden" name="record_iname" id="record_iname"> 

                                        ';

                                                
                                                
                                                

                                                

                                            }
                                            ?>
                                                <!-- <input class="form-control" id="inputCountryName" name="inputCountryName"
                                                    type="text" placeholder="Country Name" required/>
                                                <label for="inputCountry" >Country Name </label> -->

                                            </div>
                                            
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid" style="justify-content: center;">
                                               
                                                    <button type="submit" class="btn btn-primary " value="submit" name="submit">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
    </form>

   


                        <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
              document.getElementById("productImage").addEventListener("change", function() {
            const selectedFile = this.files[0];
            const selectedFileLabel = document.querySelector(".selected-file");
            document.getElementById('record_iname').value = selectedFile.name;
            if (selectedFile) {
                selectedFileLabel.textContent = "Selected file: " + selectedFile.name;
            } else {
                selectedFileLabel.textContent = "No file selected";
            }
        });
        </script>
    </body>
</html>

