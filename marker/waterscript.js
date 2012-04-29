var mouseB = false;
var red = 0;
var green = 0;
var blue = 0;
var fontget = "times";
var shadowon = "shadowno";
var fontz = 15;
var watermtext = "Watermark";

function getValues(){
	$('#valuefield1').val(red);
	$('#valuefield2').val(green);
	$('#valuefield3').val(blue);
	$('#valuefield4').val(fontget);
	$('#valuefield5').val(shadowon);
	$('#valuefield6').val(fontz);
	$('#valuefield7').val(watermtext);
}

function disableSubmit(){

document.getElementById('submitid').disabled = true;
$('#submitid').css('color', "red");
}

function changeText(){
	var text = document.getElementById('inputwater').value;
	var textmain = document.getElementById('maintext');
	textmain.innerHTML=text;
	watermtext = text;
}

function changeFont(font){
var mtext = document.getElementById('maintext');
var fonts = new Array("Georgia", "Impact", "Arial", "Lucida Console", "Calibri", "Tahoma", "Times New Roman", "Comic Sans MS");
var fontphp = new Array("georgia", "impact", "arial", "david", "calibri", "tahoma", "times", "comic");
mtext.style.fontFamily = ''+fonts[font]+'';
fontget = fontphp[font];
}

function fontSize(){
var fontsize = $('#inputSize').val();
$('#maintext').css('font-size', fontsize);
fontz = fontsize;
}

function changeFontColor(){
	fontcolor = "RGB("+ red +"," + green + "," + blue+")";
	$('#maintext').css('color', fontcolor);

}

function radioCheck(){
var rcheck = $('#checkshadow').is(':checked');

	if(rcheck){
		$('#maintext').css('text-shadow', "gray 3px 3px 3px");
		shadowon = "shadowon";
		}
		else{
		$('#maintext').css('text-shadow', "");
		shadowon = "shadowoff";
		}
}

function getPic(){
var url = document.getElementById('inputurl').value;
	if(url.indexOf("jpg")>0 || url.indexOf("png")>0 || url.indexOf("gif")>0 || url.indexOf("jpeg")>0)
	{
	$('#userpic').html("<img src='"+url+"'"+"' width='400' height='400'/>");
	$('#warningpic').html("");
	document.getElementById('submitid').disabled = false;
	$('#submitid').css('color', "#306108");
	}else
	{
	$('#warningpic').html("Not a valid URL");
	}
}

function colorBrowseRed(){
var mouseX = window.event.clientX;
mouseX-= document.getElementById('wrapper').offsetLeft;

	if(mouseB && mouseX>=0 &&mouseX<=255){
	$('#bar1').css('left', mouseX-10);
	$('#redp').html("Red " + mouseX);
	red = mouseX;
	changeFontColor();
		return mouseX;
	}

}

function colorBrowseGreen(){
var mouseX = window.event.clientX;
mouseX-= document.getElementById('wrapper').offsetLeft;

	if(mouseB && mouseX>=0 &&mouseX<=255){
	$('#bar2').css('left', mouseX-10);
	$('#greenp').html("Green " + mouseX);
	green = mouseX;
	changeFontColor();
		return mouseX;
	}
	

}

function colorBrowseBlue(){
var mouseX = window.event.clientX;
mouseX-= document.getElementById('wrapper').offsetLeft;

	if(mouseB && mouseX>=0 &&mouseX<=255){
	$('#bar3').css('left', mouseX-10);
	$('#bluep').html("Blue " + mouseX);
	blue = mouseX;
	changeFontColor()
	return mouseX;
	}
	
}

function setMouseFalse(){
	mouseB=false;
}
	 
function setMouseTrue(){
	mouseB=true;
}

function bannerAnimation(){
  $('#bottom').animate({
    opacity: 0.25,
    left: '+=50',
    height: 'toggle'
  }, 5000, function() {
    // Animation complete.
  });

}