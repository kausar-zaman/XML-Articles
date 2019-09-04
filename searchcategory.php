<?php
// Include header file
include "classes/functions.php";
loggedHeader();

// Include connection file
include "classes/connect.php";

//Start session
//Declare subscribe ID as email from session
//Declare error message
//Output subscribe function
session_start();
$subscriberID = $_SESSION['email'];
$error_message = '';
subscribe();

?>

<html>
   <head>
      <title>Article Exchange - View Articles</title>
      <script src="search.js"> </script>
        <script src="slideshow.js"> </script>
        <link rel="stylesheet" href="style/table.css">
         <link rel="stylesheet" href="style/search.css">
   </head>
   
   <body>
   
<?php
//Output title search bar
//Output category search select bar from php page
//Output error message if any errors occur
titlesearch();
include "catsearch.php";
banner();
      if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>

<?php
// create an instance
$url = 'http://unn-isrd1.newnumyspace.co.uk/xml-com/';

if ($url) {
	$articleDoc = simplexml_load_file($url);
}
else {

	echo "File not found";

}

//make HTML table a variable
//IF
//submit button in form works
// set the query using the title
//IF 
//category search is empty
//output error message
//ELSE
//execute the xpath query from url
//Loop through all currentitems 
//declare articleitems as variable
//entered results into form
//output results from search
//END

$searchTable = "";
if (isset($_POST['submit'])){
  

        $catSearch = $_POST['catSearch'];
		
        if (empty($catSearch)) {
			
			echo "No articles found";
			} else {
            $query = "//channel/item[category[contains(text(),\"$catSearch\")]]";
$article = $articleDoc->xpath($query);
 $searchTable .= "<div class='articles'>\n";
		
      foreach ($article as $articleitem) 
        {
			$title=$articleitem->title;
			$link=$articleitem->link;
			$category=$articleitem->category;
			$description=$articleitem->description;
?>
			 <form name="articles" method="POST">
             
			<input type ="hidden" name="title" value="<?php echo "{$title}"; ?>"><?php echo "<a href=\"{$url}{$link}\">{$title}</a>"; ?><br>
         <input type ="hidden" name="link" value="<?php echo "{$link}"; ?>"><br>
			<input type ="hidden" name="category" value="<?php echo "{$category}"; ?>"><?php echo "{$category}"; ?><br>
				<input type ="hidden" name="description" value="<?php echo "{$description}";?>"><?php echo "{$description}";?><br>
                <input type="submit" value="Subscribe" name="Subscribe"/><br>
         <br>
         <br>
				</form>

<?php
        }
		?>
       
        </div>
   </body>
</html>

<?php }
//Include footer file
}
dofooter();
?>
