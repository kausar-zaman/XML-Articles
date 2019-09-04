<?php

// Include user class file
include_once "classes/connect.php";

//Include functions file
include_once "classes/functions.php";

////Include header
doheader();
user_login();	
 
?>  


<html>


   
   <head>
      <title>Article Exchange</title>
        <link rel="stylesheet" type="text/css" href="style/login.css" />
        <link rel="stylesheet" type="text/css" href="style/w3.css" />
   </head>
   
   <body>
   <!--
   Login Form
   output email text field
   output password text field
   output submit button
   -->
   
      
<form method="post" action="login.php">
		<div class="input-group">
	      <h2><strong>Email</strong></h2>
			<input type="text" name="email"/>
	  </h2>
	  </div>
        <br>
		<div class="input-group">
			<h2><strong>Password</strong></h2>
			<input type="password" name="password"/>
		</h2>
		</div>
		<div class="input-group">
		  <button type="submit" class="submit" name="submit">Login</button>
		
        <br/>

    </div></form>
   </body>
   
 
</html>
<?php
// Include footer file
dofooter();
?>  