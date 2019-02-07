var color_BG = "white";
var color_Sq = "black";
var incorrectSquares = 0;
var solutionGrid;
var ROWS = 0;
var COLS = 0;
var makeTable = false;
var levels = null;
var currLevel = 0;
var time = 0;
var running = 1;
var httpRequest1;
var httpRequest2;
var httpRequest3;
var httpRequest4;
var numHint = 0;
var numClicks = 0;
var randomLevel = false;

function nonoGramTable(r, c) {
	var rows = r;
	var cols = c;
	
	let myButton = document.getElementById("create");
	myButton.style.display='none';
	
	let myButton1 = document.getElementById("create1");
	myButton1.style.display='none';
	
	let myTableDiv = document.getElementById("nonoGramTable7");   
    let table = document.createElement('TABLE');
	
	let myButton2 = document.getElementById("create2");
	myButton2.style.display = 'none';
	
	table.border='1';
	table.style.borderCollapse='collapse';
	
	let tbody = document.createElement('TBODY');
	table.appendChild(tbody);
	
	for(var i = 0; i < rows; i++){
		let tr = document.createElement('TR');
		tbody.appendChild(tr);
		
		for(var j = 0; j < cols; j++){
			let td = document.createElement('TD');
			td.width = '40';
			td.height = '40';
			//td.style.backgroundColor="white";
			td.style.textAlign='center';
			td.onclick = function() { (this.style.backgroundColor != color_Sq) ? this.style.backgroundColor = color_Sq : this.style.backgroundColor = color_BG; };
			tr.appendChild(td);
		}
		
	}
	myTableDiv.appendChild(table);
	
	//var ranGrid = randomNumberGrid(rows, cols);
	var solGrid = solutionGrid;
	var rowClues = getRowClues(solGrid, rows, cols);
	var colClues = getColClues(solGrid, rows, cols);
	
	for(var i = 0; i < cols; i++){
		var row = table.rows[i];
		var x = row.insertCell(0);
		x.width = '70';
		x.style.textAlign = 'right'
		//x.innerHTML = rowClues[i]; 
		for(var j = 0; j < rowClues[i].length; j++){
			x.innerHTML += rowClues[i][j] + "\n";
		}
	}
	
	var newRow = table.insertRow(0);
	var cell;
	for(var i = 0; i < rows; i++){
		cell = newRow.insertCell(i);
		cell.height = '60';
		cell.style.textAlign = 'center';
		//div.innerHTML = colClues[i];
		for(var j = 0; j < colClues[i].length; j++){
			cell.innerHTML += colClues[i][j] + "<br>";
		}
	}
	
	var cellNew = table.rows[0];
	var xNew = cellNew.insertCell(0);
	
	nonoGramTable7.addEventListener("click", function(){ score(solGrid, rows, cols); })
	changeGridSquareColor();
	changeGridBGColor();
	myTimer();
}

function randomNumber(){
	let randNum = (Math.random()>0.6)? 1 : 0;
	return randNum;
}

function randomNumberGrid(x,y){
	var arr = new Array(x);
	
	for(var i = 0; i < x; i++){
		arr[i] = new Array(y);
	}
	
	for(var j = 0; j < x; j++){
		for(var k = 0; k < y; k++){
			arr[j][k] = randomNumber();
		}
	}
	console.log(arr);
	return arr;
}

function getRowClues(arr, x, y){
	var rowClue = new Array(x);
	
	for(var i = 0; i < x; i++){
		var clues = new Array();
		var count = 0;
		for(var j = 0; j < y; j++){
			if(arr[i][j] == 1){
				count = count + 1;
			}
			else{
			if(count > 0){
				clues.push(count);
				count = 0;
			}
		}
		}
		if(count > 0){
			clues.push(count);
				count = 0;
		}
		rowClue[i] = clues;
	}
	
	console.log(rowClue);
	
	return rowClue;
}

function getColClues(arr, x, y){
	var colClue = new Array(x);
	
	for(var j = 0; j < x; j++){
		var clues = new Array();
		var count = 0;
		
		for(var i = 0; i < x; i++){
			if(arr[i][j] == 1){
				count = count + 1;
			}
			else{
				if(count > 0){
					clues.push(count);
					count = 0;
				}
			}
		}
		
		if(count > 0){
			clues.push(count);
			count = 0;
		}
		colClue[j] = clues;
	}
	
	console.log(colClue);
	
	return colClue;
}

function score(solArr, x, y){
	var totalOnes = 0;
	var correctSquares = 0;
	numClicks++;
	document.getElementById("numberOfClicks").innerHTML = "Number Of Moves: " + numClicks;
	
	for(var i = 0; i < x; i++){
		for(var j = 0; j < y; j++){
			if(solArr[i][j] == 1){
				totalOnes++;
			}
		}
	}
	
	var table = document.getElementById("nonoGramTable7");
	var tableRows = table.getElementsByTagName("tr");
	
	for(var i = 1; i <= x; i++){
		for(var j = 1; j <= y; j++){
			if((solArr[i-1][j-1] == 1) && (tableRows[i].cells[j].style.backgroundColor == color_Sq )){
				correctSquares++;
			}
		}
	}
	
	for(var i = 1; i <= x; i++){
		for(var j = 1; j <= y; j++){
			if((solArr[i-1][j-1] == 0) && (tableRows[i].cells[j].style.backgroundColor == color_Sq )){
				incorrectSquares++;
			}
		}
	}

	var score = Math.max((correctSquares-incorrectSquares), 0)/totalOnes;
	score = score.toFixed(2);
	score = score*100
	
	document.getElementById("correctSquares").innerHTML = "Total Correct: " + totalOnes;
	
	document.getElementById("score").innerHTML = "Score: " + score;
	if((correctSquares/totalOnes) == 1){
		let finishTime = document.getElementById("time").innerHTML;
		alert("time: " + finishTime);
		if(randomLevel == false){sendGameData();}
		if(randomLevel == true){
			let myButton3 = document.getElementById("create3");
			myButton3.style.display = 'block';
			running = 0;
			}
	}
	return (correctSquares/totalOnes);
}

function decToHex(d) { 
    var hex = Number(d).toString(16);
    if (hex.length < 2) hex = "0" + hex;
    return hex;
}

function hexToRGB(hex) {
    var a = hex.charAt(1)+hex.charAt(2);
	var b = hex.charAt(3)+hex.charAt(4);
	var c = hex.charAt(5)+hex.charAt(6);
	
	a = parseInt(a, 16);
	b = parseInt(b, 16);
	c = parseInt(c, 16);
	
	var result = "rgb(" + a + ", " + b + ", " + c +")";
	return result;
}


function changeGridSquareColor(){
	var R = document.getElementById("sliderSquareColorR").value;
	var G = document.getElementById("sliderSquareColorG").value;
	var B = document.getElementById("sliderSquareColorB").value;
	
	var bgColor = "#"+decToHex(R)+decToHex(G)+decToHex(B);
	
	let table = document.getElementById("nonoGramTable7");
	var tableRows = table.getElementsByTagName("tr");
	
	var x = tableRows.length;
	var y = tableRows.length;
	
	var colorGrid = getBGSliderColor();
	
	for(var i = 1; i < x; i++){
		for(var j = 1; j < y; j++){
			if(tableRows[i].cells[j].style.backgroundColor == color_Sq){
				tableRows[i].cells[j].style.backgroundColor = bgColor;
				//console.log(tableRows[i].cells[j].style.backgroundColor);
			}
		}
	}
	
	color_Sq = hexToRGB(getSquareSliderColor());
	console.log(color_Sq);
	
	return bgColor
}

function changeGridBGColor(){
	var R = document.getElementById("sliderBGColorR").value;
	var G = document.getElementById("sliderBGColorG").value;
	var B = document.getElementById("sliderBGColorB").value;
	
	var bgColor = "#"+decToHex(R)+decToHex(G)+decToHex(B);
	document.getElementById("nonoGramTable7").style.backgroundColor=bgColor;
	
	let table = document.getElementById("nonoGramTable7");
	var tableRows = table.getElementsByTagName("tr");
	
	var x = tableRows.length;
	var y = tableRows.length;
	
	var sliderColor = hexToRGB(getSquareSliderColor());
	console.log(sliderColor);
	
	for(var i = 1; i < x; i++){
		for(var j = 1; j < y; j++){
			if(tableRows[i].cells[j].style.backgroundColor == sliderColor){
				tableRows[i].cells[j].style.backgroundColor = sliderColor;
				console.log(1);
			}
			else{
				tableRows[i].cells[j].style.backgroundColor = bgColor;
			}
		}
	}
	
	//console.log(bgColor); hex color code
	color_BG = hexToRGB(getBGSliderColor());
	return bgColor
}

function getBGSliderColor(){
	var R = document.getElementById("sliderBGColorR").value;
	var G = document.getElementById("sliderBGColorG").value;
	var B = document.getElementById("sliderBGColorB").value;
	
	var color = "#"+decToHex(R)+decToHex(G)+decToHex(B);
	
	return color;
}

function getSquareSliderColor(){
	var R = document.getElementById("sliderSquareColorR").value;
	var G = document.getElementById("sliderSquareColorG").value;
	var B = document.getElementById("sliderSquareColorB").value;
	
	var color = "#"+decToHex(R)+decToHex(G)+decToHex(B);
	
	return color
}

function myTimer(){
	if(running == 1){
		setTimeout(function(){
			time++;
			var min = (Math.floor(time / 600))%60;
			
			var sec = (Math.floor(time / 10))%60;
			
			var milli = Math.floor(time % 10);

			document.getElementById("time").innerHTML = min + "." + sec + "." + "0" + milli;
			myTimer();
		}, 100);
	}
}

function getSolGrid(){
	return solutionGrid;
}

function resize(newSize, defaultValue) {
	var arr=new Array(newSize);
	for(var i = 0; i < newSize; i++){
		arr[i] = new Array(newSize).fill(0);
	}
	return arr;
	console.log(arr);
}

function displayLevel(response){
	getHighScores();
	solutionGrid=resize(ROWS, 0);
	str = response[currLevel].Grid;
	
	var k = 1;
	
	str = JSON.stringify(str);
	str = str.split(',').join('');
	str = str.split('[').join('');
	str = str.split(']').join('');
	var c = 0;
	
	console.log(str.charAt(k));
	
	for(var i = 0; i < ROWS; i++){
		for(var j = 0; j < COLS; j++){
			if(str.charAt(k) == "1"){ c = 1;}
			else{ c = 0;}
			solutionGrid[i][j] = c;
			k++;
		}
	}
	
	console.log(solutionGrid);
	document.getElementById("levelName").innerHTML = response[currLevel].Name;
	makeTable = true;
	nonoGramTable(ROWS,COLS);
	return makeTable;
}

function nextLevel(){
	numClicks = 0;
	getHighScores();
	time = 0;
	incorrectSquares = 0;
	document.getElementById("score").innerHTML = 0;
	document.getElementById("levelName").innerHTML = levels[currLevel].Name;
	document.getElementById("numberOfClicks").innerHTML = 0;
	numHint = 0;
	let myButton = document.getElementById("hintButton");
	myButton.style.display='block';
	
	var table = document.getElementById("nonoGramTable7");
	var tableRows = table.getElementsByTagName("tr");
	
	for(var i = 0; i <= ROWS; i++){
		for(var j = 0; j <= COLS; j++){
			if(tableRows[i].cells[j].style.backgroundColor == color_Sq){
				tableRows[i].cells[j].style.backgroundColor = color_BG;
			}
		}
	}
	
	str = levels[currLevel].Grid
	
	var k = 0;
	
	str = JSON.stringify(str);
	str = str.split(',').join('');
	str = str.split('[').join('');
	str = str.split(']').join('');
	var c = 0;
	
	for(var i = 0; i < ROWS; i++){
		for(var j = 0; j < COLS; j++){
			if(str.charAt(k) == "1"){ c = 1;}
			else{ c = 0;}
			solutionGrid[i][j] = c;
			k++;
		}
	}
	
	for(var i = 0; i <= ROWS; i++){
		for(var j = 0; j <= COLS; j++){
			if(i == 0 || j == 0){tableRows[i].cells[j].innerHTML = "";}
		}
	}
	
	let columnClues = getColClues(solutionGrid, ROWS, COLS);
	let rowsClues = getRowClues(solutionGrid, ROWS, COLS);
	
	for(var i = 0; i < ROWS; i++){
		for(var j = 0; j < columnClues[i].length; j++){
			tableRows[0].cells[i+1].innerHTML += columnClues[i][j] + "<br>";
		}
	}
	
	for(var i = 0; i < ROWS; i++){
		for(var j = 0; j < rowsClues[i].length; j++){
			tableRows[i+1].cells[0].innerHTML += rowsClues[i][j] + " ";
		}
	}
}

function makeRequest(url,str) {
		httpRequest1 = new XMLHttpRequest(); 
		if (!httpRequest1) { 
		  alert('Cannot create an XMLHTTP instance');
		  return false;
		}
		httpRequest1.onreadystatechange = alertContents;  
		httpRequest1.open('POST',url);  
		httpRequest1.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		httpRequest1.send('myarray=' + str); 
	}
  
function alertContents() {
	try {
	if (httpRequest1.readyState === XMLHttpRequest.DONE) {
	  if (httpRequest1.status === 200) {      
			//alert(httpRequest1.responseText);
			levels = JSON.parse(httpRequest1.responseText);
			displayLevel(levels);
	} else {
		alert('There was a problem with the request.');
	  }
	}
  }
  catch( e ) { 
	alert('...Caught Exception: ' + e.description);
  }
}

function getLevels(r,c){
	ROWS = r;
	COLS = c;
	if(ROWS == 13){
		makeRequest('NonogramGetFiles.php', ROWS);
	}
	if(ROWS == 7){
		makeRequest('NonogramGetFiles7.php', ROWS);
	}
}

jsonGameData = {
	"Username":"",
	"level":"",
	"score":0,
	"gameTime":""
	}

function storeGameData(url,str) {
		httpRequest2 = new XMLHttpRequest(); 
		if (!httpRequest2) { 
		  alert('Cannot create an XMLHTTP instance');
		  return false;
		}
		httpRequest2.onreadystatechange = alertGameData;  
		httpRequest2.open('POST',url);  
		httpRequest2.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		httpRequest2.send('myarray=' + str); 
}
  
function alertGameData() {
	try {
	if (httpRequest2.readyState === XMLHttpRequest.DONE) {
	  if (httpRequest2.status === 200) {      
			alert(httpRequest2.responseText);
			response = JSON.parse(httpRequest2.responseText);
			if(response.status == "accept"){
			currLevel++;
			if(currLevel<=9){
				nextLevel();
			}else{
				gameOver();
			}
		}
	} else {
		alert('There was a problem with the request3.');
	  }
	}
  }
  catch( e ) { 
	alert('...Caught Exception2: ' + e.description);
  }
}

function requestHighScores(url,str) {
		httpRequest3 = new XMLHttpRequest(); 
		if (!httpRequest3) { 
		  alert('Cannot create an XMLHTTP instance');
		  return false;
		}
		httpRequest3.onreadystatechange = alertHighScores;  
		httpRequest3.open('POST',url);  
		httpRequest3.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		httpRequest3.send('param_level=' + str); 
}
  
function alertHighScores() {
	try {
	if (httpRequest3.readyState === XMLHttpRequest.DONE) {
	  if (httpRequest3.status === 200) {      
			//alert(httpRequest3.responseText);
			theScores = JSON.parse(httpRequest3.responseText);
			document.getElementById("highScores").innerHTML = "<b>HIGH SCORES:</b><br><br>" +
				"<b>1.</b>" + " " + "<b>" + theScores[0].UserName + "</b>" + "<br>" + "Score:" + theScores[0].Score + "<br>" + "Time:" + theScores[0].Time + "<br><br>" +
				"<b>2.</b>" + " " + "<b>" + theScores[1].UserName + "</b>" + "<br>" + "Score:" + theScores[1].Score + "<br>" + "Time:" + theScores[1].Time + "<br><br>" +
				"<b>3.</b>" + " " + "<b>" + theScores[2].UserName + "</b>" + "<br>" + "Score:" + theScores[2].Score + "<br>" + "Time:" + theScores[2].Time;
	} else {
		alert('There was a problem with the request3.');
	  }
	}
  }
  catch( e ) { 
	alert('...Caught Exception3: ' + e.description);
  }
}

function getHighScores(){
	let myStr = levels[currLevel].Name;
	requestHighScores('getHighScores.php', myStr)
}

function sendGameData(){
	let strScore = jsonGameData.score = document.getElementById("score").innerHTML;
	jsonGameData.Username = "placeholder";
	jsonGameData.level = levels[currLevel].Name;
	jsonGameData.score = strScore.replace("Score: ", "");
	jsonGameData.gameTime = document.getElementById("time").innerHTML;
	
	var myJSON = JSON.stringify(jsonGameData);
	alert(myJSON);
	storeGameData('createGameDataEntry.php', myJSON);
}

function getHint(){
	numHint += 1;
	
	if(numHint == ROWS){
		let myButton = document.getElementById("hintButton");
		myButton.style.display='none';
	}
	
	var table = document.getElementById("nonoGramTable7");
	var tableRows = table.getElementsByTagName("tr");
	var x = ROWS;
	var y = COLS;

	for(var i = 1; i <= x; i++){
		for(var j = 1; j <= y; j++){
			if((solutionGrid[i-1][j-1] == 1) && (tableRows[i].cells[j].style.backgroundColor == color_BG )){
				tableRows[i].cells[j].style.backgroundColor = color_Sq;
				
				//return 0;
			}
		}
	}
}

function nonoGramTableRandom(r, c) {
	var rows = r;
	var cols = c;
	ROWS = r;
	COLS = c;
	randomLevel = true;
	
	let myButton = document.getElementById("create");
	myButton.style.display='none';
	
	let myButton1 = document.getElementById("create1");
	myButton1.style.display='none';
	
	let myButton2 = document.getElementById("create2");
	myButton2.style.display='none';
	
	let myTableDiv = document.getElementById("nonoGramTable7");   
    let table = document.createElement('TABLE');
	
	table.border='1';
	table.style.borderCollapse='collapse';
	
	let tbody = document.createElement('TBODY');
	table.appendChild(tbody);
	
	for(var i = 0; i < rows; i++){
		let tr = document.createElement('TR');
		tbody.appendChild(tr);
		
		for(var j = 0; j < cols; j++){
			let td = document.createElement('TD');
			td.width = '40';
			td.height = '40';
			//td.style.backgroundColor="white";
			td.style.textAlign='center';
			td.onclick = function() { (this.style.backgroundColor != color_Sq) ? this.style.backgroundColor = color_Sq : this.style.backgroundColor = color_BG; };
			tr.appendChild(td);
		}
		
	}
	myTableDiv.appendChild(table);
	
	var ranGrid = randomNumberGrid(rows, cols);
	solutionGrid = ranGrid;
	//var solGrid = solutionGrid;
	var rowClues = getRowClues(ranGrid, rows, cols);
	var colClues = getColClues(ranGrid, rows, cols);
	
	for(var i = 0; i < cols; i++){
		var row = table.rows[i];
		var x = row.insertCell(0);
		x.width = '70';
		x.style.textAlign = 'right'
		//x.innerHTML = rowClues[i]; 
		for(var j = 0; j < rowClues[i].length; j++){
			x.innerHTML += rowClues[i][j] + "\n";
		}
	}
	
	var newRow = table.insertRow(0);
	var cell;
	for(var i = 0; i < rows; i++){
		cell = newRow.insertCell(i);
		cell.height = '60';
		cell.style.textAlign = 'center';
		//div.innerHTML = colClues[i];
		for(var j = 0; j < colClues[i].length; j++){
			cell.innerHTML += colClues[i][j] + "<br>";
		}
	}
	
	var cellNew = table.rows[0];
	var xNew = cellNew.insertCell(0);
	
	document.getElementById("levelName").innerHTML = "RANDOM!";
	nonoGramTable7.addEventListener("click", function(){ score(ranGrid, rows, cols); })
	changeGridSquareColor();
	changeGridBGColor();
	myTimer();
}

function nextLevelRandom(){
	numClicks = 0;
	randomLevel = true;
	time = 0;
	running = 1;
	myTimer();
	incorrectSquares = 0;
	document.getElementById("score").innerHTML = 0;
	document.getElementById("levelName").innerHTML = "RANDOM!";
	document.getElementById("numberOfClicks").innerHTML = 0;
	numHint = 0;
	let myButton = document.getElementById("hintButton");
	myButton.style.display='block';
	
	var table = document.getElementById("nonoGramTable7");
	var tableRows = table.getElementsByTagName("tr");
	
	for(var i = 0; i <= ROWS; i++){
		for(var j = 0; j <= COLS; j++){
			if(tableRows[i].cells[j].style.backgroundColor == color_Sq){
				tableRows[i].cells[j].style.backgroundColor = color_BG;
			}
		}
	}
	
	var ranGrid = randomNumberGrid(rows, cols);
	solutionGrid = ranGrid;
	
	for(var i = 0; i <= ROWS; i++){
		for(var j = 0; j <= COLS; j++){
			if(i == 0 || j == 0){tableRows[i].cells[j].innerHTML = "";}
		}
	}
	
	let columnClues = getColClues(solutionGrid, ROWS, COLS);
	let rowsClues = getRowClues(solutionGrid, ROWS, COLS);
	
	for(var i = 0; i < ROWS; i++){
		for(var j = 0; j < columnClues[i].length; j++){
			tableRows[0].cells[i+1].innerHTML += columnClues[i][j] + "<br>";
		}
	}
	
	for(var i = 0; i < ROWS; i++){
		for(var j = 0; j < rowsClues[i].length; j++){
			tableRows[i+1].cells[0].innerHTML += rowsClues[i][j] + " ";
		}
	}
	
	let myButton3 = document.getElementById("create3");
	myButton3.style.display = 'none';
}

function gameOver(){
	let table = document.getElementById("nonoGramTable7");
	table.style.diplay = 'none';
	
	let winAnimation = document.getElementById("text-pop-up-top");
	winAnimation.style.display = 'block';
}
