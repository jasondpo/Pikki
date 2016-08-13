<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Picci | User Profile </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/cssBasic.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		
		<!-- Custom jQuery -->
		<script src="assets/js/   .js"></script>
		
	<!-- Fonts START -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'/>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<!-- Fonts END --> 
		
<style>
html, body{
	background-image: url(assets/images/color-strip.jpg);
	background-repeat:repeat-x;
	background-color: #E9EBEE;
}
h10{
	display: block;
	text-align: center;
	font-family: sans-serif;
	color: #fff;
	padding-top: 14px;
	text-transform: uppercase;
}
h11{
	display: block;
	text-align: center;
	text-align: center;
	font-family: sans-serif;
	color: #AAA;
	font-size: 11px;
}
h11:hover{
	text-decoration: underline;	
}
h12{
	position: absolute;
	bottom: 0px;
	display: block;
	width: 100%;
	font-family:sans-serif;
	font-size: 12px;
	margin-top: 10px;
	color: #fff;
	cursor: pointer;
}
h12:hover{
	text-decoration: underline;	
}
h13{
	display: block;
	position: absolute;
	left: 0px;
	right: 0px;
	font-size: 14px;
	text-align: center;
	font-family: sans-serif;
	color: #676767;
	top:20px;
}
h13 span{
	display: block;
	position: absolute;
	left: 0px;
	right: 0px;
	font-size: 12px;
	text-align: center;
	font-family: sans-serif;
	color: #AAA;
	top:20px;
}
h14{
	font-family: sans-serif;
	text-transform: uppercase;
	font-size: 14px;
	color: #AAA;
	display: block;
	position: absolute;
	width: 95px;
	height: 20px;
	bottom: 40px;
	right: 40px;
	cursor: pointer;
	background-image: url('assets/images/right-arrow.png');
	background-repeat: no-repeat;
	line-height: 1.6em;
	background-position: right center;
}
.prolifeBuilderBox{
	position: absolute;
	width: 450px;
	height: 320px;
	border-radius: 4px;
	left:50%;
	top:20%;
	margin-left: -250px;
	background-color: #fff;
	box-shadow: 0px 0px 1px 0px rgba(40, 40, 40, .3);
	box-sizing: border-box;
	padding: 20px;
}
.logo{
	width: 70px;
	height: 70px;
	border-radius: 50px;
	position: absolute;
	top:-110px;
	left: 50%;
	margin-left: -35px;
	background-image: url('assets/images/logo-80.png');
}
.preview-profileClass{
	background-size: cover;
	background-position: center top;
}
.preview-profile-large{
	width: 100px;
	height: 100px;
	border-radius: 50px;
	background-color: #4ec2ec;
	position: absolute;
	left: 50%;
	top:74px;
	margin-left: -110px;
	background-image: url('assets/images/profile-icon-large.png');
}
.preview-profile-small{
	width: 50px;
	height: 50px;
	border-radius: 50px;
	background-color: #4ec2ec;
	position: absolute;
	left: 50%;
	top:104px;
	margin-left: 30px;
	background-image: url('assets/images/profile-icon-small.png');
	background-repeat: no-repeat;
	background-position: center bottom;
}
.photo-Form{
	width: 100%;
	text-align: center;
	margin-top: 180px;
}
.done{
	position: absolute;
	bottom: 20px;
	right: 20px;
	border: none;
	border: 0px;
	background-color: #10b25e;
	color: #fff;
	width: 70px;
	height: 30px;
	cursor: pointer;
	border-radius: 4px;
}
.done:hover{
	background-color: #0e8c4b;	
}
.deleteIt{
	display: block;
}
</style>
		
		


	
<?php
/////////////////////////////  UPLOAD PROFILE IMAGE //////////////////////////////////////////////////////
	//echo"<script>alert('".$_SESSION["userpw"]."')</script>";
     
     
    $tmp = explode('.',$_FILES["fileToUpload"]["name"]);
	$extProfile=end($tmp);
	$nameProfile=rand(10000,20000);
	$target_dir_Profile = "uploads/";
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$target_file_Profile = $target_dir_Profile.$nameProfile.".".$extProfile;
	
	$uploadProfileOk = 1;
	$imageFileType_Profile = pathinfo($target_file_Profile,PATHINFO_EXTENSION);
	
if(isset($_POST["submitProfile"])) {	
	// Check if image file is a actual image or fake image
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";          
	        $uploadProfileOk = 1;
	    } else {
	        echo "File is not an image.";     
	        $uploadProfileOk = 0;
	    }
	
	// Check if file already exists
	if (file_exists($target_file_Profile)) {
	    echo "Sorry, file already exists.";
	    $uploadProfileOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadProfileOk = 0;
	}
	// Allow certain file formats
	if($imageFileType_Profile != "jpg" && $imageFileType_Profile != "png" && $imageFileType_Profile != "jpeg"
	&& $imageFileType_Profile != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadProfileOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadProfileOk == 0) {
	    echo "Sorry, your file was not uploaded (4).";    
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_Profile)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded."; 
	        //$previewPic=$nameProfile.$extProfile;
		    echo '<script> window.location.href="profileBuilder.php?'.$nameProfile.".".$extProfile.'"</script>';
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
?>
<?php
		if(isset($_POST["erase"])) {
			
			$image_file=$_POST['deleteIt'];
		
			unlink("uploads/$image_file");
		}        
?>
<?php
if(isset($_POST["attach-profile"])) {

	function openDB(){
    $servername = "jasondpo.ipowermysql.com"; //live host
	$username = "jasonpikki"; //live host
	$password = "jasonpikki"; //live host
	$dbname = "pikki";	
	//$username = "root";
	//$password = "root";

	$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //live host
    //$db = new PDO("mysql:host=localhost;dbname=justchoose", $username, $password);
	if ($db != true){
    die("Unable to open DB ");
    }
    //ECHO "DB OPENED<br>";
    return($db);              
}

        $db = openDB();
        $sql ="UPDATE `user`"
                . " SET `profile` = '".$_POST['deleteIt']."'"
                . "WHERE password = ". "'".$_SESSION["userpw"]."'";               

        $result = $db->query($sql);
        if ( $result != true){
            
          ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Could not update profile info</h102></div></div>";
        }
        else{
            //echo "<div class='alertBoxWrapper'><div class='alertBox'><h102>Profile updated</h102></div></div>";
            echo"<script>window.open('listPage.php','_self');</script>";
        }
}				
?>

	</head>
		
	<body>		
					
	<div class="prolifeBuilderBox">
		
		<div class="logo"></div>
		
		<div class="preview-profile-large preview-profileClass" id="preview-profile-large"></div>
		
		<div class="preview-profile-small preview-profileClass" id="preview-profile-small"></div>
		
		<h13>Please upload a profile image</h13>
		<h13><span>File size cannot exceed 500kb/.5mb and must be .jpg</span></h13>

		
	<form class="photo-Form" action="profileBuilder.php" method="post" enctype="multipart/form-data">
		
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <br/>
	    <br/>
	    <input type="submit" value="Confirm Image" name="submitProfile">
	    <input type="submit" value="Remove Image" name="erase">
	    <br/>
	    <br/>
	    <input type="text" class="deleteIt" id="deleteIt" name="deleteIt">	    
	    <br/>
	    <br/>
	    <input type="submit" class="done" value="Done" name="attach-profile">
	    
	</form>	
		
	</div>
   	<h14 class="skipThis">Skip this</h14>
   	

<script>
		
$(function(){
	$(".skipThis").click(function(){
		window.open('social.php','_self');
	});
})
	myLocation=window.location.href;
	
	var parts = myLocation.split('?', 2);
	
	var the_picNo  = parts[1];
	
	if(the_picNo!=undefined){
		document.getElementById("preview-profile-large").style.backgroundImage="url('uploads/"+the_picNo+"')";
		document.getElementById("preview-profile-small").style.backgroundImage="url('uploads/"+the_picNo+"')";
		document.getElementById("deleteIt").value=the_picNo;
	}else{
		// do nothing
	}	
</script> 		
	</body>
	
</html>




