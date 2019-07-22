<?php
session_start();
include('connection.php');

$newnote=$_POST["newnote"];
$username=$_SESSION['username'];
$username=mysqli_real_escape_string($link,$username);
$newnote=mysqli_real_escape_string($link,$newnote);
$sql="INSERT INTO mynotes (user_name,notes) VALUES ('$username' ,'$newnote')";
$result=mysqli_query($link,$sql);
  if(!result){
    echo '<div class="alert alert-danger">Error inserting into database!</div>';
exit;
}  


//$sql="SELECT notes FROM mynotes WHERE user_name='$username'";
//$result=mysqli_query($link,$sql);
//  if(!result){
//    echo '<div class="alert alert-danger">Error inserting into database!</div>';
//exit;
//}  
//$row=mysqli_fetch_array($result,MYSQLI_NUM);
//echo $row[0];
?>