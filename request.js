

function sendMess(message){
    console.log(message);
    $.ajax({
        type:'POST',
        data:{qr:message},
        url:'http://localhost/qrcode/api.php',
        success: function(result){
            console.log(result);
            alert(result);
        }
        
    })
}
