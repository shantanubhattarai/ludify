<h6 class="card-header">Notices</h6>

<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Title</th>
			<th>Notice Body</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "select * from notices";
			$result = mysqli_query($conn,$sql);
			$sno = 1; 
			while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $sno ?></td>
			<td><?= $row['notice_title'] ?></td>
			<td class="text-truncate" style="max-width: 1px;"><a class="" href="?type=notice&notice=<?=$row['notice_id']?>"><?= $row['notice_body'] ?></a></td>
		</tr>
		<?php 
				$sno++; 
			}
		?>
	</tbody>
</table>
<a href="?type=add_notice">
<button id = "btn-floating" class="btn btn-danger pull-right" style="position:fixed; bottom:10px; right: 10px;">
	Add New Notice
</button>
</a>