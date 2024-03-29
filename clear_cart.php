<?php
session_start(); // Start the session
unset($_SESSION['cart']); // Clear the cart session
echo "Cart cleared successfully"; // Response message
?>