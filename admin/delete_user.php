<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

//copyed by the dele_photo.php and replacing the photo by user
if(empty($_GET['id'])) {

redirect("users.php");


}

$user = User::find_by_id($_GET['id']);

if($user) {

$session->message("The {$user->username} user has been deleted");

$user->delete_photo();
session_destroy(); //destrying a session and leaving the user out
redirect("../index.php");


} else {



redirect("users.php");


}










 ?>