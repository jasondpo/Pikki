<?php include 'functions.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
		
	<!-- Fonts START -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'/>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
	<!-- Fonts END --> 
	
<head>
<?php	
	function displayQuestionList(){
    
    $db = openDB();               
    $query = "SELECT inquiry, date, id FROM question ORDER BY id DESC" ;
    //$query = "SELECT inquiry, date, id FROM question ORDER BY id DESC JOIN answers" ;
    $ds = $db->query($query);
    $cnt = $ds->rowCount();
    if ($cnt == 0){
        echo "<span> No inquiries found...</span>";
        return; // No contacts 
    } 
    // Fill scroll area             
	//$x=1;
    foreach ($ds as $row){
        echo "<a href='social.php?question=".$row["id"]."'> <li><h37>".$row["date"]."</h37><br>".$row["inquiry"]."<br><h17>".(countResponses($row['id']))."</h17></li></a>";
    }

}

function countResponses($countQue){
    $db = openDB();               
    $query = "SELECT questionId, COUNT(*) as count FROM answers WHERE questionId=".$countQue." ORDER BY id DESC" ;
	$ds = $db->query($query);
    $cnt = $ds->rowCount();
        foreach ($ds as $row){
	        if($row["count"] < 2){
	    echo "<h18>".$row["count"]." Reply </h18>";
	    }else{
	    echo "<h18>".$row["count"]." Replies </h18>";
	    }
	    //echo "<h17>".$row["count"]."</h17>";
	}
}

?>

<style>

h37{
	font-family: sans-serif;
	font-size: 11px;
	font-weight: bold;
	color:#569fd3;
	line-height: 1.5em;
}
h38{
	display: block;
	border-bottom: 1px solid #AAA;
	font-family: sans-serif;
	font-size: 14px;
	color:#666;	
	margin-bottom: 40px;
	padding-bottom: 10px;
}
h18{
	position: absolute;
	padding-top: 18px;
	display: block;
	width: 100px;
	text-align: right;
	right: 0px;
	font-family: sans-serif;
	font-size: 12px;
	color:#666;
	line-height: 1.3em;
}
.wrapper{
	top:200px;
	position: relative;
	max-width: 800px;
	margin: 0px auto 0px;
}
.questionList{
	list-style: none;
	margin: 0px;
	padding: 0px;
}
.questionList a:visited{
	color:#AAA;
}		
.questionList a:hover{
	background-color: #fafafa;
}
.questionList a{
	text-decoration: none;
	display: block;
	cursor: pointer;
	transition: background-color .15s linear;
	padding: 14px 0px 10px 10px;
	color: #555;
	width: 88%; 
}
.navBar-Container{
	position: relative;
	height: 60px;
	margin: 0px auto;
	max-width: 1200px;
}
.navBar{
	position: fixed;
	background-image: url(assets/images/color-strip.jpg);
	background-repeat:repeat-x;
	left:0px;
	right: 0px;
	height: 65px;
	top: 0px;
	border-bottom: 1px solid #d4d4d4;
	background-color: #fff;
	z-index: 2;
}
.logo{
	background-image: url('assets/images/logo1.png');
	height: 60px;
	margin-top: 5px;
	width: 100px;
	float: left;
	cursor: pointer;
}
.profileIcon{
	background-image: url('assets/images/profile-icon-nav.png');
	height: 60px;
	margin-top: 5px;
	width: 60px;
	float: right;
	cursor: pointer;
}
.profileIcon:hover{
	background-position: 60px 0px;	
}
.listIcon{
	background-image: url('assets/images/list-icon-nav.png');
	height: 60px;
	margin-top: 5px;
	width: 60px;
	float: right;
	cursor: pointer;
}
.listIcon:hover{
	background-position: 60px 0px;
}
.profile-Menu{
	width: 120px;
	border-radius:4px;
	position: absolute;
	right: 4px;
	background-color: #fff;
	top:70px;
	z-index: 10;
	box-shadow: 0px 0px 10px 1px rgba(50, 50, 50, .10);
	display: none;
	border: 1px solid #CCC;
}
.arrow-up-profile-Menu {
	position: absolute;
	right: 26px;
	top: -1px;
	background: #fff;
	border: 1px solid #fff;
}
.arrow-up-profile-Menu:after, .arrow-up-profile-Menu:before {
	bottom: 100%;
	left: 50%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
}
.arrow-up-profile-Menu:after {
	border-color: rgba(194, 225, 245, 0);
	border-bottom-color: #fff;
	border-width: 10px;
	margin-left: -10px;
}
.arrow-up-profile-Menu:before {
	border-color: rgba(194, 225, 245, 0);
	border-bottom-color: #CCC;
	border-width: 11px;
	margin-left: -11px;
}


</style>
</head>
<body>
	
		<div class="navBar">
		<div class="navBar-Container">
			<div class="logo"></div>
			<div class="profileIcon"></div>
			<div class="profile-Menu">
				<div class="arrow-up-profile-Menu"></div>
					<ul class="profileOptions">
						<li>Profile</li>
						<li>Log out</li>
					</ul>
			</div>
		</div>
	</div>

<div class="wrapper">


	
	<ul class="questionList">
		<h38>Questions</h38>
		<?php echo displayQuestionList();?>		
	</ul>
	
</div>

</body>
</html>