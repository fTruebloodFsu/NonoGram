<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head lang="en">

	<meta charset="utf-8">
	<title>A nonogram game Csci 130</title>
	<script type="text/javascript" src="Nonogram2.js"></script>
	<link rel="stylesheet" type="text/css" href="NonoStyleSheet.css">
	<style>
		
		.text-pop-up-top {
			-webkit-animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
			display: none;
		}
		
		@-webkit-keyframes text-pop-up-top {
		  0% {
			-webkit-transform: translateY(0);
					transform: translateY(0);
			-webkit-transform-origin: 50% 50%;
					transform-origin: 50% 50%;
			text-shadow: none;
		  }
		  100% {
			-webkit-transform: translateY(-50px);
					transform: translateY(-50px);
			-webkit-transform-origin: 50% 50%;
					transform-origin: 50% 50%;
			text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
		  }
		}
		@keyframes text-pop-up-top {
		  0% {
			-webkit-transform: translateY(0);
					transform: translateY(0);
			-webkit-transform-origin: 50% 50%;
					transform-origin: 50% 50%;
			text-shadow: none;
		  }
		  100% {
			-webkit-transform: translateY(-50px);
					transform: translateY(-50px);
			-webkit-transform-origin: 50% 50%;
					transform-origin: 50% 50%;
			text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
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
			<input type="button" id="create" value="7 x 7" onclick="Javascript:getLevels(7,7)">
			<input type="button" id="create1" value="13 x 13" onclick="Javascript:getLevels(13, 13)">
			<input type="button" id="create2" value="Random Level" onclick="Javascript:nonoGramTableRandom(13, 13)">
			<input type="button" id="create3" value=" Next Random Level" onclick="Javascript:nextLevelRandom()">
			<div class="UNBox"><?php echo ((isset($_SESSION['username'])) ? $_SESSION['username'] : ''); ?></div>
			<div id="levelName"></div>
			<div id="highScores"></div>
		</div>
		<div class="viewBoxCenter">
			<table id= "nonoGramTable7"></table>
			<div class="text-pop-up-top">YOU WIN!!</div>
		</div>
		<div class="viewBoxRight">
		<div>
			<div id="score">--</div>
			<div id="time">--:--:--</div>
			<div id="correctSquares">--</div>
			<div id="numberOfClicks">--</div>
			<div class="setTextLeftMarginRightSide">BACKGROUND</div>
			<div id="sliderBGRed"><input type="range" min="155" max="255" value="255" class="slider" id="sliderBGColorR" onchange="changeGridBGColor()"></div>
			<div id="sliderBGGreen"><input type="range" min="155" max="255" value="255" class="slider" id="sliderBGColorG" onchange="changeGridBGColor()"></div>
			<div id="sliderBGBlue"><input type="range" min="155" max="255" value="255" class="slider" id="sliderBGColorB" onchange="changeGridBGColor()"></div>
			<div class="setTextLeftMarginRightSide">SQUARES</div>
			<div id="sliderSQRed"><input type="range" min="0" max="100" value="0" class="slider" id="sliderSquareColorR" onchange="changeGridSquareColor()"></div>
			<div id="sliderSQGreen"><input type="range" min="0" max="100" value="0" class="slider" id="sliderSquareColorG" onchange="changeGridSquareColor()"></div>
			<div id="sliderSQBlue"><input type="range" min="0" max="100" value="0" class="slider" id="sliderSquareColorB" onchange="changeGridSquareColor()"></div></div>
			<form><input type="button" id="hintButton" value="HINT" onclick="Javascript:getHint()"></form>
		</div>
	</section>
</body>


</html>