<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<title>Javascript Quiz App</title>
<style>
/*	import it from google fonts or use any font*/
	@import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&display=swap');
	@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
	body {
		background-color:brown;
		font-family: 'Merriweather', serif;
	}
	.container {
		position: absolute;
		transform: translate(-50%, -50%);
		top: 50%;
		left: 50%;
		background-color: white;
		width: 700px;
		height: auto;
		margin: 0px;
		border: 1px solid #DDDDDD;
		border-radius: 4px;
	}
	.progress-bar {
		height: 4px;
		width: calc(0% - 3px);
		background-color: white;
		border-radius: 0px 14px 14px 0px;
		position: absolute;
		top: 71px;
		border: 3px solid #098bdc;
		border-left: 0px;
		transition-duration: .4s;
	}
	.quiz-header {
		width: 100%;
		line-height: 76px;
		background-color: brown;
		border-radius: 4px 4px 0px 0px;
		color: white;
		font-size: 25px;
	}
	.quiz-header .heading {
		display: inline-block;
		margin-left: 40px;
	}
	.quiz-header .total-q {
		float: right;
		display: inline-block;
		margin-right: 40px;
	}
	.question ul li {
		list-style: none;
		display: none;
	}
/*	it will show the first question by default*/
	.question ul li:first-child {
		display: block;
	}
	.question .q {
		font-size: 20px;
		margin: 30px 40px 20px 0px;
	}
	.question button {
		display: block;
		width: 280px;
		text-align: left;
		padding-left: 10px;
		height: 33px;
		margin: 10px 50px 10px 0px;
		border: 1px solid #91D2FA;
		background-color: rgba(0,0,0,0.00);
		border-radius: 3px;
		transition-duration: .2s;
		cursor: pointer;
		font-family: 'Montserrat', sans-serif;
	}
	.question button:hover {
		color: white;
		background-color: brown;
		border: 1px solid yellow;
	}
	.question button:focus {
		outline: none;
	}
	.quiz-footer {
		border-top: 1px solid #DDDDDD;
		width: 100%;
		line-height: 75px;
		margin-top: 30px;
	}
	.quiz-footer .timeout {
		display: inline-block;
		margin-left: 35px;
	}
	.quiz-footer .timeout span {
		font-size: 25px;
	}
	.quiz-footer button {
		display: inline-block;
		float: right;
		margin-top: 22px;
		margin-right: 38px;
		background-color: #4EB7F8;
		border: 0px;
		color: white;
		padding: 8px 30px;
		border-radius: 4px;
		cursor: pointer;
		font-family: 'Montserrat', sans-serif;
	}
	.question button.correct {
		border: 1px solid green;
		background-color: rgba(0, 243, 0, .50);
	}
	.question button.wrong {
		border: 1px solid red;
		background-color: rgba(255, 0, 0, .50);
	}
	@media screen and (max-width: 715px){
		.container {
			width: 95%;
		}
	}
</style>
</head>

<body>
	<div class="container">
		<div class="progress-bar"></div>
		<div class="quiz-header">
			<div class="heading">MCQ's Quiz</div>
			<div class="total-q">0/0</div>
		</div>
		<div class="quiz-body">
			<div class="question">
				<ul>
<!--					now add question you want to make quiz-->
					<li answer-number="1">
						<div class="q">Who has been sworn as the vice president of South Sudan?</div>
						<button type="button">Riek Macher</button>
						<button type="button">Abdallah hamdock</button>
						<button type="button">Salva Kiir Mayardit</button>
						<button type="button">none</button>
					</li>
					<li answer-number="2">
						<div class="q">Nuclear reaction occurs on sun</div>
						<button type="button">Fission</button>
						<button type="button">Fusion</button>
						<button type="button">Both A and B</button>
						<button type="button">None of above</button>
					</li>
					<li answer-number="3">
						<div class="q">Which flower is national flower of Pakistan?</div>
						<button type="button">Jasmine</button>
						<button type="button">Rose</button>
						<button type="button">Sun flower</button>
						<button type="button">None of these</button>
					</li>
					<li answer-number="4">
						<div class="q">In the composition of the earth aluminum is</div>
						<button type="button">27.5%</button>
						<button type="button">20.3%</button>
						<button type="button">14.5%</button>
						<button type="button">8.1%</button>
					</li>
					<li answer-number="3">
						<div class="q">After many years Cinema houses were opened in Saudi Arabia?</div>
						<button type="button">25 Years</button>
						<button type="button">20 Years</button>
						<button type="button">35 Years</button>
						<button type="button">55 Years</button>
					</li>
					<li answer-number="1">
						<div class="q">Which Country and its territories cover the most time zones</div>
						<button type="button">France</button>
						<button type="button">Spain</button>
						<button type="button">Germany</button>
						<button type="button">Greece</button>
					</li>
<!--					now I am adding question quickly-->
				</ul>
			</div>
		</div>
		<div class="quiz-footer">
			<div class="timeout">Time Left: <span>20</span>s</div>
			<button type="button" onClick="showQ()" id="showQ">Next</button>
			<button type="button" onClick="result(true)" id="result" style="display: none">Get Result</button>
		</div>
	</div>
<script>
window.onload = showQ;
//	make a function to show each quiz on next button
var i = 0;
function showQ(){
//	first store all li tags in a veriable
	var ul = document.getElementsByTagName('ul')[0];
	var li = ul.getElementsByTagName('li');
	for(var j = 0; j<= li.length-1; j++){
//		first we need to show only 1 li tag then
		if(i == j){
			li[j].style.display = 'block';
			// now get the answer value from li tag and store it in button as true or false
			var ans = li[j].getAttribute('answer-number');
			var btn = li[j].getElementsByTagName('button');
			for(var k = 0; k <= btn.length-1; k++){
				if(k+1 == ans){
					// if it match to the answer, then it is true otherwise false
					btn[k].setAttribute('answer', true);
					// also make a function for clicking answer button
					btn[k].setAttribute('onClick', "clickAns("+i+", this)");
					// we will make a function clickAns later and pass parameter of i and this
				}else{
					btn[k].setAttribute('answer', false);
					btn[k].setAttribute('onClick', "clickAns("+i+", this)");
				}
			}
		}else{
			li[j].style.display = 'none';
		}
	}
	// now add total question and current question number
	document.getElementsByClassName('total-q')[0].innerHTML = i+1 + "/" + li.length;
	// also change the progress-bar length
	document.getElementsByClassName('progress-bar')[0].style.width = (i/li.length)*100 + '%';
	// we need to increase the value of i on each time function run to show next question
	if(i == li.length-1){
		i = 0;
		// on last question show get result button
		document.getElementById("showQ").style.display = 'none';
		document.getElementById("result").style.display = 'block';
		document.getElementsByClassName('timeout')[0].setAttribute('show-result', 'true')
	}else{
		i++;
	}
	// disable show next question button until not answered
	document.getElementById("showQ").disabled = true;
	// now make a timeout
	// test it
	document.getElementsByClassName('timeout')[0].setAttribute('data-remain', 20);
}
setInterval(function(){
	// this function will get data-remain value and decrease by 1 and add to data-remain again after 1 second
	var dataContainer = document.getElementsByClassName('timeout')[0];
	var getData = dataContainer.getAttribute('data-remain');
	// if answer is last then don't show first answer just show result
	var showResult = dataContainer.getAttribute('show-result');
	// but we need to set this attribute on last question
	if(getData >= 0){
		try{document.querySelector('.timeout span').innerHTML = getData}catch{};
			getData--;
			dataContainer.setAttribute('data-remain', getData);
	}else{
		// now if last question
		if(showResult == 'true'){
			document.getElementById('result').click();
		}else{
		    // if getData is less than 0
		    // then show next answer
		    showQ();
		}
	}
}, 1000);
// now make a function for answer
function clickAns(i, e){
	var ul = document.getElementsByTagName('ul')[0];
	var li = ul.getElementsByTagName('li');
	var btn = li[i].getElementsByTagName('button');
	// get the answer form the button 
	var v = e.getAttribute('answer');
	for(var j = 0; j <= btn.length-1; j++){
		if(v == 'true'){
			// if answer is true
			e.className = 'correct';
			result(false);
		}else{
			e.className = 'wrong';
			//first make both class in css
			// also show correct answer after wrong clicked
			for(var k = 0; k <= btn.length-1; k++){
//				we only need the show correct ans
				if(btn[k].getAttribute('answer') == 'true'){
					btn[k].className = 'correct';
				}
				
			}
		}
		// disable button after first click
		btn[j].disabled = true;
	}
	// also enable next question button after click
	document.getElementById("showQ").disabled = false;
}
// now get the result
var numPerQ = 5;
var correctAns = 0;
	// we run the function from two side 1 just add correct answer number and 2 will show answer
function result(showAns){
	var ul = document.getElementsByTagName('ul')[0];
	var li = ul.getElementsByTagName('li');
	if(showAns == false){
		// it will add answer
		correctAns++;
	}else{
		// it will show result
		var result = (correctAns/4)*numPerQ;
		var totalNumb = li.length*numPerQ;
		document.getElementsByClassName('timeout')[0].innerHTML = 'Result is: ' + result + '/' + totalNumb;
		document.getElementsByClassName('progress-bar')[0].style.width = 'calc(100% - 3px)';
	}
}
</script>
</body>
</html>
