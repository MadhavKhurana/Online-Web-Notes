<?php

session_start();
include('connection.php');
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/start/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <title>THANK YOU</title>
</head>
<BODY>
    <div class="container" align='center' id="resettext">
    THANK YOU, YOU PASSWORD HAS BEEN RESET
        
        <?php
        $email=$_SESSION['email'];
        $newpass=$_POST['newpassword'];
        echo $newpass;
        echo $email;
        $newpass=hash('sha256',$newpass);
        
        $email = mysqli_real_escape_string($link, $email);
$newpass = mysqli_real_escape_string($link, $newpass);
        echo $newpass;
        
        
    //Run query: set activation field to "activated" for the provided email
$sql = "UPDATE USERS SET password='$newpass' WHERE (email='$email') LIMIT 1";
$result = mysqli_query($link, $sql);
        mysqli_query($link, $sql); 
$result = mysqli_query($link, $sql);
    if(!result){
        echo '<div class="alert alert-danger">Error running query 2!</div>';
    }else{
        echo '<br><br>UPLOADED';
    }
        ?>
    </div>
</BODY>
</html>