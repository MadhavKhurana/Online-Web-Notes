$(document).ready(function() {
    $('#jumb2').hide()
    $('#jumb1').hide()
    $('#forgetform').hide()
    $('#forget').click(function(){
       $('#loginform').hide();
       $('#forgetform').show();
        
    })
    $('.signup').click(function(){
        $('#jumb2').hide()
        $('#jumb1').show()
    })
    $('#cross').click(function(){
        $('#jumb1').hide() 
    })
    $('#cancel').click(function(){
        $('#jumb1').hide() 
    })
    $('.login').click(function(){
        $('#jumb1').hide()
        $('#jumb2').show()
        $('#crosss').click(function(){
        $('#jumb2').hide() 
            $('#forgetform').hide()
            $('#loginform').show();
    })
        $('#cancels').click(function(){
        $('#jumb2').hide()
            
    })
    })
    
    //ajax call for signup
    //once form is submitted
    $('#signupform').submit(function(event){
        //prevent default php functioning
        event.preventDefault()
        //collect user inputs
        var datatopost=$(this).serializeArray();
        console.log(datatopost);
        //send data to signup.php using ajax
        $.ajax({
            url:'signup.php',
            type:'POST',
            data: datatopost,
            success:function(data){
                    if(data){
                        $('#signupmessage').html(data)
                        
                        console.log('passss');
                    }
            },
            error:function(){
                $('#signupmessage').html("<div class='alert alert-danger'>There was an error with Ajax call. Please try again later.</div>")
            }
            
        })
    })
    
    
    $('#loginform').submit(function(event){
        //prevent default php functioning
        event.preventDefault()
        //collect user inputs
        var datatoposts=$(this).serializeArray();
        console.log(datatoposts);
        //send data to signup.php using ajax
        $.ajax({
            url:'login.php',
            type:'POST',
            data: datatoposts,
            success:function(data){
                        if(data == "success"){
                           window.location='home.php'; 
                           console.log('successss');               
                    }else{
                        $('#loginmessage').html(data)
                        console.log('faill');
                        
                    }
            },
            error:function(){
                $('#loginmessage').html("<div class='alert alert-danger'>There was an error with Ajax call. Please try again later.</div>")
            }
            
        })
    })

    
    $('#forgetform').submit(function(event){
        //prevent default php functioning
        event.preventDefault()
        //collect user inputs
        var datatopost=$(this).serializeArray();
        console.log(datatopost);
        //send data to signup.php using ajax
        $.ajax({
            url:'forget.php',
            type:'POST',
            data: datatopost,
            success:function(data){
                    if(data){
                        $('#forgetmessage').html(data)
                        
                        console.log('passss');
                    }
            },
            error:function(){
                $('#forgetmessage').html("<div class='alert alert-danger'>There was an error with Ajax call. Please try again later.</div>")
            }
            
        })
    })
//    $('#newpassform').submit(function(event){
//        event.preventDefault();
//        $.ajax({
//            url:'passset.php',
//            type: 'POST',
//        })
//        
//    })
    
    
})


