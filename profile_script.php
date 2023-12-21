<?php
require "includes/common.php";
session_start();
$user_id = $_SESSION['user_id'];


$email = $_POST['eMail'];
$email = mysqli_real_escape_string($con, $email);

$first = $_POST['firstName'];
$first = mysqli_real_escape_string($con, $first);

$last = $_POST['lastName'];
$last = mysqli_real_escape_string($con, $last);


$query = "SELECT * from users where email_id='$email'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);
if ($num != 0) {

    $m = "Email Already Exists";
    header('location: index.php?error2=' . $m);

} else {
    $query = "UPDATE users SET email_id='$email', first_name ='$first' , last_name='$last' WHERE id='$user_id' ";
    mysqli_query($con, $query);
    
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user_id;
    header('location:products.php');
}
?>