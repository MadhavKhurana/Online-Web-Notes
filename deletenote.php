<?php
session_start();
include('connection.php');
$idss = $_POST['id'];

$sql="DELETE FROM mynotes WHERE id='$idss'";
$result=mysqli_query($link,$sql);

  if(!$result){
    echo '<div class="alert alert-danger">Error deleting notes!</div>';

  exit;    
}
?>