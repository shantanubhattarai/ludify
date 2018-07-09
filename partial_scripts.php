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
		if(!sessionStorage.index){
			$("#home").removeClass("text-muted");
		}
		$("#home").click(function(){
			sessionStorage.setItem("index","1");
		});
		$("#dashboard").click(function(){
			sessionStorage.setItem("index","2");
		});
		$("#request").click(function(){
			sessionStorage.setItem("index","3");
		});
		$("#about").click(function(){
			sessionStorage.setItem("index","4");
		});
		$("#contact").click(function(){
			sessionStorage.setItem("index","5");
		});

		var index = sessionStorage.getItem("index"); 
		if(index==1){
			$("#home").removeClass("text-muted");
		}
		else if(index==2){
			$("#dashboard").removeClass("text-muted");
		}
		else if(index==3){
			$("#request").removeClass("text-muted");
		}
		else if(index==4){
			$("#about").removeClass("text-muted");
		}
		else{
			$("#contact").removeClass("text-muted");
		}
		});


</script>