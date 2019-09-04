<?php

// start SESSION
session_start();


// Include functions file
// if SESSION
// print SESSION header
// else
// print non-session header

include "classes/functions.php";
include "classes/connect.php";
if(isset($_SESSION['email']))
{
loggedHeader(); 

} else {
	doheader();
}

// Include functions file
// print slidehow
slideshow();

include "classes/connect.php";

subscribe();

?>


<html>
   
   <head>
      <title>Article Exchange - Home Page</title>
      <link rel="stylesheet" type="text/css" href="style/index.css" />
      
        <script src="js/slideshow.js"> </script>
        
   </head>
   
   <body>
   </body>
</html>

<?php
banner();

if(isset($_SESSION['email']))
{
	
titlesearch();
include "catsearch.php";

} else {
	channel();
echo "<p align='center'> To search and subscribe, sign in to Article Exchange</p>";
}

?>

<?php

//LOAD XML from URL
//if URL 
//load XML file
//else
//print file not found
//create table variable
//query to select elements from file
//load query using XPATH
//for each article
//print XML elements in table
//END

$url = 'http://unn-isrd1.newnumyspace.co.uk/xml-com/';

if ($url) {
	$channelXML = simplexml_load_file($url);
}
else {

	echo "URL not found";
	
}
$searchTable = "";


$qry = '//channel/item';

$channel = $channelXML->xpath($qry); 

?>



  <?php
  

foreach ($channel as $currentitem)
 {
$title=$currentitem->title;
$link=$currentitem->link;
$description=$currentitem->description;
$category=$currentitem->category;
	 
				?>

       <table width='100%' id='articles'>
  <tr>
      <th width='20%'>Title</th>
      <th width='6%'>Category</th>
      <th width='68%'>Description</th>
      <th width='10%'>Subscribe</th>
  </tr>
<div class="row">
  <div class="column" style="background-color:#aaa;">
			 <form name="articles" method="POST">
             
			<td><input type ="hidden" name="title" value="<?php echo "{$title}"; ?>"><?php echo "<a href=\"{$url}{$link}\">{$title}</a>"; ?><br></td>
         <input type ="hidden" name="link" value="<?php echo "{$link}"; ?>"><br>
			<td><input type ="hidden" name="category" value="<?php echo "{$category}"; ?>"><?php echo "{$category}"; ?><br></td>
				<td><input type ="hidden" name="description" value="<?php echo "{$description}";?>"><?php echo "{$description}";?><br></td>
             <td>   <input type="submit" value="Subscribe" name="Subscribe"/><br></td>
         <br>
         <br>
				</form>
                
</tr>
</div>
</div>


 
<?php } 
	
	
	?>
</table>



    
    



<?php

// print footer from functions
dofooter();
?>