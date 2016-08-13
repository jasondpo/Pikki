	 slideTotal = [];
	 image = [];
	 urlSplit=[];
	 imgSplit=[];
	 finalURL=[];

 var allElems = document.getElementsByClassName("hide");

 for (var r = 0; r < allElems.length; r++) {
   if (allElems[r].className == "hide myPosition") slideTotal.push(allElems[r]);
 }

 i = 1

 function placeCheck(obj) {
    var theCSSprop = window.getComputedStyle(obj, null).getPropertyValue("background-image"); // get value of the stye: background-image property
    obj.setAttribute("style", "background-image: url(assets/images/check-overlay.png),"+theCSSprop+" ;"); // place check image above orginal background image
 }

 function resetCheck() {
   var myPhotos = document.getElementsByClassName("photo");

   for (var x = 0; x < myPhotos.length; x++) {
     image.push(myPhotos[x]);
     urlSplit=window.getComputedStyle(image[x], null).getPropertyValue("background-image");
	    imgSplit.push(urlSplit);
       if(imgSplit[x].includes(',')!=false){
	     //alert('has comma');
	     finalURL.push(imgSplit[x].split(',')[1]);
     }else{
	    //alert('Does NOT have comma');
	    finalURL.push(imgSplit[x]); 
     }
     //alert(finalURL[x]);
     image[x].setAttribute("style", "background-image:"+finalURL[x]+";");
   }
 }

 function setCounter() {
   document.getElementById("counter").innerHTML = 1 + " of " + (slideTotal.length + 1);
 }
 setCounter();

 function fruit(obj) {

   if (obj.checked == true) {
     i++       
     setTimeout(function() {
       if (document.getElementById("slide" + i) != null) {
         document.getElementById("slide" + i).style.display = "block";
         document.getElementById("counter").innerHTML = i + " of " + (slideTotal.length + 1);
         document.getElementById("slide" + (i - 1)).style.display = "none"
         document.getElementById("clickBlocker").style.display="none";
       } else {
         document.getElementById("slide" + (i - 1)).style.display = "none"
       }
     }, 500);

   }
   if (i == slideTotal.length + 2) {
     var checks = document.forms[0];
     var txt = [];
     var untxt = "";
     var z;
     var acceptId = 10;
     var rejectId = 10;
     for (z = 0; z < checks.length; z++) {
       if (checks[z].checked) {
         txt += "<div id='sel" + acceptId++ + "' class='seperator' onclick='chngMe(this)'>" + checks[z].value + "</div> <br/> ";
       }
       if (!checks[z].checked) {
         untxt += "<div id='trd" + rejectId++ + "' class='seperator2' onclick='chngMe2(this)'>" + checks[z].value + "</div> <br/> ";
       }
     }
     setTimeout(function() {
	   document.getElementById("clickBlocker").style.display="none";
	   document.getElementById("Form1").style.display="none";
	   document.getElementById("basket").style.display="block";
       document.getElementById("basket").innerHTML = "<b>Chose</b><br><br> " + txt;
       document.getElementById("case").style.display="block";
       document.getElementById("case").innerHTML = "<b>Rejected</b><br> <br>" + untxt;
       document.getElementById("saveBtn").style.display = "block";
       document.getElementById("undo").style.display = "block";
       document.getElementById("counter").style.display = "none";
     }, 1000);

   }
 }



 function simulate(obj) {
   var x = obj.id;
   var y = x.slice(-2);  
   document.getElementById('checkbox' + y).click();
   document.getElementById("clickBlocker").style.display="block";
 }
 


 function resetMe() {
   document.getElementById("basket").style.display="none";
   document.getElementById("case").style.display="none";
   document.getElementById("Form1").style.display="block";
   document.getElementById("Form1").reset();
   document.getElementById("slide1").style.display = "block";
   document.getElementById("case").innerHTML = "";
   document.getElementById("basket").innerHTML = "";
   document.getElementById("saveBtn").style.display = "none";
   document.getElementById("undo").style.display = "none";
   setCounter();
   resetCheck();
   document.getElementById("counter").style.display = "block";
   i = 1;
 }

 function chngMe(obj) {
   number = obj.id.slice(-2); //grabs id number
   //alert(number);
   chose = obj.innerHTML; //grabs text in div
   reject = document.getElementById("trd" + number).innerHTML; //places text from reject into variable
   obj.innerHTML = reject; //places variable adjacent "chose" box
   document.getElementById("trd" + number).innerHTML = chose;
   //alert(f);
 }


 function chngMe2(obj) {
   number = obj.id.slice(-2); //grabs id number
   //alert(number);
   reject = obj.innerHTML; //grabs text in div
   chose = document.getElementById("sel" + number).innerHTML; //places text from reject into variable
   obj.innerHTML = chose; //places variable adjacent "chose" box
   document.getElementById("sel" + number).innerHTML = reject;
   //alert(f);
 }
 
function resetForms() {
    document.forms['Form1'].reset();
}
//////////////////////  Save Answers  ///////////////////////

myChosenContainer=[];
theVal="";
theVal2="";
function saveData(){ 
	var myChosen = document.getElementsByClassName("seperator");
	var myChosen2 = document.getElementsByClassName("seperator2");
	
	for (var x = 0; x < myChosen.length; x++) {
	 	theVal+="<div class='fRight'>"+myChosen[x].innerHTML+"</div>";
	 	//theVal+=myChosen[x].innerHTML;
	}
	
	for (var x = 0; x < myChosen2.length; x++) {
	 	theVal2+="<div class='fLeft'>"+myChosen2[x].innerHTML+"</div>";
	 	//theVal2+=myChosen2[x].innerHTML;
	}
	
	//document.getElementById('chosenOne').value=theVal+theVal2;
	document.getElementById('chosenOne').value=theVal;
	document.getElementById('notChosen').value=theVal2;
	//setTimeout(function(){document.getElementById('responseBox').innerHTML=theVal+theVal2;},1000); 
	setTimeout(function(){document.getElementById('save').click();},500);   
  
}




$(function(){
	$(".ResponseBox").click(function(){
		$(".overlay").fadeIn('fast');
		document.getElementById('picci-Body').style.overflow="hidden";
	});
	$(".closeOverlay").click(function(){
		$(".overlay").fadeOut('fast');
	});
	$(".overlay").click(function(){
		$(".overlay").fadeOut('fast');
		document.getElementById('picci-Body').style.overflowY="scroll";
	});
	$('.picBox-container').click(function(event){
    	event.stopPropagation();
	});
	$('.historyFilter').click(function(){
    	$(".historyFilter-dropDown").fadeToggle('fast');
	});
	$('body').click(function(event){
		$(".historyFilter-dropDown").fadeOut('fast');
	});
	$('.historyFilter-dropDown').click(function(event){
    	event.stopPropagation();
	});
	$('.historyFilter').click(function(event){
    	event.stopPropagation();
	});

})		