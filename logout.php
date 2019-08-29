<?php
	session_start();
	unset($_SESSSION['member_permission']); // clear session
	session_destroy();
	header("location:index.php");
?>