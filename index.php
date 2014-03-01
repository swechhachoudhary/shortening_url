<?php
   $new_url = $_GET["p"];
   //this portion of code connects to database with username test with password test ,database is hosted on localhost name of database is new
   $username = "test";
	$password = "test";
	$hostname = "localhost"; 
	$db = "new";
	$output = "";
	$link = mysql_connect("$hostname", "$username", "$password") or die("Unable to connect to MySQL");
	mysql_select_db("$db") or die("cannot select DB");
	if (!$link) 
	{
   	 	die('Could not connect: ' . mysql_error());
	}
	else
	{
		//$sql contains the mysql query to fetch original url from base_url
		$sql = "SELECT url_input from url_table where base_url = '$new_url'";
		$result = mysql_query($sql);
		 while ($row = mysql_fetch_assoc($result)) 
		 {
		    $loc = $row['url_input'];
		 }
		 //this redirects to the original url
		 header("Location: "."$loc");
		 exit;
	}
?>