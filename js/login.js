$(function(){
    $('#jumb2').show()
    $('#jumb1').hide()
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
            url:'php/signup.php',
            type:'POST',
            data:datatopost,
            success:function(data){
                    if(data){
                        $('#signupmessage').html(data)
                    }
            },
            error:function(){
                $('#signupmessage').html("<div class='alert alert-danger'>There was an error with Ajax call. Please try again later.</div>")
            },
            
        })
    })
    
})
