<?php
require("includes/common.php");
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "UPDATE users_products SET status='Ordered' WHERE user_id='$user_id' AND item_id = '$item_id'  AND status='Added to cart'";
    mysqli_query($con, $query);
    header('location: products.php');
}
?>   

