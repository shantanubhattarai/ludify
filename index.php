<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'partial_sidebar.php'; ?>

	<div class="col-md-9 container main-content">
		<?php
// FOR PAGE
			$items_per_page = 4;
			include 'include\pagination.php';
//FOR SORTING
			if( isset($_GET['order']) ) { $sortby = " ORDER BY ".$_GET['order']; }
			else{ $sortby = " ORDER BY date_of_upload "; }
			
			if( isset($_GET['filter']) ) {
				if($_GET['filter']!=0){ $condition = " WHERE article_category = ".$_GET['filter']; }
				else{ $condition = " "; }
			}else{ $condition = " "; }
//FOR SEARCH
			if(isset($_GET['search_text']) && $_GET['search_text']!= ""){
				$search_text = $_GET['search_text'];
				$condition = "WHERE article_title LIKE '%$search_text%'";
			}
			?>
			<div class="card main-list">
				<div class="card-body">
					<form class="form-inline">
						<div class="form-group">
							<input class = "form-control mr-3" type="text" name="search_text" placeholder="Search by name">
							<button class = "btn btn-outline-danger" type="submit" name = "search">Search</button>
						</div>
					</form>
				</div>
			</div>

			<?php
			$result = mysqli_query( $conn , " SELECT * FROM articles ".$condition.$sortby." DESC LIMIT $start, $items_per_page");
			$result1 = mysqli_query( $conn , " SELECT * FROM articles ".$condition.$sortby." DESC");
			$total_items = mysqli_num_rows($result1); 
			if($result)
			while($row = mysqli_fetch_assoc($result)){
				$res = mysqli_query($conn , "SELECT * from article_categories WHERE category_id = ".$row['article_category']);
				$row2 = mysqli_fetch_assoc($res);
				$author_id=$row['author_id'];
		?>
		
		<div class="card main-list">
			<div class="card-header">
				<h3><a href="view_article.php?article_id=<?=$row['article_id'] ?>"> <?=$row['article_title'] ?> </a></h3>
			</div>
			<div class="card-body card-meta text-muted">
				Published by  
				<a href="view_profile.php?author_id=<?=$author_id?>"> <?=GetUsername($conn,$author_id)?> </a> on <?=date("d",strtotime($row['date_of_upload']))?> 
				 <?=date("F",strtotime($row['date_of_upload']))?>,  <?=date("Y",strtotime($row['date_of_upload']))?>
				under <a href="index.php?filter=<?=$row2['category_id']?>"><?=$row2['category']?></a>
		</div>
	</div>

			<?php
				}
			include 'include\pagination_display.php';
			?>
			
		</div>

	<script type="text/javascript">
		sessionStorage.removeItem("index");
	</script>

	<script type="text/javascript">
		document.getElementById("filter-toggle").style.visibility = "visible";
	</script>

<?php include 'partial_lower.php'; ?>
