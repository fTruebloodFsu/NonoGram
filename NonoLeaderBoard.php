<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>A nonogram game Csci 130</title>
	<script type="text/javascript" src="Nonogram2.js"></script>
	<link rel="stylesheet" type="text/css" href="NonoStyleSheet.css">
	<script>
		function requestHighScores(url,str) {
				httpRequest = new XMLHttpRequest(); 
				if (!httpRequest) { 
				  alert('Cannot create an XMLHTTP instance');
				  return false;
				}
				httpRequest.onreadystatechange = alertHighScores;  
				httpRequest.open('POST',url);  
				httpRequest.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				httpRequest.send('param_level=' + str); 
		}
		  
		function alertHighScores() {
			try {
			if (httpRequest.readyState === XMLHttpRequest.DONE) {
			  if (httpRequest.status === 200) {      
					theScores = JSON.parse(httpRequest.responseText);
					console.log(theScores);
					formatTheScores(theScores);
			} else {
				alert('There was a problem with the request3.');
			  }
			}
		  }
		  catch( e ) { 
			alert('...Caught Exception: ' + e.description);
		  }
		}
		
		function getScores(){
			requestHighScores('getLeaderBoard.php', "data");
		}
		
		function formatTheScores(scores){
			document.getElementById("bestPlayers").innerHTML = "<B>BEST PLAYERS ALL SIZES</B>" + "<br>" +
															   "1. " + scores[4][0].UserName + "\t" + scores[4][0].Level + " " + scores[4][0].Score + " " + scores[4][0].Time + "<br>" +
															   "2. " + scores[4][1].UserName + "\t" + scores[4][1].Level + " " + scores[4][1].Score + " " + scores[4][1].Time + "<br>" +
															   "3. " + scores[4][2].UserName + "\t" + scores[4][1].Level + " " + scores[4][2].Score + " " + scores[4][2].Time + "<br>";
															   
			document.getElementById("bestPlayers13").innerHTML = "<B>BEST PLAYERS SIZE 13</B>" + "<br>" +
															   "1. " + scores[7][0].UserName + "\t" + scores[7][0].Level + " " + scores[7][0].Score + " " + scores[7][0].Time + "<br>" +
															   "2. " + scores[7][1].UserName + "\t" + scores[7][1].Level + " " + scores[7][1].Score + " " + scores[7][1].Time + "<br>" +
															   "3. " + scores[7][2].UserName + "\t" + scores[7][1].Level + " " + scores[7][2].Score + " " + scores[7][2].Time + "<br>";	

			document.getElementById("bestPlayers7").innerHTML = "<B>BEST PLAYERS SIZE 7</B>" + "<br>" +
															   "1. " + scores[9][0].UserName + "\t" + scores[9][0].Level + " " + scores[9][0].Score + " " + scores[9][0].Time + "<br>" +
															   "2. " + scores[9][1].UserName + "\t" + scores[9][1].Level + " " + scores[9][1].Score + " " + scores[9][1].Time + "<br>" +
															   "3. " + scores[9][2].UserName + "\t" + scores[9][1].Level + " " + scores[9][2].Score + " " + scores[9][2].Time + "<br>";													   
			
			document.getElementById("highScores").innerHTML = "<B>HIGH SCORES</B>" + "<br>" +
															   "1. " + scores[0][0].UserName + "\t" + scores[0][0].Level + " " + scores[0][0].Score + "<br>" +
															   "2. " + scores[0][1].UserName + "\t" + scores[0][1].Level + " " + scores[0][1].Score + "<br>" +
															   "3. " + scores[0][2].UserName + "\t" + scores[0][1].Level + " " + scores[0][2].Score + "<br>";
															   
			document.getElementById("highTimes").innerHTML = "<B>BEST TIMES</B>"+ "<br>" +
															   "1. " + scores[3][0].UserName + "\t" + scores[3][0].Level + " " + scores[3][0].Time + "<br>" +
															   "2. " + scores[3][1].UserName + "\t" + scores[3][1].Level + " " + scores[3][1].Time + "<br>" +
															   "3. " + scores[3][2].UserName + "\t" + scores[3][1].Level + " " + scores[3][2].Time + "<br>";
															   
			document.getElementById("worstPlayers").innerHTML = "<B>WORST PLAYERS ALL SIZES</B>" + "<br>" +
															   "1. " + scores[5][0].UserName + "\t" + scores[5][0].Level + " " + scores[5][0].Score + " " + scores[5][0].Time + "<br>" +
															   "2. " + scores[5][1].UserName + "\t" + scores[5][1].Level + " " + scores[5][1].Score + " " + scores[5][1].Time + "<br>" +
															   "3. " + scores[5][2].UserName + "\t" + scores[5][1].Level + " " + scores[5][2].Score + " " + scores[5][2].Time + "<br>";
															   
			document.getElementById("worstPlayers13").innerHTML = "<B>WORST PLAYERS SIZE 13</B>" + "<br>" +
															   "1. " + scores[6][0].UserName + "\t" + scores[6][0].Level + " " + scores[6][0].Score + " " + scores[6][0].Time + "<br>" +
															   "2. " + scores[6][1].UserName + "\t" + scores[6][1].Level + " " + scores[6][1].Score + " " + scores[6][1].Time + "<br>" +
															   "3. " + scores[6][2].UserName + "\t" + scores[6][1].Level + " " + scores[6][2].Score + " " + scores[6][2].Time + "<br>";	

			document.getElementById("worstPlayers7").innerHTML = "<B>WORST PLAYERS SIZE 7</B>" + "<br>" +
															   "1. " + scores[8][0].UserName + "\t" + scores[8][0].Level + " " + scores[8][0].Score + " " + scores[8][0].Time + "<br>" +
															   "2. " + scores[8][1].UserName + "\t" + scores[8][1].Level + " " + scores[8][1].Score + " " + scores[8][1].Time + "<br>" +
															   "3. " + scores[8][2].UserName + "\t" + scores[8][1].Level + " " + scores[8][2].Score + " " + scores[8][2].Time + "<br>";													   
															   
			document.getElementById("lowScores").innerHTML = "<B>WORST SCORES</B>"+ "<br>" +
															   "1. " + scores[2][0].UserName + "\t" + scores[2][0].Level + " " + scores[2][0].Score + "<br>" +
															   "2. " + scores[2][1].UserName + "\t" + scores[2][1].Level + " " + scores[2][1].Score + "<br>" +
															   "3. " + scores[2][2].UserName + "\t" + scores[2][1].Level + " " + scores[2][2].Score + "<br>";
															   
			document.getElementById("lowTimes").innerHTML = "<B>WORST TIMES</B>"+ "<br>" +
															   "1. " + scores[1][0].UserName + "\t" + scores[1][0].Level + " " + scores[1][0].Time + "<br>" +
															   "2. " + scores[1][1].UserName + "\t" + scores[1][1].Level + " " + scores[1][1].Time + "<br>" +
															   "3. " + scores[1][2].UserName + "\t" + scores[1][1].Level + " " + scores[1][2].Time + "<br>";
		}
		
	</script>
</head>

<body onload="getScores()">

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
			<div class="UNBox"><?php echo ((isset($_SESSION['username'])) ? $_SESSION['username'] : ''); ?></div>
		</div>
		<div class="viewBoxCenter">
			<div id="bestPlayers"></div>
			<br>
			<div id="bestPlayers13"></div>
			<br>
			<div id="bestPlayers7"></div>
			<br>
			<div id="highScores"></div>
			<br>
			<div id="highTimes"></div>
			<br>
			<div id="worstPlayers"></div>
			<br>
			<div id="worstPlayers13"></div>
			<br>
			<div id="worstPlayers7"></div>
			<br>
			<div id="lowScores"></div>
			<br>
			<div id="lowTimes"></div>
		</div>
		<div class="viewBoxRight">
		<div>
		</div>
	</section>
</body>


</html>