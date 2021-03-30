function change(k){
    product = JSON.parse(localStorage.getItem('listProduct'));
    for(var i in product){
        if(product[i]['id']==k){
            document.getElementById('name').value=product[i]['name'];
            document.getElementById('imgAdd').value=product[i]['image'];
            document.getElementById('id').value=product[i]['id'];
            document.getElementById('title').value=product[i]['title'];
            document.getElementById('price').value=product[i]['price'];
            document.getElementById('discount').value=product[i]['discount'];
            document.getElementById('quan').value=product[i]['quantity'];
            document.getElementById('img').src=product[i]['image'];
            
            var e = document.getElementById("category");
            var strUser = e.options[e.selectedIndex].value=product[i]['category'];
        }
    }
    
}
function myFunction(){
    var e = document.getElementById("industry");
    var data = e.value;
    if(data=="Other"){
        document.getElementById("input-industry").style.display="block";
    }
    else
    document.getElementById("input-industry").style.display="none";
}
function myFunction1(){
    var e = document.getElementById("company");
    var data = e.value;
    if(data=="Other"){
        document.getElementById("input-company").style.display="block";
    }
    else
    document.getElementById("input-company").style.display="none";
}