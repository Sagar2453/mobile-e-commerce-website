<?php
session_start();
if( $_SESSION['log']== "admin" )
{

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>All products</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
                        <li><button class="dropdown-item" id="logoutbtn">Logout</button></li>
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
                        <h1 class="mt-4">Product Table</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">City Table</li>
                        </ol> -->
                        <div class="card mb-4">
                            <div class="card-body">
                               Product Entries
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-product-hunt"></i>
                                Products
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Product Category</th>
                                            <th>Product Price</th>
                                            <th>Product Sell Price</th>
                                            <th>Product Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Product Category</th>
                                            <th>Product Price</th>
                                            <th>Product Sell Price</th>
                                            <th>Product Image</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php                                    
                                    include "config.php";

                                    $sql = "SELECT * FROM `tbl_product`";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                        
                                        while ($row = $result->fetch_assoc()) {
                        
                                ?>

                                    <tr>
                                    <td><?php echo $row['id']; ?></td>

                                     <td><?php echo $row['name']; ?></td>

                                     <td><?php echo $row['description']; ?></td>    

                                     <td><?php echo $row['category']; ?></td> 

                                     <td><?php echo $row['price']; ?></td> 

                                     <td><?php echo $row['sellprice']; ?></td> 

                                     <td><img src="admin_upload/<?php echo $row["imagename"]; ?>" height="100px" width="100px"></td>               
                                    <td><a class="btn btn-info" href="Add_product.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger delete-btn" data-id="<?php echo $row['id']; ?>" onclick="confirmDelete(this);">Delete</a></td>

                                    </tr>   
                                                        
                                                        

                                            <?php   
                                       }    

                                                }
                                                else{
                                                    
                                                echo "<tr>
                                                <td colspan='5'>
                                                    NO RECORD FOUND!
                                        </td>
                                            </tr>";
                                                }

                                            ?>   





                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            const loutbtn = document.getElementById("logoutbtn");
            loutbtn.addEventListener("click", function() {
            const confirmDeleteL = confirm("Are you sure you want to logout?");
            
            if (confirmDeleteL) {
                window.location.href = "logout.php";
            
            }

            });


            function confirmDelete(button) {
        const Id = button.getAttribute("data-id");
        const confirmDelete = confirm("Are you sure you want to delete this employee?");
        
        if (confirmDelete) {
            // User confirmed the deletion, so make an AJAX request to delete.php
            deleteEmployee(Id);
        }
    }

    function deleteEmployee(Id) {
        // Use AJAX to send the Id to delete.php
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_product.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                
                location.reload();
             }
            else if(xhr.status === 500){
               alert('Cannot delete the product as it has been ordered!');
            }
           
        };
        xhr.send(`productId=${Id}`);
    }

    
        </script>
    </body>
  
</html>
<?php
}
else if($_SESSION['log'] == "user"){
    header( "Location: http://localhost/mobile/admin/user_dashboard.php" ); 
    exit;
}
else{
    unset($_SESSION['log']);
    session_destroy();
    header( "Location: http://localhost/mobile/admin/index.php" ); 
    exit;
}
?>
