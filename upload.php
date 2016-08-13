<?php include 'functions.php';?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title> Just Choose admin </title> 
		
		<!-- Normalize CSS Stylesheet -->
		<link rel="stylesheet" src="//normalize-css.googlecode.com/svn/trunk/normalize.css" />
		
		<!-- Custom Stylesheet -->
		<link rel="stylesheet" href="assets/css/just-choose.css">
		
		<!-- jQuery Library-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		
		<!-- Custom jQuery -->
		<script src="assets/js/just-choose.js"></script>
	
</head>



<body>
	<form action="upload.php" method="post">
		
		<label>Main Question</label><br>
		
		<textarea name="questionField" class="questionFld"><?php //echo displayQuestion();?></textarea>
		<br>
		<br>
		 <input type="submit" name="mainQues" value="submit">	
		
	</form>
		
	<hr/>

	<form action="upload.php" method="post" enctype="multipart/form-data">
		<br>
	    <br>
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
	    <br>
	    <br>
	    Change name:
	    <input type="text" id="fileNameChange" name="fileName">
	    <select id="imgOrder" onchange="makeOrder();">
		  <option selected>Choose</option>
		  <option value="01">1</option>
		  <option value="02">2</option>
		  <option value="03">3</option>
		  <option value="04">4</option>
		  <option value="05">5</option>
		  <option value="06">6</option>
		  <option value="07">7</option>
		  <option value="08">8</option>
		  <option value="09">9</option>
		  <option value="10">10</option>
		  <option value="11">11</option>
		  <option value="12">12</option>
		</select>
	</form>

	<?php
		if(isset($_POST["erase"])) {
			
			$image_file=$_POST['deleteImage'];
		
			unlink("uploads/$image_file");
		}
			
	   
		if(isset($_POST['createTables'])){
	  		$db = createTables();
     	}          
	 
	?>
	
	<form action="upload.php" method="post">
		Delete image:
		<input type="text" name="deleteImage" id="delete_file">
	    <input type="submit" value="remove" name="erase">	
	</form>
	
<br>
<br>

	<div class="directory">
		<?php //displayThmbs(); ?>
	</div>

<br>
<br>
<hr/>
<br>
<br>

	<form action="upload.php" method="post">
		
		<input type="submit" name="createTables" value="create tables">	
		
	</form>


</body>
</html>
