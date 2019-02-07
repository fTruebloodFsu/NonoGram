<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head lang="en">

	<meta charset="utf-8">
	<title>A nonogram game Csci 130</title>
	<script type="text/javascript" src="Nonogram2.js"></script>
	<link rel="stylesheet" type="text/css" href="NonoStyleSheet.css">
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
			<a href = "destroySession.php" tite = "Logout"> logout
			<div><?php echo ((isset($_SESSION['username'])) ? $_SESSION['username'] : ''); ?></div>
		</div>
		<div class="viewBoxCenter">
			<iframe width="650" height="400" src="https://www.youtube.com/embed/KKdeZE66ltk"> </iframe>
		</div>
		<aside class="viewBoxRight">
			
		</aside>
	</section>
</body>


</html>