<?php
session_start();
    //  if( )
    //  {
            if(isset($_SESSION['log']) && $_SESSION['log'] == "admin" ){
                header( "Location: http://localhost/mobile/admin/admin_dashboard.php" ); 
                exit;
            }
            else if(isset($_SESSION['log']) && $_SESSION['log'] == "user"){
                header( "Location: http://localhost/mobile/admin/user_dashboard.php" ); 
                exit;
            }
//  }
    else 
    {
        $_SESSION['log']= null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php 
include "config.php";

$_SESSION['log']= false;


if(isset($_POST['btnlogin']))
{
    $email = $_POST['inputEmail'];
    $pass =md5($_POST['inputPassword']);

    // echo "<script> console.log(' $email,$pass')</script>";
    $sql = "Select * from `tbl_user` WHERE `email`='$email' and `password`='$pass' and `status`='Active'"; 
    $result = $conn->query($sql); 
   
    if ($result->num_rows > 0) {

        if($email=="admin@gmail.com"){
            // echo "<script>alert('Logged in successfully.')</script>";
            $_SESSION['log']= "admin";
            $_SESSION['uname'] ="admin";
            // setcookie("xyz","1",time() +60);
            header( "Location: http://localhost/mobile/admin/admin_dashboard.php" ); 
            exit;
        }
        else {
            $username ="";
            if ($result->num_rows > 0) {
        
                while ($row = $result->fetch_assoc()) {
                    $username = $row['firstname'];
                }
            }
        // echo "<script>alert('Logged in successfully.')</script>";
        $_SESSION['log']= "admin";
		$_SESSION['uname'] = "admin";
        header( "Location: http://localhost/mobile/admin/admin_dashboard.php" ); 
        exit;
        }

    }else{
        echo '<script>';
        echo '$(document).ready(function() {';
        echo '$("#invalidCredentialsModal").modal("show");';
        echo '});';
        echo '</script>';
        
       // echo "<script>alert('Invalid Credentials!')</script>";

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
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="inputEmail" type="email"
                                                placeholder="name@example.com" required />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="inputPassword" type="password"
                                                placeholder="Password"  required/>
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember
                                                Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Forgot Password?</a>
                                            <!-- <a class="btn btn-primary" name="btnlogin" >Login</a> -->
                                            <button type="submit" class="btn btn-primary" value="submit" name="btnlogin">LOGIN</button>
                                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invalidCredentialsModal">
  Login
</button>       
                                        </div> -->
                                        
                                        <div class="modal fade" id="invalidCredentialsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Invalid Credentials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Your login credentials are invalid. Please try again.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="http://localhost/mobile/admin/register.php">Need an account? Sign up!</a></div>
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
                        <div class="text-muted">Copyright &copy; 2023</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</form>
</body>

</html>
<?php
    }
?>