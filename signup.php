<?php
//start session
    session_start();
//    connect to database
    include('connection.php');  
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmpass=$_POST["confirmpass"];

//error messages
$missinguserName = '<p><strong>Please enter your Username!</strong></p>'; 
$missingEmail = '<p><strong>Please enter your email address!</strong></p>'; 
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>'; 
$missingpassword = '<p><strong>Please enter a Password!</strong></p>';
$missingconfirmpassword = '<p><strong>Please Re-enter your Password!</strong></p>';
$invalidconfirmpass='<p><strong>Password does not match </strong></p>';
        $invalidpass='<p><strong>Password should be greater than 8 characters!</strong></p>';
    
//    if($_POST["submit"]){
        if(empty($username)){
        $errors .= $missinguserName;  
            
    }else{
        $username = filter_var($username,FILTER_SANITIZE_STRING);   
    }
    if(empty($email)){
        $errors .= $missingEmail;   
    }else{
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors .=$invalidEmail;   
        }
    }
    if(empty($password)){
        $errors .= $missingpassword;
    }elseif(strlen($password)<8){    
            $errors .= $invalidpass;
        }else{
            $password = filter_var($password, FILTER_SANITIZE_STRING);
        }
    
    if(empty($confirmpass)){
        $errors .= $missingconfirmpassword;
    }else{
        $confirmpass = filter_var($confirmpass, FILTER_SANITIZE_STRING);
        if($password==$confirmpass){
            $confirmpass = filter_var($confirmpass, FILTER_SANITIZE_STRING);
        }else{
            $errors .= $invalidconfirmpass;
        }
    }
 
        //if there are any errors
    if($errors){
        //print error message
        $resultMessage = '<div align="left" class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
    }else{
        echo "";
    }
//        '<div class="alert alert-success">Thankyou</div>'

//         echo $resultMessage;
//    }
    
//prepare variables for queries
$username=mysqli_real_escape_string($link,$username);
$email=mysqli_real_escape_string($link,$email);
$password=mysqli_real_escape_string($link,$password);
//$password=md5($password);
$password=hash('sha256',$password);
//if username exists in database
$sql="SELECT * FROM USERS WHERE username= '$username'";
$result=mysqli_query($link,$sql); //running query
if(!$result){
    echo '<div class="alert alert-danger">Error running query 1!</div>';
exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">Username already taken.Choose another username or Login!</div>';
exit;
}

$sql="SELECT * FROM USERS WHERE email= '$email'";
$result=mysqli_query($link,$sql); //running query
if(!$result){
    echo '<div class="alert alert-danger">Error running query 2!</div>';
exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">Email address already taken.Choose another Email or Login!</div>';
exit;
}

//create activation key
$result=mysqli_query($link,$sql);
$activationkey=bin2hex(openssl_random_pseudo_bytes(16)); 

//insert details into database
//$sql="INSERT INTO MyGuests (firstname, lastname, email)
//VALUES ('John', 'Doe', 'john@example.com')";
//$sql="INSERT INTO USERS (username,password,email,activation) VALUES ('$username' ,'$password','$email','$activationkey')";


//mail to user
$message='Please click on link to activate your account: ';
$message.='http://webstarz.offyoucode.co.uk//activate.php?email='.urlencode($email)."&key=$activationkey";
//    if(!$errors){
//        $result=mysqli_query($link,$sql);
//   if(!result){
//    echo '<div class="alert alert-danger">Error inserting into database!</div>';
//exit;
//}
if(!$errors){
mail($email,'Confirm Your Registration',$message,'From: '.'madhavkhurana086@gmail.com');
if(mail($email,'Confirm Your Registration',$message,'From: '.'madhavkhurana086@gmail.com')){
    $sql="INSERT INTO USERS (username,password,email,activation) VALUES ('$username' ,'$password','$email','$activationkey')";
    if(!$errors){
        $result=mysqli_query($link,$sql);
   if(!result){
    echo '<div class="alert alert-danger">Error inserting into database!</div>';
exit;
}
    echo "<div class='alert alert-success'>Thank you for registering!. A conformation email has been sent to $email. Please click on link to activate your account.</div>";
      
}
}

}

//$sql="INSERT INTO users (username,password,email,activation) VALUES ('$username' ,'$password','$email','$activationkey')";
//madhavkhurana@webstarz.offyoucode.co.uk







    
    
    
    
    
    
    
    
    
    
    



    

    ?>    
