<?php

// Include header file
include_once "classes/connect.php";

		@session_start();
            session_destroy();
         header('location:index.php');
?>

