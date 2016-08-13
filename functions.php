<?php
session_start();



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

function openDB2(){
    $servername = "jasondpo.ipowermysql.com"; //live host
	$username = "jasonpikki"; //live host
	$password = "jasonpikki"; //live host
	$dbname = "pikki";	
	//$username = "root";
	//$password = "root";

// Create connection
	$db = new mysqli($servername, $username, $password, $dbname);
    //$db = new PDO("mysql:host=localhost;dbname=justchoose", $username, $password);
	if ($db != true){
    die("Unable to open DB ");
    }
    //ECHO "DB OPENED<br>";
    return($db);             
}

function createTables(){
    $db=openDB();
    		
    $sql ="DROP TABLE IF EXISTS user, question, answers";
      $result = $db->query($sql);
            If ( $result != true){
            	die("Unable to drop user, question and answer tables");
            }
            else{
            	ECHO "<br>User, question and answer tables dropped<br>";                
            }
                      	            
    			                
    $sql="CREATE TABLE user ("
    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
    ."password VARCHAR(50) NOT NULL,"
    ."profile VARCHAR(50) NOT NULL,"
    ."username TEXT NOT NULL );";
   
    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create user table");
	   }
	   else{
	        ECHO "<br>User Table Created<br>";                
	     }
            	     
     
    $sql="CREATE TABLE question ("
    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
    ."userId VARCHAR(50) NOT NULL ,"
    ."date VARCHAR(50) NOT NULL ,"
    ."inquiry TEXT NOT NULL );";
   
	    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create question table");
	   }
	   else{
	        ECHO "<br>Question Table Created<br>";                
	     }
     
     $sql="CREATE TABLE answers ("
    ."id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
    ."userId VARCHAR(50) NOT NULL ,"
    ."chose TEXT NOT NULL ,"
    ."rejected TEXT NOT NULL ,"
    ."profileAns VARCHAR(50) NOT NULL ,"
    ."date VARCHAR(50) NOT NULL ,"
    ."name VARCHAR(50) NOT NULL ,"
	."questionId VARCHAR(50) NOT NULL);";
   
    
		$result=$db->query($sql);
	    if($result != true){
	        die("<br>Unable to create answers table");
	   }
	   else{
	        ECHO "<br>Answers Table Created<br>";                
	     }
		  	     		   
	     		   
}

if (isset($_POST["create"])){
    $db = openDB();
        $sql ="INSERT INTO question (inquiry)"
                  ." VALUES " 
                ."( '"
                .$_POST['inquiry']."' );"; 
        $result = $db->query($sql);
        if ( $result != true){
            ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save inquiry info</h102></div></div>";
         //  LogMsg("contacts.php insert contacts", $sql);
        }
        else{
            ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Inquiry info saved</h102></div></div>";
        }
      // initSession();  
}



if (isset($_POST["mainQues"])){
	date_default_timezone_set('america/new_york');
    $db = openDB();
        $sql ="INSERT INTO `question` (`date`, `inquiry`)"
                  ." VALUES " 
                ."( '"
                .date("M. d, g:i a")."','"
                .$_POST['questionField']."' );"; 
        $result = $db->query($sql);
        if ( $result != true){
            ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Unable to save question info</h102></div></div>";
         //  LogMsg("contacts.php insert contacts", $sql);
        }
        else{
            ECHO "<div class='alertBoxWrapper'><div class='alertBox'><h102>Question has been saved</h102></div></div>";
        }
      // initSession();  
}

function displayQuestion(){
    
    $db = openDB();               
    $query = "SELECT id, inquiry, date FROM question WHERE id=".$_SESSION["theques"]." ORDER BY id DESC LIMIT 1" ;
    $ds = $db->query($query);
     $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No inquiries found...</span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	//$x=1;
    foreach ($ds as $row){
        echo "<h17>".$row["date"]."</h17>".$row["inquiry"];
        //echo $_SESSION["quesId"] = $row["id"];			
    }
}


/////////////// Register users and validate logon process ///////////////

function logonPost(){ 
    if ( isset($_POST["register"])){
	// User clicked register button      
        if ($_POST["password"] != $_POST["verifypassword"]){
            echo "<script type = 'text/javascript'>alert('Passwords do not match');</script>";
			echo"<script>window.open('index.php','_self');</script>";
            exit();
        }else{
	        echo "<script>alert('password match');</script>";
        }
        
	// Both passwords match, see if user name already in use      
            $db = openDB();               
            $query = "SELECT password FROM user WHERE username= '".$_POST['username']."' ;";
            $ds = $db->query($query);
            $cnt = $ds->rowCount();
            if ($cnt == 1){	            
            	echo "<script>alert('User name already registered, use different name');</script>";
				echo"<script>window.open('index.php','_self');</script>";
                exit();              
            }else{
	            echo "<script>alert('Name is not there');</script>";
            }
                        
            //Add to user table
            
            
			$sql ="INSERT INTO `user` (`username`, `password`, `profile`)"
                      ." VALUES " 
                    ."( '"
                    .$_POST['username']."','"
                    .$_POST['password']."',
                    'profile-icon-small.png' );"; 
            $result = $db->query($sql);

            if ( $result != true){
                //Log errors
               LogMsg("user  insert ", $sql);
            }else{
				$last_id = $db->lastInsertId();
				//echo "<script>alert('The id number is ".$last_id."');</script>";
		// Allow new user onto your site
                session_start(); 
				$_SESSION["userpw"] = $_POST['password'];
				$_SESSION["userName"] = $_POST['username'];
				$_SESSION["userId"] = $last_id;
				echo"<script>window.open('profileBuilder.php','_self');</script>";
                exit();
            }
    }   
    
    
                 
    //////// Returning user  ///////////////////////////
	if(isset($_POST["logOn"])){

    	//echo"<script>alert('this works')</script>";
		$db = openDB();               
		$query = "SELECT password, id FROM user WHERE username= '".$_POST['mainUsername']."' ;";
		$ds = $db->query($query);
		$cnt = $ds->rowCount();		
		if ($cnt == 1 ){
			
			$row = $ds->fetch(); // Get data row			
						
			if($row["password"]==$_POST['mainPassword']){
				//echo"<script>alert('User is verified')</script>";
				session_start(); 
				$_SESSION["userpw"] = $_POST['mainPassword'];
				$_SESSION["userId"] = $row['id'];
				$_SESSION["userName"] = $_POST['mainUsername'];
				//header('Location: social.php');
				echo"<script>window.open('listPage.php','_self');</script>";
				exit();
			}else{
				echo"<script>alert('User name or password is incorrect.')</script>";
				echo"<script>window.open('index.php','_self');</script>";
		        exit();
		    }
		}else{
			echo"<script>alert('User name or password is incorrect.')</script>";
			echo"<script>window.open('index.php','_self');</script>";
		    exit();
		}
	}
			          
}        

		
	

/////////////////////////////////  UPLOAD PHOTOS  ///////////////////////////////////////////////////

/////  Thumbs for Upload page  /////////
function displayThmbs(){
	$dir = "uploads/";
	
	// Open uploads directory, and read its contents
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
	    while (($file = readdir($dh)) !== false){
		     if (($file == ".") || ($file == ".."))
	  {
	     continue;
	  }
	      echo "<div class='picOrder'><img src='uploads/" . $file . "'title=". $file ." onClick='getValue(this)'></div>";
	    }
	    closedir($dh);
	  }
	}
}
/////  Thumbs for social page  /////////

function displayThmbsSocialLeft($thmbFolder){
	if ($handle = opendir($thmbFolder)) {
	    while (false !== ($file = readdir($handle))) {
	      if ($file != "." && $file != "..") {
	        $file1[] = $file;
	      }
	    }
	    closedir($handle);
	}
    foreach(($file1) as $file){
	     echo "<img src='".$thmbFolder."". $file ."'>";
    }
}


function displayThmbsSocialRight($thmbFolder){
	if ($handle = opendir($thmbFolder)) {
	    while (false !== ($file = readdir($handle))) {
	      if ($file != "." && $file != "..") {
	        $file1[] = $file;
	      }
	    }
	    closedir($handle);
	}
    foreach(array_reverse($file1) as $file){	    
	     echo "<img src='".$thmbFolder."". $file ."'>";
    }
}


///////////////////////////////////////////////////////////////////////////////////

if(isset($_POST["submit"])) {
	$ext=end(explode('.',$_FILES["fileToUpload"]["name"]));
	$name=$_POST["fileName"];
	$target_dir = "uploads/";
	//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir.$name.".".$ext;
	
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
			
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
////////////////////////////////////// SAVE ANSWERS /////////////////////////////////////////////

	if ( isset($_POST["save"])){
		date_default_timezone_set('america/new_york');
	    $db = openDB2();
	    $sql ="INSERT INTO `answers` ( `userId`, `profileAns`, `date`,  `name`, `questionId`, `chose`, `rejected` )"
	              ." VALUES " 
	            ."( '"
	            .$_SESSION["userId"]."','"
	            .$_POST["mugShot"]."','"
	            .date("M. d, g:i a")."','"
	            .$_SESSION["userName"]."','"
	            .$_SESSION["theques"]."','" 			
	            .mysqli_real_escape_string($db, $_POST['chosen'])."','"
	    	    .mysqli_real_escape_string($db, $_POST['notChosen'])."' );";
	    	    //.$db->bindValue(':html', $_POST['chosen'], PDO::PARAM_STR)."','"
	    	   // .$db->bindValue(':html', $_POST['notChosen'], PDO::PARAM_STR)."' );";
	    	    //.$_POST['chosen']."','"
	    	    //.$_POST['notChosen']."' );";  
	    	    
	     
	    $result = $db->query($sql);
	    if ( $result != true){
	        
			//echo"<script>alert('Answers NOT saved.')</script>";
	    }
	    else{
			//echo"<script>alert('Answers saved.')</script>";
	    }
	}


/*
if ( isset($_POST["save"])){
	
$servername = "jasondpo.ipowermysql.com";
$username = "jasonpikki";
$password = "jasonpikki";
$dbname = "pikki";	
	

try {		
	//date_default_timezone_set('america/new_york');
			
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);	
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
    
    		echo "<script>alert('this part works')</script>";

	
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO answers (userId, profileAns, date, name, questionId, chose, rejected)
    VALUES (:userId, :profileAns, :date, :name, :questionId, :chose, :rejected");
    
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':profileAns', $profileAns);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':questionId', $questionId);
    $stmt->bindValue(':chose', $chose, PDO::PARAM_STR);
    $stmt->bindValue(':rejected', $rejected, PDO::PARAM_STR);

    // insert a row
    $userId = $_SESSION["userId"];
    $profileAns = $_POST["mugShot"];
    $date = date("M. d, g:i a");
    $name = $_SESSION["userName"];
    $questionId = $_SESSION["theques"];
    $chose = $_POST['chosen'];
    $rejected = $_POST['notChosen'];
    $stmt->execute();


    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    
    }
    $conn = null;    

}
    

*/	
	
	
	
	
	
	///////////////
	
	function displayAnswer(){
    
	    $db = openDB();               
	    $query = "SELECT chose, userId, rejected, profileAns, date, name FROM answers WHERE questionId=".($_GET["question"])." ORDER BY id " ;
	    $ds = $db->query($query);
	     $cnt = $ds->rowCount();
	    if ($cnt == 0){
	        //echo "<span> No inquiries found...</span>";
	        return; // No answers 
	    } 
	    // Fill scroll area             
		$x=1;
	    foreach ($ds as $row){
	        echo "<div class='user-answer-block clearfix'><div class='clearAns' onclick='removeAns(this);'></div><div data-color='".$row["userId"]."' id='profileColor".$x++."' class='answer-profile'><h17>".$row["date"]."</h17><div class='profile profileClass' style='background-image:url(uploads/".$row["profileAns"].")'></div><h18>".$row["name"]."</h18><div class='arrow-down-profile'></div></div>"."<div class='chose-column'>".$row["chose"]." </div><div class='reject-column'>".$row["rejected"]."</div></div>";
	    }
	}


?>