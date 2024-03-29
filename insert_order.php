<?php
// Replace with your database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mobile_project";

// Create a database connection (you should use PDO or mysqli with prepared statements for security)
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the JSON data from the POST request
$data = json_decode(file_get_contents("php://input"));

// Extract data from JSON
$fname = $data->fname;
$lname = $data->lname;
$email = $data->email;
$password = $data->password;
$address = $data->address;
$contact = $data->contact;
$total = $data->total;
$productids = json_encode($data->product_ids); // Convert product IDs back to JSON

// Insert data into tbl_order
$sql = "INSERT INTO tbl_orders (fname, lname, email, password, address, contact ,total)
        VALUES ('$fname', '$lname', '$email', '$password', '$address', '$contact','$total')";




if (mysqli_query($conn, $sql)) {
    // Order inserted successfully
    $lastInsertId = $conn->insert_id;
    foreach ($data->product_ids as $key => $val)
     {
        $sql_oi = "INSERT INTO `order_items`( `oid`, `pid`) VALUES ('$lastInsertId','$val')";
        mysqli_query($conn, $sql_oi);
    }
    $response = array("message" => "Order placed successfully");
    echo json_encode($response);
} else {
    // Error occurred during insertion
    $response = array("error" => "Error placing order: " . mysqli_error($conn));
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>
