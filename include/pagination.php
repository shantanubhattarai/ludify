<?php 
//Variables for pagination
	$page_name = "index.php"; //Change this to whatever page you want to add Pagination in
	if ( isset( $_GET ['start'] ) ) { $start = $_GET ['start'] ; }
	else { $start = 0 ; }
	
	 // No of records to be shown per page.
	$this1 = $start + $items_per_page ;
	$back = $start - $items_per_page ;
	$next = $start + $items_per_page ;
//End Pagination Variables. 

 ?>

