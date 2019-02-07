<?php
   session_start();
   unset($_SESSION["username"]);
   header('Refresh: 2; URL = Nonogram1.php');
   // http://php.net/manual/en/function.header.php
?>
<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="NonoStyleSheet.css">
	<style>
	
	.text-blur-out {
			-webkit-animation: text-blur-out 2s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
	        animation: text-blur-out 2s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
			margin-left: 30vw;
	}
	
	@-webkit-keyframes text-blur-out {
	  0% {
		-webkit-filter: blur(0.01);
				filter: blur(0.01);
	  }
	  100% {
		-webkit-filter: blur(12px) opacity(0%);
				filter: blur(12px) opacity(0%);
	  }
	}
	@keyframes text-blur-out {
	  0% {
		-webkit-filter: blur(0.01);
				filter: blur(0.01);
	  }
	  100% {
		-webkit-filter: blur(12px) opacity(0%);
				filter: blur(12px) opacity(0%);
	  }
	}

	</style>
</head>
<html>
	<body>
		<div class="text-blur-out"><img src="GameOver.jpg" width="550" height="650" alt="gameover" /></div>
	</body>
</html>