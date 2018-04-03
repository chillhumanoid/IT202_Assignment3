<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>Jonathan Thorne Assignment 3</title>
		<link rel="stylesheet" type="text/css" href="">
	</head>
	<body>
		<div id ="container">
		<main id="middle">
       <form method="POST" action=''>
       <input type="submit" name="button1"  value="Display Table">
       <input type="submit" name="button2"  value="Hide Table">
       </form>
		
			<?php
        if(isset($_POST['button1'])){
				  $servername = "sql2.njit.edu";
				  $username = "jgt8";
				  $password = "4KdfXPr7r";
				  $dbname = "jgt8";

                // Create connection
				  $dbc = new mysqli($servername, $username, $password, $dbname);
                // Check connection
				  if ($dbc->connect_error) {
					  die("Connection failed: " . $dbc->connect_error);
				  }

				  $sql = "SELECT * FROM customers, reservations, supplies WHERE customers.ID = reservations.custID AND  reservations.eventType = supplies.eventType";
				  $result = $dbc->query($sql);

  				if ($result->num_rows > 0) {
	  			// output data of each row
		  			while($row = $result->fetch_assoc()) {
			  			echo "Name: " . $row["name"]. " - ID: " . $row["id"]. " - Email: " . $row["email"]. " - Space Reserved: " . $row["spaceReserved"]. " - Event Type: " . $row["eventType"]. " - Date: " 
              . $row["date"]. " - Supplies: " . $row["supplies"].
					  	"<br>";
					  }  
					  } else {
						  echo "0 results";
					  }
     
				  $dbc->close();
         }
			?>
		</main>
	</body>
</html>
	