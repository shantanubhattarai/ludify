<?php $title = "Become a Developer" ;?>
<?php include 'partial_upper.php'; ?>
<?php include'partial_sidebar.php'; ?>
		<div class="col-md-9 container main-content">
			<form action="database\developer_request.php" method ="post" enctype="multipart/form-data">
				<div class="form-group">
					<label><h6>Qualification</h6></label><br>
					<input type="text" name="qualification">
				</div>
				<div class="form-group">
					<label><h6>Mention some of your projects(link)*</h6></label>
					<div id="div2">
						<input type="text" name="project_no" id="project_no" hidden value="1">
						<input type="text" name="project1" required>
					</div> <br>
					<input type="button"  class="btn btn-danger" onclick="addText();" value="Add another project" />
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-danger" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	var index=2;
	function addText(){
		var name = "project"+index;
		console.log(name);
		var inp = "<br><br><input type='text' name="+name+">";
		$("#project_no").val(index);
        $("#div2").append(inp);
        index+=1;

    }
 </script>

<?php include 'partial_lower.php'; ?>
