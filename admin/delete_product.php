<?php
include "config.php";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["productId"])) {
    // Retrieve the Id from the POST request
    $pId = $_POST["productId"];

   
    $sql = "DELETE FROM `tbl_product` WHERE `id`='$pId'";

     $result = $conn->query($sql);

if (!$result) {
        http_response_code(500); // Internal Server Error
        echo "An error occurred while deleting the product.";
    } else {
       
        echo "Product with ID $pId has been deleted.";
    }
    
} else {
    // Handle invalid or missing data
    http_response_code(400); // Bad Request
    echo "Invalid request.";
}


?>