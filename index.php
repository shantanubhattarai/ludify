<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>
<?php include 'partial_sidebar.php'; ?>

	<div class="col-md-9 container main-content">
		<?php
// FOR PAGE
			$items_per_page = 4;
			include 'include\pagination.php';
//FOR SORTING
			if(isset($_GET['order'])){
				$sortby = " ORDER BY ".$_GET['order'];
			}
			else{
				$sortby = " ORDER BY date_of_upload ";
			}

			if(isset($_GET['filter'])){
				echo $_GET['filter'];
				$condition = " WHERE article_category = ".$_GET['filter'];
			}
			else{
				$condition = " ";
			}
			
			$query = "select * from articles";
			$result = mysqli_query($conn,$query);
			$total_items = mysqli_num_rows($result); 
			$result = mysqli_query( $conn , " SELECT * FROM articles ".$condition.$sortby." DESC LIMIT $start, $items_per_page");
			if($result)
			while($row = mysqli_fetch_assoc($result)){
				$res = mysqli_query($conn , "SELECT category from article_categories WHERE category_id = ".$row['article_category']);
				$row2 = mysqli_fetch_assoc($res);
		?>
		
		<div class="card main-list">
			<div class="card-header">
				<h3><a href="view_article.php?article_id=<?=$row['article_id'] ?>"> <?=$row['article_title'] ?> </a></h3>
			</div>
			<div class="card-body card-meta text-muted">
				Published by  
				<a href="#"> <?=GetUsername($conn,$row['author_id'])?> </a> on <?=date("d",strtotime($row['date_of_upload']))?> 
				<a href="#"> <?=date("F",strtotime($row['date_of_upload']))?></a>, 
				<a href="#"><?=date("Y",strtotime($row['date_of_upload']))?></a>
				under <a href="#"><?=$row2['category']?></a>
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
