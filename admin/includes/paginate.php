<?php 


class Paginate {

 public $current_page;
 public $items_per_page;
 public $items_total_count;

	//setting default parameters
	public function __construct($page=1, $items_per_page=4, $items_total_count=0 ){

		$this->current_page = (int)$page; //making sure that the page variables are integer
		$this->items_per_page = (int)$items_per_page;
		$this->items_total_count = (int)$items_total_count;


	}





	public function next(){

		return $this->current_page + 1;


}


	public function previous(){

		return $this->current_page - 1;


}

	public function page_total(){ //couting the total of pages that we have

		return ceil($this->items_total_count/$this->items_per_page); //the ceil built in rounds up and makes sure we have a proper number



}
	
		public function has_previous(){ //iff the previous page is bigger or equals 1, then we have a previous
		
			return $this->previous() >= 1 ? true : false;
		
		
		
		}
		
		
		public function has_next(){ //iff the next page is smaller or equals the total number of pages, then we have a next
		
			return $this->next() <= $this->page_total() ? true : false;
	
	
	}
		

		public function offset() { //skiping certain ammount of pages 


		return ($this->current_page -1 ) * $this->items_per_page; //this gives the the offset


	}



} // Paginate Class







 ?>