$(document).ready(function(){
    $('.btn-success').hide()
    $('.btn-danger').hide();
    $('#textarea').hide();
    $('#save').hide();
    $('#addnote').click(function(){
        $('.jumtext').hide();
        $('#textarea').show();
        $('#save').show();
        $('#noteedits').hide();
        $('.btn-default').hide();
        $('#editbtn').hide()
    })
    $('#save').click(function(){
        $('#textarea').hide();
    $('#save').hide();
        
        setTimeout(function(){ location.reload(); }, 500);
    })
    
    
    $('#notes').submit(function(event){
        event.preventDefault();
        var datatopost=$(this).serializeArray();
        console.log(datatopost);
        $.ajax({
            url:'addnote.php',
            type:'POST',
            data: datatopost,
            success:function(data){
                if(data){
                        $('#notemessage').html(data)
                        
                        console.log('passss');
                    }
            },
            error:function(){
                $('#notemessage').html("")
//                $('#notemessage').html("<div class='alert alert-danger'>There was an error withssssss Ajax call. Please try again later.</div>")
            }
            
        })
    })
    $('#editbtn').click(function(){
        $('.btn-danger').show()
        $('.btn-success').show()
    })
    $('.btn-success').click(function(){
        $('.btn-danger').hide()
        $('.btn-success').hide()
    })
    
    $('.btn-danger').click(function(){
        var deletebtn=$(this)
        $.ajax({
            url:'deletenote.php',
            type:'POST',
            data: {id:deletebtn.attr('id')},
            success:function(data){
                if(data){
                        $('#notemessage').html(data)
                        
                        console.log('passss');
                    }
            },
            error:function(){
                $('#deletemessage').html("")
//                $('#deletemessage').html("<div class='alert alert-danger'>There was an error with Ajax call. Please try again later.</div>")
            }
            
        })
//        location.reload();
    })
    $('.btn-danger').click(function(){
         setTimeout(function(){ location.reload(); }, 500);
    })
    
    $('.btn-default').click(function(){
        var deletebtn=$(this)
        var text=$(this).val()
       $('.jumtext').hide();
        $('#textarea').show();
        $('#newnote').val(text);
        $('#update').html('<input class="btn btn-lg btn-info" id="updates" type="button" name="updates" value="Update">')
        $('#noteedits').hide();
        $('.btn-default').hide();
        $('#editbtn').hide()
        $('#updates').click(function(){
            text=$('#newnote').val()
             $.ajax({
            url:'updatenote.php',
            type:'POST',
            data: {note:text,
                   id:deletebtn.next().attr('id')},
            success:function(data){
                if(data){
                        $('#deletemessage').html(data)
                        
                        console.log('passss');
                    }
            },
            error:function(){
                $('#deletemessage').html("")

            }
            
        })
            setTimeout(function(){ location.reload(); }, 500);
        })
//        $.ajax({
//            url:'updatenote.php',
//            type:'POST',
//            data: {note:$(this).val(),
//                   id:deletebtn.next().attr('id')},
//            success:function(data){
//                if(data){
//                        $('#deletemessage').html(data)
//                        
//                        console.log('passss');
//                    }
//            },
//            error:function(){
//                $('#deletemessage').html("")
//
//            }
//            
//        })
//        location.reload();
    })
    
})
    

//{
//  $('#addnote').click(function(){
//        $('.jumbtext').html("<textarea rows='4' cols='50'>tyghjbk</textarea>")
//    })
//});