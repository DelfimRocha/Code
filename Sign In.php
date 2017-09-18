<? php
   $con = mysqli_connect("%","clients","client1234","MariaDB");
   
   
   $Email = $_POST["Email"];
   $Password = $_POST["Password"];
   
   $statement = mtsqli_prepare($con, "SELECT * FROM details WHERE Email = ? AND Password = ?");
   mysqli_stmt_bind_param($statement, "ss", $Email, $Password);
   mysqli_stmt_execute($statement);
   
   mysqli_stmt_store_result($statement);
   mysqli_stmt_bind_result($statement,$FullName, $Email, $Password, $RePassword);
   
   $response = array();
   $response["success"] = false;
   
   while(mysqli_stmt_fetch($statement)){
	   $response["success"] = true;
	   $response["FullName"] = $FullName;
	   $response["Email"] = $Email;
	   $response["Password"] = $Password;
	   $response["RePassword"] = $RePassword;
   }
   echo json_encode($response);
?>