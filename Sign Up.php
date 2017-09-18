<? php
    $con = mysqli_connect("%","clients","client1234","MariaDB");
   
   $FullName = $_POST["FullName"];
   $Email = $_POST["Email"];
   $Password = $_POST["Password"];
   $RePassword = $_POST["RePassword"];
   
   $statement = mysqli_prepare($con, "INSERT INTO details(FullName, Email, Password, RePassword) VALUES (?, ?, ?, ?)");
   mysqli_stmt_bind_param($statement, "ss", $FullName, $Email, $Password, $RePassword);
   mysqli_stmt_execute($statement);
   
   $response = array();
   $response ["success"] = true;
   echo json_encode($response);


?>