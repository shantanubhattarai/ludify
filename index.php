<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>
<?php include 'partial_sidebar.php'; ?>

	<div class="col-md-9 container main-content">
		<?php
			$items_per_page = 4;
			include 'include\pagination.php';
			$query = "select * from articles";
			$result = mysqli_query($conn,$query);
			$total_items = mysqli_num_rows($result); 
			$result = mysqli_query( $conn , " SELECT * FROM articles ORDER BY date_of_upload DESC LIMIT $start, $items_per_page");
			
			while($row = mysqli_fetch_assoc($result)){
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
				under <a href="#"><?=$row['article_category']?></a>
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
