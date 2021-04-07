function minute(i){
    if(document.getElementById('quantity'+i).value>0){
        var n=document.getElementById('quantity'+i).value;
    n=parseInt(n)-1;

    document.getElementById('quantity'+i).value=n;
    document.getElementById('total'+i).innerHTML=document.getElementById('price'+i).value*document.getElementById('quantity'+i).value;
    }
    
}
function plus(i){
    var n=document.getElementById('quantity'+i).value;
    n=1+parseInt(n);

    document.getElementById('quantity'+i).value=n;
    document.getElementById('total'+i).innerHTML=document.getElementById('price'+i).value*document.getElementById('quantity'+i).value;
}