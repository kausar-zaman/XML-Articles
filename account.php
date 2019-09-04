<?php

//Start session
//Declare subscribe ID as email from session
session_start();
$subscriberID = $_SESSION['email'];

// Include header file
include "classes/functions.php";
loggedHeader();

// Include conecction file
include "classes/connect.php";
?>

<html>
<head>
   <title>Article Exchange - My Account</title>
   <link rel="stylesheet" type="text/css" href="style/account.css" />
   </head>
   <body>
<div class="search-container">

</div>
<?php
session_header();

?>
<b><?php echo session_email();?></b></h1>
<img src="img/books.jpg" width="1024" height="370">
<h2 align="center"><b><u>List of your articles are posted below</u></b></h2>

<table width="100%" id="articles">
      <tr>
      <th width="2%">ID</th>
      <th width="30%">Title</th>
      <th width="4%">Category</th>
      <th width="58%">Description</th>
      <th width="10%">Subscribe</th>
    </tr>

<?php

//Declare xml file as variable
//Execute query

$url = 'http://unn-isrd1.newnumyspace.co.uk/xml-com/';
$query = $conn->prepare("SELECT title, link, category, body, articleID FROM xml_article WHERE subscriberID='$subscriberID'");
$query->execute();

?>

<?php while( $row = $query->fetch(PDO::FETCH_ASSOC) ) { ?>
<?php echo "<form action='account.php' method='post'>"; ?>
<td><?php echo $row['articleID']; ?></td>
<td><a href= "body.php?id=<?php echo "{$row['link']}\n";?>"><?php echo $row['title'];?></a></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['body']; ?></td>
<td><input type="button" onClick="unsub(<?php echo $row['articleID']; ?>)" name="Unsubscribe" value="Unsubscribe"></td>
</td>
</tr>

 <script src="js/unsubscribe.js"></script>


<?php } 
echo "</form> ";
	
	
	?>
</table>


   
   </body>
</html>

<?php

// Include footer file

dofooter();

?>