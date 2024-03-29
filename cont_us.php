<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Contact Us - User</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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


<body class="bg-dark">
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
                                                <input class="form-control" id="inputName" name="inputName"
                                                    type="text" placeholder="sweet name" required />
                                                <label for="inputEmail" >Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="inputEmail"
                                                    type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail" >Email address</label>
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
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;  2023</div>
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
    </form>

    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Zi7zqzItW5jtr9M8wEq1J5TFC+xol/3UnOe5x0CxhEFGftKZdSGZavkM6vOcQ3i5atwBJloM5b3QSSkNga41zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="js/scripts.js"></script>
</body>

</html>