<?php
include "config.php";

if (isset($_GET['id']) && isset($_GET['op'])) {


    $id = $_GET['id']; 
    $op = $_GET['op']; 
    if($op=="a")
    {
    $sql = "UPDATE `tbl_user` SET `status`='Active' WHERE `id`='$id'"; 
    }
    else{
        $sql = "UPDATE `tbl_user` SET `status`='Block' WHERE `id`='$id'"; 
    }

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "<script>alert('Employee Updated successfully.')</script>";
            
            header( "Location: http://localhost/manas/intern_project/usertable.php" ); 
            exit;

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }
}
?>