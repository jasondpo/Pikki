$(function(){
	$(".historyFilter-dropDown").mouseout(function(){
		$(".historyFilter-dropDown").delay(1000).fadeOut(200);
	});
	$(".mainProfile").click(function(){
		$(".mainProfile-Box").fadeToggle();
	});
	$('body').click(function(event){
		$(".mainProfile-Box").fadeOut('fast');
	});
	$('.mainProfile-Box').click(function(event){
    	event.stopPropagation();
    });
    $('.mainProfile').click(function(event){
    	event.stopPropagation();
    });
    
    $(".profileIcon").click(function(){
		$(".profile-Menu").fadeToggle('fast');
	});
	$(".profile-Menu").mouseout(function(){
		$(".profile-Menu").delay(1000).fadeOut(200);
	});
	$('.profileIcon').click(function(event){
    	event.stopPropagation();
     });
    $('.profile-Menu').click(function(event){
    	event.stopPropagation();
    });
    $('.profileOptions').mouseout(function(event){
    	event.stopPropagation();
    });
    $('body').click(function(event){
		$(".profile-Menu").fadeOut('fast');
	});
	$(".listIcon").click(function(){
		window.open('listPage.php','_self');
	});	

})

///////  Set answer profile colors START //////////////////////////

newColor=[];

window.onload = function chngProfileColor(){
	
   var defaultColor = document.getElementsByClassName("answer-profile");
   for (var x = 0; x < defaultColor.length; x++) {
     newColor.push(defaultColor[x]);
     if(newColor[x].getAttribute('data-color')=="1"){
	    newColor[x].style.backgroundColor = "#809BC6";
	    newColor[x].childNodes[3].style.borderTop = "10px solid #809BC6";  
     }else if(newColor[x].getAttribute('data-color')=="2"){
	    newColor[x].style.backgroundColor = "#9382c7";
	    newColor[x].childNodes[3].style.borderTop = "10px solid #9382c7";   
     }else if(newColor[x].getAttribute('data-color')=="3"){
	    newColor[x].style.backgroundColor = "#82c7ac";
	    newColor[x].childNodes[3].style.borderTop = "10px solid #82c7ac";   
     }else if(newColor[x].getAttribute('data-color')=="4"){
	    newColor[x].style.backgroundColor = "#c7bb82";
	    newColor[x].childNodes[3].style.borderTop = "10px solid #c7bb82";   
     }else{
	   	newColor[x].style.backgroundColor = "#809BC6";
	    newColor[x].childNodes[3].style.borderTop = "10px solid #809BC6";     
     }

     
   }
}

///////  Set answer profile colors END //////////////////////////


///////  For the upload page //////////////////////////


function getValue(obj){
	newValue=obj.title;
	document.getElementById("delete_file").value=newValue;
	}
	function makeOrder(){
	var e = document.getElementById("imgOrder");
	var strUser = e.options[e.selectedIndex].value;
	document.getElementById("fileNameChange").value=strUser;
}

$(document).ready(function(){

// SCROLL TO TOP OR BOTTOM START //
$(".scroll").click(function(event){
	//alert('this works');
     event.preventDefault();
     //calculate destination place
     var dest=0;
     if($(this.hash).offset().top > $(document).height()-$(window).height()){
          dest=$(document).height()-$(window).height();
     }else{
          dest=$(this.hash).offset().top;
     }
     //go to destination
     $('html,body').animate({scrollTop:dest}, 400,'swing');
 	});	
 });
  
  
var topScroll=document.getElementById("scrollUp");		 	

window.onscroll=function (){
	var i = pageYOffset;
	if(i>500){
		$(".scrollUp").fadeIn('fast');
	}
	if(i<500){
		$(".scrollUp").fadeOut('fast');
	}if(i<800){
		$("#orientationBox").fadeOut('fast');
	}
	if(i>800){
		$("#orientationBox").fadeIn('fast');
	}
}


// SMOOTH WINDOW SCROLL STARTS //
var lastPosition = -100;
$(document).ready(function() {
    $('.wrapper').height($('.smooth').height());

    $(window).resize(function() {
        $('.wrapper').height($('.smooth').height());
    });

    $('.flat-button').click(function() {
        $(".smooth").clearQueue().css({
            transform: 'translate3d(0px, -' + $('.toggle').offset().top + 'px, 0px)'
        });
        $(window).scrollTop($('.toggle').offset().top);
        return false;
    });
});

var scroll = window.requestAnimationFrame ||
    window.webkitRequestAnimationFrame ||
    window.mozRequestAnimationFrame ||
    window.msRequestAnimationFrame ||
    window.oRequestAnimationFrame ||
    // IE Fallback, you can even fallback to onscroll
    function(callback) {
        window.setTimeout(callback, 1000 / 60)
    };

function loop() {

    // Avoid calculations if not needed
    if (lastPosition == window.pageYOffset) {
        scroll(loop);
        return false;
    } else lastPosition = window.pageYOffset;
  
    var transform = 'translate3d(0px, -' + lastPosition + 'px, 0px)';
    var smoothScoll = $(".smooth")[0];
  
    smoothScoll.style.webkitTransform = transform;
    smoothScoll.style.mozTransform = transform;
    smoothScoll.style.transform = transform;
    
    scroll(loop)
}

// Call the loop for the first time
loop();

// SMOOTH WINDOW SCROLL ENDS //	 


$(function(){
	$(".logo").click(function(){
		//$(".btnClass").fadeOut(200);
		window.open('index.php','_self');
	});
})

/////// Both Slideshows  //////////////////////////

$(function(){
	$('.fadeinLeft img:gt(0)').hide();
	setInterval(function(){$('.fadeinLeft :first-child').fadeOut(800).next('img').fadeIn(800).end().appendTo('.fadeinLeft');}, 5000);
});
$(function(){
	$('.fadeinRight img:gt(0)').hide();
	setInterval(function(){$('.fadeinRight :first-child').fadeOut(800).next('img').fadeIn(800).end().appendTo('.fadeinRight');}, 5000);
});


/////// Response Orientation  //////////////////////////


/////// Remove Answers  //////////////////////////

function removeAns(obj){
	//obj.style.display="none";
	//obj.parentNode.style.display="none";
	obj.parentNode.style.cssText="display:none; float: left";
}

 allAnsBlock=[];

function showAllAns(){
 	var allAns = document.getElementsByClassName("user-answer-block");
 	
   for (var x = 0; x < allAns.length; x++) {
     allAnsBlock.push(allAns[x]);
     allAnsBlock[x].style.display = "block";
   }
}

/////// Adjust number of Answer Block rows //////////////////////////

ansRow=[];

/// Must acertain current hight of user-answer-blocks and officially set the height in order 
/// to get smooth height transition on first click

h = document.getElementsByClassName('user-answer-block')[1].offsetHeight;
var setHeight = document.getElementsByClassName("user-answer-block");

for (var x = 0; x < setHeight.length; x++){
		 ansRow.push(setHeight[x]);
		 ansRow[x].style.height = h+"px";
}		 
////// end requirement
		 
function changeRow(){
  
	var x = document.getElementById("selectRow").value;
	var allAns = document.getElementsByClassName("user-answer-block");
 	
 	if(x=="#"){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = h+"px";
		}
	}
 	if(x==3){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = "222px";
		}
	}if(x==5){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = "284px";
		}
	}if(x==7){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = "345px";
		}
	}if(x==10){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = "345px";
		}
	}if(x==15){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = "345px";
		}
	}if(x==20){
		for (var x = 0; x < allAns.length; x++){
		 ansRow.push(allAns[x]);
		 ansRow[x].style.height = "345px";
		}
	}
	
}

