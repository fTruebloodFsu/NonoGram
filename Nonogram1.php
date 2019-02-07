<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head lang="en">

	<meta charset="utf-8">
	<title>A nonogram game Csci 130</title>
	<script type="text/javascript" src="Nonogram2.js"></script>
	<link rel="stylesheet" type="text/css" href="NonoStyleSheet.css">
	<style>
		.flicker-in-1 {
			-webkit-animation: flicker-in-1 3s linear both;
	        animation: flicker-in-1 3s linear both;
		}
		
		
		@-webkit-keyframes flicker-in-1 {
		  0% {
			opacity: 0;
		  }
		  10% {
			opacity: 0;
		  }
		  10.1% {
			opacity: 1;
		  }
		  10.2% {
			opacity: 0;
		  }
		  20% {
			opacity: 0;
		  }
		  20.1% {
			opacity: 1;
		  }
		  20.6% {
			opacity: 0;
		  }
		  30% {
			opacity: 0;
		  }
		  30.1% {
			opacity: 1;
		  }
		  30.5% {
			opacity: 1;
		  }
		  30.6% {
			opacity: 0;
		  }
		  45% {
			opacity: 0;
		  }
		  45.1% {
			opacity: 1;
		  }
		  50% {
			opacity: 1;
		  }
		  55% {
			opacity: 1;
		  }
		  55.1% {
			opacity: 0;
		  }
		  57% {
			opacity: 0;
		  }
		  57.1% {
			opacity: 1;
		  }
		  60% {
			opacity: 1;
		  }
		  60.1% {
			opacity: 0;
		  }
		  65% {
			opacity: 0;
		  }
		  65.1% {
			opacity: 1;
		  }
		  75% {
			opacity: 1;
		  }
		  75.1% {
			opacity: 0;
		  }
		  77% {
			opacity: 0;
		  }
		  77.1% {
			opacity: 1;
		  }
		  85% {
			opacity: 1;
		  }
		  85.1% {
			opacity: 0;
		  }
		  86% {
			opacity: 0;
		  }
		  86.1% {
			opacity: 1;
		  }
		  100% {
			opacity: 1;
		  }
		}
		@keyframes flicker-in-1 {
		  0% {
			opacity: 0;
		  }
		  10% {
			opacity: 0;
		  }
		  10.1% {
			opacity: 1;
		  }
		  10.2% {
			opacity: 0;
		  }
		  20% {
			opacity: 0;
		  }
		  20.1% {
			opacity: 1;
		  }
		  20.6% {
			opacity: 0;
		  }
		  30% {
			opacity: 0;
		  }
		  30.1% {
			opacity: 1;
		  }
		  30.5% {
			opacity: 1;
		  }
		  30.6% {
			opacity: 0;
		  }
		  45% {
			opacity: 0;
		  }
		  45.1% {
			opacity: 1;
		  }
		  50% {
			opacity: 1;
		  }
		  55% {
			opacity: 1;
		  }
		  55.1% {
			opacity: 0;
		  }
		  57% {
			opacity: 0;
		  }
		  57.1% {
			opacity: 1;
		  }
		  60% {
			opacity: 1;
		  }
		  60.1% {
			opacity: 0;
		  }
		  65% {
			opacity: 0;
		  }
		  65.1% {
			opacity: 1;
		  }
		  75% {
			opacity: 1;
		  }
		  75.1% {
			opacity: 0;
		  }
		  77% {
			opacity: 0;
		  }
		  77.1% {
			opacity: 1;
		  }
		  85% {
			opacity: 1;
		  }
		  85.1% {
			opacity: 0;
		  }
		  86% {
			opacity: 0;
		  }
		  86.1% {
			opacity: 1;
		  }
		  100% {
			opacity: 1;
		  }
		}

	</style>
</head>

<body>

	<header>
		<nav>
			<ul class="menuBar">
				<li class="menuBar"><a class="menuBar" href="Nonogram1.php">Home</a></li>
				<li class="menuBar"><a class="menuBar" href="NonogramAbout.php">About</a></li>
				<li class="menuBar"><a class="menuBar" href="NonogramPlay.php">Play</a></li>
				<li class="menuBar"><a class="menuBar" href="NonoLeaderBoard.php">Leader Board</a></li>
				<li class="menuBar"><a class="menuBar" href="NonogramAuthor.html">Author</a></li>
			</ul>
		</nav>
	</header>
	
	<section class="viewBox">
		<div class="viewBoxLeft">
			<input type="button" id="login" value="Login" onclick="location.href = 'NonoLoginPage.html'" />
			<input type="button" id="createUser" value="new User" onclick="location.href = 'NoNoNewUser.html'" />
			<a href = "destroySession.php" tite = "Logout"> logout.</a>
			<div><?php echo ((isset($_SESSION['username'])) ? $_SESSION['username'] : ''); ?></div>
		</div>
		<div class="viewBoxCenter">
			<div class="flicker-in-1"><img src="bulldog.png" width="650" height="550" alt="bulldog" /></div>
		</div>
		<aside class="viewBoxRight">
			
		</aside>
	</section>
</body>


</html>