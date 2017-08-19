<?php require("init.php");

$user = new User(); //instantiating the user class



if(isset($_POST['image_name'])) { //if we have a post superglobal


$user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']); //passing in the image_name and user_id to the user code


}


if(isset($_POST['photo_id'])) {


Photo::display_sidebar_data($_POST['photo_id']);


}





 ?>