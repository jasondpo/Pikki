<?php include 'functions.php';?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Pikki | Log in </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Bootstrap core CSS -->
   		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/index.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery.parallax-1.1.3.js"></script>
		
		<!-- Custom jQuery -->
		<script src="assets/js/   .js"></script>
		
		<script>
		$(document).ready(function(){
			$('.method1-Section').parallax("50%", 0.1);
			$('.method2-Section').parallax("50%", 0.1);
		})
		</script>
		
	<!-- Fonts START -->
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic' rel='stylesheet' type='text/css'>		
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<!-- Fonts END --> 
		
		
<script>

	$(function(){
		$(".logIn").click(function(){
			$(".btnClass").fadeOut(200,function(){ 
				$(".signUp-box").fadeIn(200);
				$(".indexOverlay").fadeIn(200); 
			});
		});
		
		$(".signUp").click(function(){
			$(".btnClass").fadeOut(200,function(){
				$(".indexOverlay").fadeIn(200); 
				$(".register-box").fadeIn(200); 
			});
		});
		
		$(".backBtn").click(function(){
			$(".signUp-box").fadeOut(200,function(){
				$(".indexOverlay").fadeOut(200);  
				$(".btnClass").fadeIn(200); 
			});
		});
		
		$(".backBtn2").click(function(){
			$(".register-box").fadeOut(200,function(){ 
				$(".indexOverlay").fadeOut(200);  
				$(".btnClass").fadeIn(200); 
			});
		});
		
		
function myFunction() {
      //x = Math.floor((Math.random() * 10) + 1);
      //document.getElementById("board").innerHTML = x;
      startPicci();
      //alert(x);
  }
   function startPicci(){
      $('.login-animation-box').animate({opacity:1},'slow', function(){
          $('.rightArm').delay(1000).animate({opacity:1, top:150},'slow', function(){
          		$('.rightArm').delay(500).animate({left:125},'slow', function(){
              	$('.rightArm').delay(500).animate({left:250},'slow',function(){
                		$('.selectRight').delay(500).animate({opacity:1},'fast', function(){
                        $('.login-animation-box').delay(2000).animate({opacity:0},'fast');
                    });
                	});
              });
          });
      });     
   }
   //setInterval(function(){startPicci();},5000);
   //setTimeout(function(){myFunction();},3000);

/////////////// slideshow ///////////////////  
var bkg = [];
    bkg[0]="url('assets/images/login-bkg.jpg')";
	bkg[1]="url('assets/images/login-bkg2.jpg')";
	bkg[2]="url('assets/images/login-bkg3.jpg')";
	bkg[3]="url('assets/images/login-bkg4.jpg')";	   	   
      
 var x = 0
 
 function slideShow(){
	x++
	if(x==4){x=0}
	document.getElementById('login-Section').style.backgroundImage=bkg[x];
 }
 
setInterval(function(){slideShow()}, 3000);  				



/////// Slideshows  //////////////////////////


	$('.mainSlideshow img:gt(0)').hide();
	setInterval(function(){$('.mainSlideshow :first-child').fadeOut(800).next('img').fadeIn(800).end().appendTo('.mainSlideshow');}, 5000);
	
})	

</script> 

	</head>
	
	
	<body>		

        <?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
            logonPost();
        }
         ?>
     
		
		<div class="indexOverlay">
			<div class="title"></div>
		</div>
				

	
		
				
		
<div class="login-Section" id="login-Section">
	<div class="mainSlideshow">
		<img src='assets/images/login-bkg.jpg'>
		<img src='assets/images/login-bkg2.jpg'>
		<img src='assets/images/login-bkg3.jpg'>		
		<img src='assets/images/login-bkg4.jpg'>
		<img src='assets/images/login-bkg5.jpg'>		
	</div>
		<div id="logo" class="logo"></div>
		<div class="title"></div>
		<h16>Image-based questionnaire<br> for <span>inquisitive</span> people</h16>
		<div class="logIn btnClass"><h10>Log In</h10></div>
		<div class="signUp btnClass"><h10>Register</h10></div>
		
		<div class="signUp-box">
			
			<form method="post" autocomplete="off" id="signUp-form">
				<input type="text" id="username" class="inputClass" name="mainUsername" value="User Name" onblur="if(this.value==''){ this.value='User Name'; }" onfocus="if(this.value=='User Name'){ this.value='';}"/>

<input type="text" id="password" class="inputClass" name="mainPassword" value="Password" onblur="if(this.value==''){ this.value='Password'; this.type='text'}" onfocus="if(this.value=='Password'){ this.value=''; this.type='password'}"/>
				<br>
				<input type="submit" value="Log In" class="loginBtn" name="logOn">
				<h12 class="backBtn">Back</h12>
			</form>
		</div>
		
	
		<div class="register-box">
			
			<form method="post" autocomplete="off">
				
				<input type="text" id="createUsername" class="inputClass" name="username" value="Create a user name" 
  onblur="if(this.value==''){ this.value='Create a user name'; }" onfocus="if(this.value=='Create a user name'){ this.value='';}"/>	
  
				<input type="text" id="createPassword" class="inputClass" name="password" value="Create password" onblur="if(this.value==''){ this.value='Create password'; this.type='text'}" onfocus="if(this.value=='Create password'){ this.value=''; this.type='password'}"/>
				
				<input type="text" id="confirmPassword" class="inputClass" name="verifypassword" value="Confirm password" onblur="if(this.value==''){ this.value='Confirm password'; this.type='text'}" onfocus="if(this.value=='Confirm password'){ this.value=''; this.type='password'}"/>
				
				<input type="submit" value="Register" name="register" class="loginBtn">
				
				<h12 class="backBtn2">Back</h12>
			</form>
		</div>
		
		
		<a class="scroll" href="#explainer-Section"> <div class="downward-arrow"></div></a>
		
		
</div>	<!-- Login Section ends --->
<div id="explainer-Section" class="explainer-Section">
	
	<div class="container ">	
		
		<div class="row">			
			<div class="col-md-12">
		        <h13>No typing. Get straight to the point.</h13>
		       	<h14><span>Compose your question. Attach multiple images. Respondents answer by checking images from the "comparison field", or <br>arranging images in the "list field". No typing required. Below are just a few possible uses:</span></h14>
	        </div>
			
	        <div class="col-md-6 paragraphPad">
		        <h15><img src="assets/images/vacation-icon.svg" class="img-responsive" alt="Responsive image">Pick family vacations</h15>
		        <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h14>
	        </div>
	        
	        <div class="col-md-6 paragraphPad">
		        <h15><img src="assets/images/list-icon.svg" class="img-responsive" alt="Responsive image">Rank favorites</h15>
		        <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h14>
	        </div>
	        
	        <div class="col-md-6 paragraphPad">
		        <h15><img src="assets/images/politics-icon.svg" class="img-responsive" alt="Responsive image">Vote on political issues</h15>
		        <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h14>
	        </div>
	        
	        <div class="col-md-6 paragraphPad">
		        <h15><img src="assets/images/bottle-icon.svg" class="img-responsive" alt="Responsive image">Compare products/people</h15>
		        <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h14>
	        </div>
	    </div>
	    
  	</div>
</div>	<!--The end of explainer-Section -->

  
<div id="method1-Section" class="method1-Section">
	<div class="container ">
		
		<div class="row">			

			
	        <div class="col-md-6 paragraphPad chooseFav">
		        <h15>Head to head comparisons</h15>
		        <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.<br><br>

Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h14>
	        </div>
	        
	        <div class="col-md-6 paragraphPad">
				<img src="assets/images/compare.png" class="img-responsive" alt="Responsive image">
	        </div>

	        
	    </div>

		
	</div>	
</div>


<div class="method2-Section">
	<div class="container sectionPad">
		
		<div class="row">			

			
	        <div class="col-md-6 paragraphPad chooseFav">
				<img src="assets/images/compare.png" class="img-responsive" alt="Responsive image">
	        </div>
	        
	        <div class="col-md-6 paragraphPad">
		        <h15>Arrange into preferred order</h15>
		        <h14>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.<br><br>

Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</h14>
	        </div>

	        
	    </div>

		
	</div>	
</div>
	

		<div class="signUp-Section">
			<div class="title"></div>
			<div class="signUp btnClass"><h10>Register</h10></div>			
		</div>
		
		<div class="footer">
			<ul class="footerText">
				<li><h11>About Pikki</h11></li>
				<li><h11>Blog</h11></li>
				<li><h11>Term & Privacy</h11></li>
				<li><h11>Help</h11></li>
			</ul>
		</div>
		
		<script>
// SCROLL TO TOP OR BOTTOM START //
$(function(){
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

		</script>

	</body>
	
</html>




