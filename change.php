<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

	$("div").hide();
	$("div#buku").show();
	
  $("select").change(function(){
	var id = $("select").val();
	//$("div#Serial").show();
	
	if(id=='Buku'){
		$("div").hide();
		$("div#buku").show();
	}
	else if(id=='Jurnal'){
		$("div").hide();
		$("div#Jurnal").show();
	}
	else if(id=='Serial'){
		$("div").hide();
		$("div#Serial").show();
	}
	//$("div#buku").show();
  });
  
});
</script>
</head>

<body>
	<select id="single">
	  <option>Buku</option>
	  <option>Jurnal</option>
	  <option>Serial</option>
	</select>
	
	<div id="Buku">
		Buku
	</div>
	
	<div id="Jurnal">
		Jurnal
	</div>
	
	<div id="Serial">
		Serial
	</div>
</body>

</html>