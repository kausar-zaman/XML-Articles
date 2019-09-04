<?php
//Start session
session_start();

// Include header file
include "classes/functions.php";
loggedHeader();

// Include header file
include "classes/connect.php";

?>

<html>
   <head>
      <title>Article Exchange - View Articles</title>
      <script src="search.js"> </script>
        <script src="slideshow.js"> </script>
        <link rel="stylesheet" href="style/iframe.css">
         <link rel="stylesheet" href="style/search.css">
   </head>
     <body>

<?php
//LOAD XML file from URL
//Declare URL as variable URL
//IF URL is valid
//LOAD variable URL
//Declare LOAD as channelXML
//ELSE
//Output error message
//Execute query to get elements from url
//For each channel xml as article
//Declare link from xml file
//Get id
//Show iFrame

$url = 'http://unn-isrd1.newnumyspace.co.uk/xml-com/';

if ($url) {
	$channelXML = simplexml_load_file($url);
}
else {
	// if the data not found at the URI, then 	output an error message	
	echo "File not found";
	
}

$qry = '//channel/item';

 foreach ($channelXML as $article)
 {
			$link=$article->link;

 }
 $link = $_GET['id'];
?>

<iframe src="<?php echo "{$url}{$link}"?>"></iframe>

<p align="center">iFrame is currently not supported due to not gaining permission from original author. Click on the link below instead to view your articles.</p>
<p align="center"><a href="<?php echo "{$url}{$link}"?>">View</a></p>


<!--Link account page-->
<?php
if(!isset($_SESSION['email'])){
	
	?>

<p align="left"><a href="index.php"><b>&#8592; Back to home page</b></a></p>

<?php
} else {
	?>
    
<p align="left"><a href="account.php"><b>&#8592; Back to your account</b></a></p>
<?php
}
//Include footer function
dofooter();
?>