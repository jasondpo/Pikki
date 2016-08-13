<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title> Pikki | Home </title> 
	
	<!-- Normalize CSS Stylesheet -->
	<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
	
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="assets/css/just-choose.css">
	
	<!-- jQuery Library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
	

	<!-- Fonts START -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'/>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<!-- Fonts END --> 
    
 
   
</head>
<body id="picci-Body" onload="resetForms()">
	<?php include 'functions.php';?>
	<?php 
		
	$_SESSION["theques"]=$_GET["question"];	
	// echo "<script> alert('".$_SESSION["userId"]."');</script>";
		
	function getProfilePic(){	
		$db = openDB();               
	    $query = "SELECT profile FROM user WHERE password='".$_SESSION["userpw"]."'" ;
	    $ds = $db->query($query);
	     $cnt = $ds->rowCount();
	    if ($cnt == 0){
	        return; // No contacts 
	    } 
	    foreach ($ds as $row){
	        echo $row["profile"];  
    	}
    }
    
    function getProfileName(){	
		$db = openDB();               
	    $query = "SELECT username FROM user WHERE password='".$_SESSION["userpw"]."'" ;
	    $ds = $db->query($query);
	     $cnt = $ds->rowCount();
	    if ($cnt == 0){
	        return; // No contacts 
	    } 
	    foreach ($ds as $row){
	        echo $row["username"];  
    	}
    }	
	?>
	
	<a class="scroll" href="#topDiv"><div class="scrollUp" id="scrollUp"></div></a>
	
	<div class="overlay" id="overlay">
		<div class="closeOverlay"></div>
		<div class="picBox-container">
			<h19>Make your selection</h19>
			<div class="picBox-selection-container">
				
				<!-------->
<div id="counterBox"><h15 id="counter"></h15></div>
<div id="clickBlocker"></div>
<form name="Form1" id="Form1" style="color: green ; font-size: 150%" action="#">
  <div id="slide1" class="myPosition">
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox10" value="Alex" onclick="fruit(this)" /><span id="number10" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Alex.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox11" value="Idris" onclick="fruit(this)" /><span id="number11" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/idris.jpg)"></div></span>
  </div>
  <br />
  <div id="slide2" class="hide myPosition">
    <input type="checkbox" name="checkbox " class="checkHide" value="Isaiah" id="checkbox12" onclick="fruit(this)" /><span id="number12" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/isaiah.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" value="Jake" id="checkbox13" onclick="fruit(this)" /><span id="number13" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Jake.jpg)"></div></span>
  </div>
  <br />
  <div id="slide3" class="hide myPosition">
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox14" value="Johnny" onclick="fruit(this)" /><span id="number14" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Johnny.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox15" value="Kendrick" onclick="fruit(this)" /><span id="number15" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Kendrick.jpg)"></div></span>
  </div>
  <div id="slide4" class="hide myPosition">
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox16" value="LaBron" onclick="fruit(this)" /><span id="number16" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/LaBron.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox17" value="Lamman" onclick="fruit(this)" /><span id="number17" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Lamman.jpg)"></div></span>
  </div>
  <div id="slide5" class="hide myPosition">
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox18" value="LLCoolJ" onclick="fruit(this)" /><span id="number18" onclick="simulate(this)"><div class="photo"onclick="placeCheck(this)" style="background-image: url(selection/LLCoolj.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox19" value="Mathew" onclick="fruit(this)" /><span id="number19" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/mathew.jpg)"></div></span>
  </div>
  <div id="slide6" class="hide myPosition">
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox20" value="Morris" onclick="fruit(this)" /><span id="number20" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Morris.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox21" value="Ray" onclick="fruit(this)" /><span id="number21" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Ray.jpg)"></div></span>
  </div>
  <div id="slide7" class="hide myPosition">
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox22" value="Rock" onclick="fruit(this)" /><span id="number22" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/rock.jpg)"></div></span>
    <input type="checkbox" name="checkbox" class="checkHide" id="checkbox23" value="Sam" onclick="fruit(this)" /><span id="number23" onclick="simulate(this)"><div class="photo" onclick="placeCheck(this)" style="background-image: url(selection/Sam.jpg)"></div></span>
  </div>
</form>
		<div id="basket"></div>
		<div id="case"></div>
		<br/>
		<div id="saveBtn" onclick="saveData()">save</div>
		<div id="undo" onclick="resetMe()">reset</div>
		
		<br>
		<br>
		<br>
		<br>
		<form method="post" action="social.php?question=<?php echo $_GET["question"]; ?>">
			<textarea name="chosen" id="chosenOne"></textarea>
			<textarea name="notChosen" id="notChosen"></textarea>
			<input  type="text" name="mugShot" id="mugShot" value="<?php getProfilePic();?>">
			<input type="submit" value="save" id="save" name="save">
		</form>
		<br>
		<br>
						<!------->
			</div>
			
			<div class="message-input-box">
				<div class="profile profileClass" style="background-image: url(uploads/<?php getProfilePic();?>)"></div>
				
				<textarea  id="messenger" class="inputClass" name="mainUsername" value="What's on your mind?" onblur="if(this.value==''){ this.value='What\'s on your mind?'; }" onfocus="if(this.value=='What\'s on your mind?'){ this.value='';}"/>What's on your mind?</textarea>
				
			</div>
			<div class="message-board"></div>

		</div>
	</div>	

	<div class="navBar">
		<div class="navBar-Container">
			<div class="logo"></div>
			<div class="profileIcon"></div>
			<div class="listIcon"></div>
			<div class="profile-Menu">
				<div class="arrow-up-profile-Menu"></div>
					<ul class="profileOptions">
						<li>Profile</li>
						<li>Log out</li>
					</ul>
			</div>
			<div class="historyFilter"><h12>Filter</h12></div>
		</div>
	</div>	
	
	<div id="historyFilter-dropDown" class="historyFilter-dropDown"></div>
	
	<div class="socialBar">
		<div class="facebook socialButton-Class"></div>
		<div class="twitter socialButton-Class"></div>
		<div class="instagram socialButton-Class"></div>
	</div>  

	<div id="orientationBox">
		
		<h16>Orientation</h16><br>
		<div class="orientationCircle"></div>
		
		<h16>Rows</h16><br>
		<select id="selectRow" class="selectRow" onchange="changeRow()">
			<option value="#" selected>#</option>
			<option value="3">3</option>
		    <option value="5">5</option>
			<option value="7">7</option>
			<option value="10">10</option>
			<option value="15">15</option>
			<option value="20">20</option>
		</select> 
		
		<h16>View</h16><br>
		<div class="reveal" onclick="showAllAns()"></div>
		
	</div>  

<div class="wrapper" id="wrapper"><div class='smooth'>
	
	
	<div id="topDiv"></div>
		  
	<div class="billboard" style="background-image: url(uploads/mansion.jpg)">
		<div class="billboard-overlay"></div>
		<div class="topicTag"><h11>Topic: Politics</h11></div>
		<div class="mainProfile-Box">
			<div class="arrow-down-mainProfile"></div>
		</div>
	</div>
	
	<div class="mainProfile" style="background-image: url(assets/images/profile-icon-large.png)"></div>	 
	
	<div class="wrapper-question">
		
		<div class="questionBox">
			<div class="arrow_box"></div>
			<h10><span>name goes here</span></h10>
			<h14><?php echo displayQuestion();?></h14>
		</div>
	
	</div> 
			
	<div class="wrapper-answers clearfix">	
		
		<div class="ResponseBox clearfix">
						
			<div class="profileBox">
				<div class="profile profileClass" style="background-image: url(uploads/<?php getProfilePic();?>)"></div>
				<h13><span><?php getProfileName();?></span>, get pikki</h13>
				<div class="arrow-down"></div>
			</div>
			
			<div class="previewPicLeft-overlay"></div>
			<div class="left-previewPic fadeinLeft">
				<?php displayThmbsSocialLeft("selection".$_GET["question"]."/"); ?>
			</div>
			
			<div class="previewPicRight-overlay"></div>
			<div class="right-previewPic fadeinRight">
				<?php displayThmbsSocialRight("selection".$_GET["question"]."/"); ?>			
			</div>
									
		</div>
		
	</div>	  
	  
	<div class="respondArea clearfix">
		<div class="answer-wrapper">
			<?php displayAnswer();?>
		</div>

	</div>	
	  
</div>
</div>	
<!-- Custom jQuery -->
<script src="assets/js/just-choose.js"></script>
<script src="assets/js/photo-selection.js"></script>

</body>
</html>