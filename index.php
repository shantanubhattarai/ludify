<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'database/get_username.php'; ?>
<?php include 'partial_sidebar.php'; ?>

		<div class="col-md-9 container main-content">
			<?php
			//Variables for pagination
				$page_name="index.php"; //Change this to whatever page you want to add Pagination in
				if (isset($_GET['start'])){$start=$_GET['start'];}
				else {$start = 0;}
				$eu = ($start - 0);
				$limit = 2; // No of records to be shown per page.
				$this1 = $eu + $limit;
				$back = $eu - $limit;
				$next = $eu + $limit;
			//End Pagination Variables. 
				$sql = "select * from articles";
				$sql = mysqli_query($conn,$sql);
				$nume = mysqli_num_rows($sql); //Total Number of items for Pagination
				$result = mysqli_query( $conn , " SELECT * FROM articles ORDER BY date_of_upload DESC LIMIT $eu, $limit");
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
			//For Page numbers and link at the end of page
			if ($limit < $nume) 
			{
				echo "<table align = 'center' width='50%'><tr><td align='left' width='30%'>";
				if($back >=0) 
				{
					print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>";
				}
				echo "</td><td align=center width='30%'>";
				$i=0;
				$l=1;
				for($i=0;$i < $nume;$i=$i+$limit){
				if($i <> $eu)
				{
					echo " <a href='$page_name?start=$i'><font size='2'>$l</font></a> ";
				}
				else 
				{ 
					echo "<font size='4' color=red>$l</font>";} //Current page is not displayed as link and given font color red
					$l=$l+1;
				}
				echo "</td><td align='right' width='30%'>";
				if($this1 < $nume) 
				{
					print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";
				}
				echo "</td></tr></table>";
			}
			?>
			
		</div>
	</div>
</div>

<script type="text/javascript">
	sessionStorage.removeItem("index");
</script>

<?php include 'partial_lower.php'; ?>
