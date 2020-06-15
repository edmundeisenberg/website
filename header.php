<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta name="google-site-verification" content="_pScXk6_L4m_VheKClcvvUfpLugn0E1yHHtU6-YmhHQ" />
</head> 
<script>
function icon_click(){
	menu_div= document.querySelector('body > div.menu > div');
	if(menu_div.style.height=='40vh'){
		menu_div.style.height='0vh';
	}else{
		menu_div.style.height='40vh';
	}
}


</script>
<?php

function getHeader(){
	echo '<div class="header">
			<a href="index.php">
			<div class="letterhead">
				Ned Eisenberg
				<!--<div class="desktop-only">
				Web Development Tutor
				</div>-->
			</div>
			</a>
		</div>
		<div class="menu_icon" onclick="icon_click()">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div class="menu">
			<div>
				<a href="index.php">
					Home
				</a>
				<a href="about.php">
					About
				</a>
				<!--<a href="services.php">
					Services
				</a>-->
				<a href="contact.php">
					Contact
				</a>
				<a href="blog/">
					Blog
				</a>
			</div>
		</div>
		'
		;
	
}

?>