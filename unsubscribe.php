<?php

include "classes/connect.php";

//IF submit button execute
//output js alert box
//IF confirmed
//delete table row
//redirect to account page
//output js alert box
//END
//END

echo "<script>alert('Are you sure you want to unsubscribe?');</script>";

 $id=$_GET['id'];	
 $query = $conn->prepare('DELETE FROM xml_article WHERE articleID = :id');
$query->bindValue(':id', $id);
$query->execute();
	 header('Location: account.php');
     echo"You have unsubscribed to this article";  
 ?>

	
	
	