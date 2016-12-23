<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
</head>
<body>
<div id="div1" >
		sjflkjsdklfjjsdf
	</div>
	<input type="button" name="btn" value="button" id="btn">
	<input type="button" name="btn" value="button2" id="btn2">

	<div id="div1">
		<div id="div2">
			<ul id="u1">
				<li id="l1">
					<span id="sp">
						ksdjkfjksd
					</span>
				</li>
			</ul>
		</div>
	</div>
<script>
	$(document).ready(function(){
		$("#btn").click(function(){
			
				$("#div1").fadeOut(3000,function(){
				$("#div1").fadeIn(3000);
			});
			
			
		});
		$("#btn2").click(function(){
			$("#sp").parent().remove();
		})
		
	});
	

</script>	
	
</body>
</html>