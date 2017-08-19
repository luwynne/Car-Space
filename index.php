<?php include("includes/header.php"); ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
	            <div class="container">
		            <h4>Your car Your passion</h4>
					<h5>COMUNITY | GALLERY | FORUM</h5><br>
	            </div>
	   
	   
	   			<?php 
	   			
	   			$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
	   			$itens_per_page = 4;
	   			$itens_total_count = Photo::count_all();
	   			
	   			$paginate = new Paginate($page,$itens_per_page,$itens_total_count); //passing variable tp the method
	   			$sql = "SELECT * FROM photos ";
	   			$sql.=" LIMIT {$itens_per_page} ";
	   			$sql.= " OFFSET {$paginate->offset()}"; //using the offset. Calling the object and its method
	   			$photos = Photo::find_by_query($sql); //accesing the find by query through  the photo class
	   				
// 	   			$photos = Photo::find_all();
	   			
	   			?>         
				
    			
    			<?php   			  			
    			foreach($photos as $photo): ?>
			    	<a href="photo.php?id=<?php echo $photo->id; ?>" >		
						<div class="thumbnails row">
			    			<div class="col-md-8">
			    				<div class="col-md-6"">
			    					<img class="img-responsive" src="admin/images/<?php echo $photo->filename; ?>" alt="">
			    				</div>
			    				<div class="col-md-6"">
				    				<b><?php echo $photo->title; ?></b>
				    				
			    				</div>
			    			</div> 
			    		</div>
			    		</a><hr>	
    			<?php endforeach; ?>
    			
    			<div class="row" style="text-align: center;">
    				<ul class="pagination">
    				
    				<?php 
    				
    				if($paginate->page_total() > 1){
    					
    					if ($paginate->has_previous()){
    						echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
    					}
    					
   	
    					for($i=1; $i <= $paginate->page_total(); $i++){ //looping on pages number 
    						if ($i == $paginate->current_page){
    							echo "<li class='active'><a href='index.php?page={$i}'>$i</a></li>";
    						}else{
    							echo "<li><a href='index.php?page={$i}'>$i</a></li>";
    						}
    					}
    					
    					if($paginate->has_next()){
    						echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
    					
    					}
    					
    					
    					
    				}
    				
    				?>
    				
    					
    					
    				</ul>
    			</div> 
		       
          </div>  




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            <br>
                 <?php include("includes/sidebar.php"); ?>



        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
