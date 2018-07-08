<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>
<?php include 'partial_sidebar.php'; ?>

		<div class="col-md-9 container main-content">
			<?php
				$sql = "select * from articles";
				$result = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result)){
			?>
				<div class="card main-list">
					<div class="card-header">
						<h3><a href="view_article.php?article_id=<?=$row['article_id'] ?>"> <?=$row['article_title'] ?> </a></h3>
					</div>
					<div class="card-body card-meta text-muted">
						Published by  <a href="#"> <?=GetUsername($conn,$row['author_id'])?> </a> on <?=date("d",strtotime($row['date_of_upload']))?> <a href="#"><?=date("F",strtotime($row['date_of_upload']))?></a>, <a href="#"><?=date("Y",strtotime($row['date_of_upload']))?></a>
						under <a href="#"><?=$row['article_category']?></a>
						<!-- <span><a class = "link" href="#">read more&hellip;</a></span> -->
					</div>
				</div>
			<?php
				}
			?>
			
		</div>
	</div>
</div>

<?php include 'partial_lower.php'; ?>
