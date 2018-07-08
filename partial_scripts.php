<script src = "assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src = "assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<script>

	$(document).ready(function(){
		$( "#filter-options" ).toggle();
	});

	$(function() {
		$( "#filter-toggle" ).click(function() {
			$( "#filter-options" ).fadeToggle("slide");
			$( "#filter-options form" ).addClass("inline");
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#dashboard").click(function(){
			$("#dashboard").removeClass("text-muted");
		});
		$("#request").click(function(){
			$("#request").removeClass("text-muted");
		});
		$("#about").click(function(){
			$("#about").removeClass("text-muted");
		});
		$("#contact").click(function(){
			$("#contact").removeClass("text-muted");
		});
	});

</script>