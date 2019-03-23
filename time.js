/* 
* @Author: Bhavul Gauri
* @File Name: time.js
* @Date:   2015-10-18 20:56:18
* @Last Modified by:   bhavul
* @Last Modified time: 2015-10-19 00:42:02
* 
* Copyright (C) Bhavul Gauri <bhavul93@gmail.com> - All Rights Reserved
* Unauthorized copying/distribution of this file, via any medium is strictly prohibited.
*/

'use strict';
var oneMin = null;

function startTimer(duration, display) {
			var waitTime = 0;
			var audio = new Audio('audiofile.mp3');
			var timer = duration, minutes, seconds;
	   	 	oneMin = setInterval(function () {
		        minutes = parseInt(timer / 60, 10);
		        seconds = parseInt(timer % 60, 10);

		        minutes = minutes < 10 ? "0" + minutes : minutes;
		        seconds = seconds < 10 ? "0" + seconds : seconds;

		        display.text(minutes + ":" + seconds);

		        if (--timer < 0) {
		        	clearInterval(oneMin);
		        	if(waitTime == 0){	//was not waiting... and time over.
		        		audio.play();
		        		timer = 60*3;
		        		waitTime = 1;
			        	document.getElementById('my-button').click();
		        		document.getElementById('displayText').innerHTML = "Waiting time to write your update.";
		        	}
		        	else{	//was waiting for changing updates
		        		document.getElementById('displayText').innerHTML = "Next update in:";
		        		timer = duration;
		        		waitTime = 0;
		        	}
		        }

			}, 1000);

}


jQuery(function ($) {
    var fiveMinutes = 60 * 15,
        display = $('#time');
    startTimer(fiveMinutes, display);
});