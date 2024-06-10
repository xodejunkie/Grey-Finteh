$(document).ready(function(){
    $("#note").load("notification.php");
    $("#mesages").load("message.php");
    changes();
});

function changes(){
    setTimeout(() => {
        $("#note").load("notification.php");
        $("#mesages").load("message.php");
        changes();
        
    }, 10000);

}