<?php
	$new_url = $_POST["url_sent"];
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
		//this query inserts into table the original url
		 $sql = "INSERT into url_table (url_input) values('$new_url')";
		 $result = mysql_query($sql);
		 //this retrives id of the inserted url
		 $sql = "SELECT id from url_table where url_input = '$new_url'";
		 $result = mysql_query($sql);
		 while ($row = mysql_fetch_assoc($result)) 
		 {
		    $id = $row['id'];
		 }
		 //this converts base 10 id into base 36 id
		 $output .= base_convert($id, 10, 36);
		 //this puts the converted base_url into the corresponding entry in the table
		 $sql = "UPDATE url_table set base_url = '$output' where id = $id";
		 $result = mysql_query($sql);
		 //this sends the shortened url back to abc.html
		 echo "localhost/?p=" . $output;
	}
	mysql_close($link);
?>