<?php
session_start();

include('connection.php');
include('logout.php');

//$sql = "CREATE TABLE mynotes (
//id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//firstname VARCHAR(30) NOT NULL,
//lastname VARCHAR(30) NOT NULL,
//user_id INT(11) UNSIGNED ,
//email VARCHAR(50),
//reg_date TIMESTAMP
//)";
//mysqli_query($link, $sql);

if(isset($_SESSION['id'])){
    header("location: home.php");
}

//include('remember.php');
?>
<!DOCTYPE html>
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
	<title>Online Notes</title>
	
</head>
<body>
	
		 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" id="white" href="#">Online Notes</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"  id="white"><a id="active" href="#">Home</a></li>
        <li><a href="#" id="white">Help</a></li>
        <li><a href="#" id="white">Contact Us</a></li>
        	
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"  id="white" class="signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"  id="white" class="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav> 
    
    
    
    
    <div class="bg">


   <div class="container-fluid">
      <h1 >Online Notes App</h1>
       <p id="enotes">Your notes are with you wherever you go.</p>
       <p id="enotes" ><span id="enotess">Easy to use, protects all your notes</span></p>
       
    </div>
    <div align="center">
    <div class="jumbotron" id="jumb1"><div align='right'>
        <button class="btn btn-link btn-lg" id="cross"><span class="glyphicon glyphicon-remove"></span></button></div>
        <p id="jumtext">Sign up today and Start using our Online Notes App</p>
              
           <div id="signupmessage"></div>

        <form id='signupform' method="post" >
            
            <input type='text' id="username" name='username' placeholder="Username" class="form-control" >
            <input type='email' id="email" name='email' placeholder="Email Address" class="form-control">
            <input type='password' id="password" name='password' placeholder="Password" class="form-control">
            <input type='password' id="confirmpass" name='confirmpass' placeholder="Confirm Password" class="form-control">
            <input class="btn btn-success btn-lg" type="submit" name="submit" id="submit" value="Sign Up"> <span id="cancel" class="btn btn-default btn-lg">Cancel</span> 
        </form>
    

       
        
    </div>
        </div>
        <div align='center'>
            <div class="jumbotron" id="jumb2"><div align='right'>
                <button class="btn btn-link btn-lg" id="crosss"><span class="glyphicon glyphicon-remove"></span></button></div>  
<!--        <p id="jumtext">Login</p>-->
                <div id="loginmessage"></div>
                <form id="loginform" method="post" >
            <p id="jumtext">Login</p>
            
            <input type='email' id="loginemail" name='loginemail' placeholder="Email Address" class="form-control">
            <input type='password' id="loginpassword" name='loginpassword' placeholder="Password" class="form-control"><div align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input  type="checkbox" id="rememberme" name="rememberme" > REMEMBER ME<br></div><div id="forget" align='right'><a href="#">Forget Password?</a></div>
            <input class="btn btn-success btn-lg" type="submit" name="submit" id="submit" value="Login"> <span id="cancels" class="btn btn-default btn-lg">Cancel</span>
        </form>
                <form method="post" id="forgetform">
                    <p id="jumtext">Reset your Password</p>
                    <div id="forgetmessage"></div>
                    <input type="email" id="forgetemail" name="forgetemail" placeholder="Email Address" class="form-control"><br>
                    <input class="btn btn-success btn-lg" type="submit" name="submit" id="submit" value="Submit"> <span id="cancels" class="btn btn-default btn-lg">Cancel</span>
                </form>

                </div>
        </div>
</div>
    
 <div class="panel-group"> 
  <div class="panel-footer">Made By: Madhav Khurana</div></div>
<script src="js/script.js"></script>
</body>
</html>