<?php
    
    $mysqli = new mysqli("localhost", "root", "", "makurdi");
	
	// Check connection
	if($mysqli === false){
		die("ERROR: Could not connect. " . $mysqli->connect_error);
	} else {
	 //Print host information
	 //echo "Connect Successfully. Host info: " . $mysqli->host_info;
	}