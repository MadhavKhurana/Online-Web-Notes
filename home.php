<?php
session_start();
include('connection.php');
if(!isset($_SESSION['id'])){
    header("location: index.php");
}
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
  <link rel="stylesheet" type="text/css" href="css/home.css">
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
        <li ><a id="white" href="profile.php">Profile</a></li>
        <li><a href="#" id="white">Help</a></li>
        <li><a href="#" id="white">Contact Us</a></li>
          <li class="active" id="white"><a id="active"  href="#" id="white">My Notes</a></li>
        	
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"  id="white" class="signup"> Logged in as <b><?php
           echo $_SESSION['username']; 
            ?></b></a></li>
        <li><a href="index.php?logout=1"  id="white" class="login"> Logout</a></li>
      </ul>
    </div>
  </div>
</nav> 
    
    
    
    
    <div class="bg">


   <div class="container">
       <div align='center'>
<!--       <div class="col-lg-6">-->
      <button class="btn btn-lg btn-info" id='addnote'>Add Note</button>
<!--       </div>-->        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--       <div class="col-lg-6">-->
      <button class="btn btn-lg btn-info" id="editbtn">Edit</button>
           <form id="notes" name="notes" method="post">
<!--       </div>-->
           <div class="jumbotron">
               <div align='right'><button class="btn btn-lg btn-success" id="editbtn">Done</button></div>
               <div id="notemessage"></div>
               <div id="deletemessage"></div>
               
               <p id='allnotess'><?php
                   $username=$_SESSION['username'];
                   $sql="DELETE FROM mynotes WHERE notes=''";
                   mysqli_query($link,$sql);
                   $sql="SELECT * FROM mynotes WHERE user_name='$username' ORDER BY id DESC";
                   
$result=mysqli_query($link,$sql);
  if(!$result){
    echo '<div class="alert alert-danger">Error inserting into database!</div>';
exit;
      
}  
             
         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
             
             $note=$row['notes'];
             $ids=$row['id'];
             if(mysqli_num_rows($result)>0){
             echo '<br><input type="button" align="left" id="noteedit" class="btn btn-default" align="left" value="'.$note.'"><button id="'.$ids.'" class="btn btn-lg btn-danger">Delete</button><div id="'.$ids.'"></div>';}
             else{
                 echo '<p class="jumtext">You have not added any notes yet</p>';
             }
         }
                   

                   
                   
                   ?></p>
               <p id='textarea'><textarea id="newnote" name="newnote" rows="5" cols="25"></textarea></p><p id="update"><input class="btn btn-lg btn-info" id="save" type="submit" name="save" value='Save'></p>
               
           
           </div>
           </form>
       </div>
    </div>
    

       

       
        
    </div>
        
        
               
    
  
<!--  <div class="panel-footer">Made By: Madhav Khurana</div>-->
<script src="js/home.js"></script>
</body>
</html>