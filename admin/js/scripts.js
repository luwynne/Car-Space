$(document).ready(function(){
	//so that when cicking on the picture, the apply button will be displayed
	//some elements from photo_library_modal.php are targeted

var user_href;
var user_href_splitted;
var user_id;
var image_src;
var image_href_splitted;
var image_name;
var photo_id;




//CHANGING THE BUTTOM
$(".modal_thumbnails").click(function(){ //when clicking the modal frame, then do something
										

$("#set_user_image").prop('disabled', false); //the button disabled is set to true, so we have to enable that to false

$(this).addClass('selected');

//GRABBING THE USER ID
user_href = $("#user-id").prop('href'); //grabbing the user id that comes from  the Delete buttom assigning to user href
user_href_splitted = user_href.split("="); //refers to the = signing that comes from the the get it in the delet buttom. Splitting the information
										//the array will be dividev into before the = and after the =	
user_id = user_href_splitted[user_href_splitted.length -1]; //getting the user id. Going to the end of the array and subtractig per 1
														//so this is gonna gives us the value after the = sign

//GRABBING THE IMAGE NAME
image_src = $(this).prop("src"); //Specific information that we are clicking
image_href_splitted = image_src.split("/");//splitting with /
image_name = image_href_splitted[image_href_splitted.length -1]; //taking infromation that comes after the / on the path, so the image name

photo_id = $(this).attr("data"); //


	$.ajax({ //ajax object
		url: "includes/ajax_code.php", //information to be sent here. The post will be sent to there
		data:{photo_id:photo_id}, //sending the photo id 
		type: "POST", //catching the post on the php side
		success:function(data) { //setting success. If we have any time of error
			if(!data.error) { //then we are allerting something out
				
			$("#modal_sidebar").html(data);	//this is in the photo_library_modal
			
			}
		}

});




});

//ajax refreshing the photo image after closing the modal 

$("#set_user_image").click(function(){


	$.ajax({

		url: "includes/ajax_code.php",
		data:{image_name: image_name, user_id:user_id},
		type: "POST",
		success:function(data){

			if(!data.error) {

				$(".user_image_box a img").prop('src', data); //replace the src with the data coming from the server


				// location.reload(true);

			}


		}





	});






});





/*************Edit Photo side bar************/



$(".info-box-header").click(function(){


$(".inside").slideToggle("fast");

$("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon ");



});


/***********Delete Functio***********/


$(".delete_link").click(function(){

return confirm("Are you sure you want to delete this item");

});



tinymce.init({selector:'textarea'});

});




