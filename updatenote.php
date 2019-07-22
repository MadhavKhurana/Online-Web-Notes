<?php
session_start();
include('connection.php');
//echo 'lol ';
$id= $_POST['id'];
$note= $_POST['note'];
$sql="UPDATE mynotes SET notes='$note' WHERE id='$id'";
$result=mysqli_query($link,$sql);
if(!result){
                    echo'<div class="alert alert-danger">Error running query!</div>';
                    exit;
                }

?>