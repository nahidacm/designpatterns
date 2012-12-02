$(document).ready(function(){
    
    var snooze_count = 0;
   
   //Initially hide alarm clock, and disable the buttons
    $("#alarm-clock").hide();
    $("#snooze,#close").attr('disabled','disabled');
   
   //trigger reminder for first time, after  3000 ms
    var myVar=setInterval(function(){
        $("#alarm-clock").show();
        $("#snooze,#close").removeAttr('disabled');
        
        clearInterval(myVar);
    },3000);
   
    $("#snooze").click(function(){
       
        snooze_count++;
       
        $.post('ajax-handler.php', {
            action:'snooze',
            snooze_count:snooze_count
        }, 
        function(data){
 
            if($.trim(data) == 'close'){
              
                $("#alarm-clock").hide();
                $("#snooze,#close").attr('disabled','disabled');
            }else{
                $("#alarm-clock").slideUp(300).delay(1500).fadeIn(400); 
            }
        })
    });
   
   
    $("#close").click(function(){
       
        snooze_count++;
       
        $.post('ajax-handler.php', {
            action:'close'
        }, 
        function(data){
 
            if($.trim(data) == 'close'){
              
                $("#alarm-clock").hide();
                $("#snooze,#close").attr('disabled','disabled');
            }else{
                $("#alarm-clock").slideUp(300).delay(1500).fadeIn(400); 
            }
        })
    });
   
});