
doAjax();
function sendMess(message){
    console.log(message);
    $.ajax({
        type:'POST',
        data:{qr:message},
        url:'http://localhost/qrcode/qrweb/api.php',
        success: function(result){
            console.log(result);
            alert(result);
        }
        
    })
}
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
function callHis(){
    $.ajax({
        type:'POST',
        data:{},
        url:'./his.php',
        success: function(result){
            var obj = JSON.parse(result);
            var count = Object.size(obj) ;
            for(i=0;i<count;i++){
                var tr = document.createElement('TR');

                var tdStt = document.createElement("TD");
                var stt = document.createTextNode(i);
                tdStt.appendChild(stt);

                var tdName = document.createElement('TD');
                var name = document.createTextNode(obj[i].name);
                tdName.appendChild(name);

                var tdTime = document.createElement('TD');
                var time = document.createTextNode(obj[i].time);
                tdTime.appendChild(time);

                tr.appendChild(tdStt);
                tr.appendChild(tdName);
                tr.appendChild(tdTime);

                document.getElementById('tb').appendChild(tr);
            }
        }
        
    })
}
function history(){

    var conten = document.getElementById('content');
    conten.setAttribute('visibility','hidden');

    var vid = document.getElementById('preview');
    vid.setAttribute('width',0);
    vid.setAttribute('height',0);
    var tb = document.createElement('TABLE');
    tb.setAttribute('id','tb');
    tb.setAttribute('class','table table-striped');
    tb.setAttribute('border','1px');
    document.getElementById('history').appendChild(tb);

    var tr1 = document.createElement('TR');

    var z0 = document.createElement("TH");
    var t0 = document.createTextNode("STT");
    z0.appendChild(t0);

    var z = document.createElement("TH");
    var t = document.createTextNode("Name");
    z.appendChild(t);

    var z1 = document.createElement("TH");
    var t1 = document.createTextNode("Time");
    z1.appendChild(t1);

    var z2 = document.createElement("TH");
    var t2 = document.createTextNode("Action");
    z2.appendChild(t2);

    tr1.appendChild(z0);
    tr1.appendChild(z);
    tr1.appendChild(z1);
    tr1.appendChild(z2);


    tb.appendChild(tr1);
    callHis();

}
