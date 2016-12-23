<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style type="text/css" media="screen">
    	ul li .sub_menu{ display: none;}
    	ul li.selected .sub_menu{ display: block;}
    </style>
    
</head>
<body>

	<div class="container">
		<div class="row">
			<ul>
				<li ><a href="">home</a>
					<ul>
						<div class="sub_menu">
							<li><a href="">hgf</a></li>
							<li><a href="">hgf</a></li>
							<li><a href="">hgf</a></li>
							
						</div>
						
					</ul>
				</li>
				<li><a href="">contact</a>
					<ul>
						<div class="sub_menu">
							<li><a href="">hgf</a></li>
							<<li><a href="">hgf</a></li>
							<li><a href="">hgf</a></li>
							
						</div>
						
					</ul>
				</li>
				<li><a href="">intro</a>
					<ul>
						<div class="sub_menu">
							<li><a href="">hgf</a></li>
							<li><a href="">hgf</a></li>
							<li><a href="">hgf</a></li>
							
						</div>
						
					</ul>

				</li>
				
					
			</ul>
		</div>
	</div>
    <script>
    	$(document).ready(function(){
    		$("ul li a").mouseover(function(){
    			var li = $(this).parent();
    			if($("ul li").hasClass('selected')){
    				return false;
    			} else{
    				$("ul li").removeClass('selected');
    				li.addClass('selected');

    			}
    			return false;
    			

    		});

    	});
    </script>

	
	
</body>
</html>