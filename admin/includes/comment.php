<?php 



class Comment extends Db_object {

	protected static $db_table = "comments";
	protected static $db_table_fields = array('id', 'photo_id', 'author','body','created');
	public $id;
	public $photo_id;
	public $author;
	public $body;
	public $created;

	
											//taking some parameters
	public static function create_comment($photo_id, $author="", $body="") { //public static, can be called but not instantiated
		


		if(!empty($photo_id) && !empty($author) && !empty($body)) {

			$comment = new Comment(); //instantiating the object

			$comment->photo_id = (int)$photo_id; //assigning the parameters to object properties
			$comment->author   = $author;
			$comment->body     = $body;

			return $comment;


		} else { //if not available, it will return false


			return false;
		}


	}


											//method finding specific if from database
	public static function find_the_comments($photo_id=0) {

		global $database;

		$sql  = "SELECT * FROM " . self::$db_table;
		$sql .= " WHERE photo_id = " . $database->escape_string($photo_id); //cleaning data 
		$sql .= " ORDER  BY photo_id ASC";

		return self::find_by_query($sql); //remaining coding from db_object

	} 
	
	
	public static function find_by_author($author) {
		global $database;
		$the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE author = $author ");
	
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
	
	
	}
	
	
	




} // End of Class User














 ?>


















