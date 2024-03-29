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
        <title>All Orders</title>
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
                        <h1 class="mt-4">Order Table</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">City Table</li>
                        </ol> -->
                        <div class="card mb-4">
                            <div class="card-body">
                               Order Entries
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fab fa-first-order"></i>
                                ORDERS
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Product Name</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                            <th>Product Name</th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php                                    
                                    include "config.php";

                                    $sql = "SELECT o.`id`, o.`fname` AS fname, o.`lname` AS lname, o.`email` AS email, o.`contact` AS contact, o.`address` AS address, GROUP_CONCAT(p.`name` SEPARATOR ', ') AS pname, o.`total` AS total FROM `order_items` AS oi INNER JOIN tbl_orders AS o ON oi.oid = o.id CROSS JOIN tbl_product AS p ON oi.pid = p.id GROUP BY o.`id`, o.`fname`, o.`lname`, o.`email`, o.`contact`, o.`address`, o.`total`";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                        
                                        while ($row = $result->fetch_assoc()) {
                        
                                ?>

                                    <tr>
                                    <td><?php echo $row['id']; ?></td>

                                     <td><?php echo $row['fname']; ?></td>

                                     <td><?php echo $row['lname']; ?></td>    

                                     <td><?php echo $row['email']; ?></td> 

                                     <td><?php echo $row['contact']; ?></td> 

                                     <td><?php echo $row['address']; ?></td> 

                                     <td><?php echo $row['pname']; ?></td> 

                                     <td><?php echo $row['total']; ?></td> 

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
        const employeeId = button.getAttribute("data-id");
        const confirmDelete = confirm("Are you sure you want to delete this employee?");
        
        if (confirmDelete) {
            // User confirmed the deletion, so make an AJAX request to delete.php
            deleteEmployee(employeeId);
        }
    }

    function deleteEmployee(employeeId) {
        // Use AJAX to send the employeeId to delete.php
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "deleteproduct.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from delete.php if needed
                // You can update the UI or perform any other actions here
                location.reload();
            }
        };
        xhr.send(`employeeId=${employeeId}`);
    }

    
        </script>
    </body>
  
</html>
<?php
}
else if($_SESSION['log'] == "user"){
    header( "Location: http://localhost/manas/intern_project/user_dashboard.php" ); 
    exit;
}
else{
    unset($_SESSION['log']);
    session_destroy();
    header( "Location: http://localhost/manas/intern_project/index.php" ); 
    exit;
}
?>

