<?php
//Include connection file
include "connect.php";

function doheader(){
	echo "<!DOCTYPE html>
<html>
<header>
<link rel='icon' type='image/png' href='/xmlarticles/img/clipart.jpg'/>
<link rel='stylesheet' href='style/index.css'>
<link rel='stylesheet' href='style/table1.css'>
<link rel='stylesheet' href='style/w3.css'>
    <h3>Article Exchange</h3>
     <div class='topnav'>
  <a class='active' href='index.php'><b>HOME</b></a>
  <a href='login.php'><b>LOGIN</b></a>
    </form>
  </div>
</div>
  </header>
  </html>";
}

function loggedheader(){
	echo "<!DOCTYPE html>
<html>
<header>
<link rel='icon' type='image/png' href='/xmlarticles/img/clipart.jpg'/>
<link rel='stylesheet' href='style/index.css'>
<link rel='stylesheet' href='style/table1.css'>
<link rel='stylesheet' href='style/w3.css'>
    <h3>Article Exchange</h3>
     <div class='topnav'>
  <a class='active' href='index.php'><b>HOME</b></a>
   <a href='account.php'><b>MY ARTICLES</b></a>
  <a href='logout.php'><b>LOGOUT</b></a>
  
    </form>
  </div>
</div>

  </header>
  </html>";
}





function dofooter(){
	echo "<!DOCTYPE html>
<link rel='stylesheet' href='style/index.css'>
<footer>
<p>&nbsp;</p>
<div class='footer'>
  <p>Copyright &copy; 2018 Article Exchange Inc. </p>
   <p>Kausar Zaman</p>
   <p>w17022892</p>
</div>
</footer>
</html>";
}



function table(){
	echo "  <table class='myArticles'>
	<tr>
      <th>Title</th>
      <th>Link</th>
      <th>Category</th>
      <th>Description</th>
      <th>Subscribe</th>
    </tr>
    <tr>
  </table>";
	
	}
	
function slideshow() {
echo "<meta name='viewport' content='width=device-width, initial-scale=1'>

<body>

<div class='box'>
<h2 align='center'>Welcome to Article Exchange</h2>
<p align='center'>Where reading goes on and on...</p>

<div class='w3-content w3-display-container'>
  <img src='img/article.jpg' width='200' height='400' class='mySlides' style='width:100%'>
  <img src='img/xml.jpg' width='200' height='400' class='mySlides' style='width:100%'>


  <button class='w3-button w3-black w3-display-left' onclick='plusDivs(-1)'>&#10094;</button>
  <button class='w3-button w3-black w3-display-right' onclick='plusDivs(1)'>&#10095;</button>
</div></div>
<p>&nbsp;</p>

";
}

function titlesearch(){
echo	
"<div id='wrapper'>
<div id='titlesearch'>
<h2>Search article by title</h2>
<form name='search' method='POST' action='searchtitle.php'>
    <input name='txtSearch' type='text' id='txtSearch' size='30'/>
    <input type='submit' value='Search' name='submit'/>
</form>
</div>";
}

function catsearch(){
echo	
"<div id='wrapper'>
<div id='catsearch'>
<h2>Search article by category</h2>
 <form name='search' method='POST' action='searchcategory.php'>
  <select name='catSearch' id='catSearch'>
    <option value='Web Services'>Web Services</option>
    <option value='E4X'>E4X</option>
    <option value='XForms'>XForms</option>
    <option value='XML'>XML</option>
	<option value='Query'>Query</option>
	<option value='vCards'>vCards</option>
  </select>
    <input type='submit' value='Search' name='submit'/>
</form>   
</div>
";
}

function banner(){
	echo "
	
	<link rel='stylesheet' href='style/index.css'>
	<div class='banner'>
    <div class='inline-block'>
	
    <img src='img/java.png' width='400' height='200'> </div>

    <div class='inline-block'>
    <img src='img/xml-tutorial.png' width='200' height='200'> 
    </div>
     <div class='inline-block'>
    <img src='img/php.png' width='400' height='200'> 
    </div>
    <div class='inline-block'>
    <img src='img/Csharp.png' width='200' height='200'> 
    </div>
   </div>";
}

function subscribe() {
	
// set connection as global variable
// IF user logged in with email
// IF user execute subscibe
// try
// execute insert query
// redirect to account page
// catch
// print JS alert
// END
	
global $conn;
if(isset($_SESSION['email'])){

if(isset($_POST['Subscribe'])){
	
		
	try {
	
	

	$sql = "INSERT INTO xml_article(title, link, body, category, subscriberID) VALUES (:title, :link, :body, :category, :subscriberID)";
                                          
$stmt = $conn->prepare($sql);
                                              
$stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);       
$stmt->bindParam(':link', $_POST['link'], PDO::PARAM_STR); 
$stmt->bindParam(':body', $_POST['description'], PDO::PARAM_STR); 
$stmt->bindParam(':category', $_POST['category'], PDO::PARAM_STR); 
$stmt->bindParam(':subscriberID', $_SESSION['email'], PDO::PARAM_STR);   
                                      
$stmt->execute(); 


header ('Location: account.php');
}
catch(PDOException $e)
    {
   echo "<script language='javascript' type='text/javascript'>alert('Error: You have already subscribed to this article');</script>";
    }
$conn = null;

}
}

// IF user not logged in
// print JS alert
// END

if(!isset($_SESSION['email']))
{
	if(isset($_POST['Subscribe'])){
		 echo "<script language='javascript' type='text/javascript'>alert('Error: You must log in to subscribe to an article');</script>";
	}
}

}

function session_header(){
	if(isset($_SESSION['email']))
{
echo "<h1 align='center'><b>Weclome to your account, </b>";
}
}

function session_email(){
	if(isset($_SESSION['email'])) echo $_SESSION['email'];
	}
	
	
	
	
function user_login(){
  	//IF
//execute submit button
//declare email variable
//declare password variable
//create object of user class
//Call login function from user class
//declare email and password
//END
global $conn;
if(isset($_POST['submit'])){
	  
	  
$email = $_POST['email'];
$password = $_POST['password'];
	
	  {
            try 
            {
                
                $query = $conn->prepare("SELECT * FROM xml_subscriber WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();
               
if($query->rowCount() > 0){
                    
if(password_verify($password, $data['password'])){
header ('Location: account.php');
session_start();
$_SESSION['email']=$email;
$session=$_SESSION['email'];
                        return true;
                    }else{
                         echo  "Invalid username or password";
                        return false;
                    }
                }else{
                    echo  "Please enter your email or password";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
			}
	  }
}
}



function channel() {
// echo stylesheet
//declare url as variable
//load xml file
//execute xml query
//echo div class
//for each xpath query
//echo xml query
//END	
	echo "<link rel='stylesheet' href='style/index.css'>";
	
	$url = 'http://unn-isrd1.newnumyspace.co.uk/xml-com/';
	$channelXML = simplexml_load_file($url);

$qry = '//channel[1]';

$channel = $channelXML->xpath($qry);

echo "<div class='channel'>";

foreach ($channelXML as $currentitem)
 {
	
	echo "<span>{$currentitem}</span>\n";
	echo "<br />\n";
	
}
	echo"</div>\n";
}





?>