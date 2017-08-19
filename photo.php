<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("admin/login.php");} ?>

<?php 

require_once("admin/includes/init.php");


if(empty($_GET['id'])) { //if the picture doesnt have an id, then will be redirected to the index page


redirect("index.php");

}

$photo = Photo::find_by_id($_GET['id']);


if(isset($_POST['submit'])) {

$author = trim($_POST['author']);
$body = trim($_POST['body']);


$new_comment = Comment::create_comment($photo->id, $author, $body);

if($new_comment && $new_comment->save()) { //there is a coment and if its using the save method

redirect("photo.php?id={$photo->id}"); //then redirect him to its page


} else {


$message = "There was some problems saving";


}


} else {

$author = "";
$body = "";

}


$comments = Comment::find_the_comments($photo->id); //finding the comments by the photo id








 ?>

        <div class="row">
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>

                <!-- Author -->
                

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $photo->created ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $photo->caption; ?></p>
                <p><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->


				<?php 
				
				$id_user = $session->user_id;
				$user = User::find_by_id($id_user);
				
				?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                    <img class="media-object" alt="" src="<?php echo $user->image_path_and_placeholder(); ?>">
                         <div class="form-group">
                            
                            <input type="hidden" name="author" class="form-control" value="<?php echo $user->username; ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>





                <hr>

                <!-- Posted Comments -->



            <?php foreach ($comments as $comment): ?>
                
               
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment->author; ?>
                            <small><?php echo $comment->created; ?></small>
                        </h4>
                        <?php echo $comment->body; ?>
                        <?php if ($comment->author == $user->username){?>
                        <a href="admin/delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                        <?php } ?>
                    </div>
                </div>


            <?php endforeach; ?>



            </div>



    <!-- Blog Sidebar Widgets Column -->
<!--     <div class="col-md-4"> -->

    
         <?php // include("includes/sidebar.php"); ?>



<!-- </div> -->
<!-- /.row -->

</div>

<?php include("includes/footer.php"); ?>



