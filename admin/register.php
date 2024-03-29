<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php
include "config.php";
if (isset($_POST['submit'])) {

    $first_name = $_POST['inputFirstName'];

    $last_name = $_POST['inputLastName'];

    $email = $_POST['inputEmail'];

    $pass =md5($_POST['inputPasswordConfirm']);
   
    $checkEmail = "SELECT * FROM `tbl_user` WHERE `email`='$email'";
$checkEmailResult = $conn->query($checkEmail);

if ($checkEmailResult->num_rows > 0) {
    echo '<script>alert("User with this email already exists. Please use a different email address.");</script>';
} 
else{

    $sql = "INSERT INTO `tbl_user`(`firstname`, `lastname`,`email`,`password`) VALUES ('$first_name','$last_name','$email','$pass')";

    $result = $conn->query($sql);

    if ($result == TRUE) {  
        // header( "Location: list.php" ); 
        // exit;
     echo "<script>alert('New User created successfully.')</script>";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }
}


?>


<body class="bg-primary">
    <form action="" method="post">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text"
                                                            placeholder="Enter your first name" required name="inputFirstName" />
                                                        <label for="inputFirstName" >First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName"
                                                            name="inputLastName" type="text"
                                                            placeholder="Enter your last name" required/>
                                                        <label for="inputLastName" >Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="inputEmail"
                                                    type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail" >Email address</label>
                                            </div>
                                            <div class="row mb-3">
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
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid" style="justify-content: center;">
                                                    <!-- <a class="btn btn-primary btn-block" href=""
                                                        type="submit">Create Account</a> -->
                                                        <button type="submit" class="btn btn-primary " value="submit" name="submit">REGISTER</button>
                                                    
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Have an account? Go to login</a></div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>