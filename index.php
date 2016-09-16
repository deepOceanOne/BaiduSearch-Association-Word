<!DOCTYPE HTML> 
<html>
<head>
	<meta charset="UTF-8">
	<title>模拟百度搜索联想词</title>
</head>
<body>

<label>Title</label>
<div id="search">
<input id="title" type="text" name='title' autocomplete="off">
</div>

<div id="srhauto" style="display:none;">
	<div id="search_auto"></div>
</div>

<script src="jquery.min2.20.js"></script>
<script>
	$(function(){
		$('#search input[name="title"]').keyup(function(){
			$.post( 'srhauto.php', { 'value' : $(this).val() },function(data){
				if( document.getElementById("title").value == '' ) 
					$('#srhauto').html('').css('display','none');
				else
					$('#srhauto').html(data).css('display','block');
			});
		});
	});
</script>

</body>
</html>