<?php
session_start();
include('connection.php');
    $email=$_POST['forgetemail'];
    echo $email;

$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
if(empty($email)){
        $errors .= $missingEmail;   
    }else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors .=$invalidEmail;   
        }
    }
if($errors){
        //print error message
        $resultMessage = '<div align="left" class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
    }else{
        //prepare variables for queries
    $email=mysqli_real_escape_string($link,$email);
    $sql="SELECT * FROM USERS WHERE email= '$email'";
    $result=mysqli_query($link,$sql); //running query
if(!$result){
    echo '<div class="alert alert-danger">Error running query 1!</div>';
exit;
}
     $count=mysqli_num_rows($result);
    if($count!==1){
        echo '<div class="alert alert-danger">Email Address not found!</div>';
    }else{
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['password']=$row['password'];
        
        
        
        $activationkey2=bin2hex(openssl_random_pseudo_bytes(16)); 

//mail to user
$message='Please click on link to reset your passwords: ';
$message.='http://webstarz.offyoucode.co.uk//newpassword.php?email='.urlencode($email)."&key=$activationkey2";
        
        mail($email,'RESET YOUR PASSWORD',$message,'From: '.'madhavkhurana086@gmail.com');
if(mail($email,'RESET YOUR PASSWORD',$message,'From: '.'madhavkhurana086@gmail.com')){
    echo 'THANKYOU';
    }
    echo "<div class='alert alert-success'>Thank you for registering!. A conformation email has been sent to $email. Please click on link to activate your account.</div>";

        
    }
    
    

    }
?>