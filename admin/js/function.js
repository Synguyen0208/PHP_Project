function change(k){
    product = JSON.parse(localStorage.getItem('listProduct'));
    for(var i in product){
        if(product[i]['id']==k){
            document.getElementById('name').value=product[i]['name'];
            document.getElementById('idd').value=product[i]['id'];
            document.getElementById('title').value=product[i]['title'];
            document.getElementById('price').value=product[i]['price'];
            document.getElementById('discount').value=product[i]['discount'];
            document.getElementById('quantity').value=product[i]['quantity'];
            document.getElementById('imgadd').value=product[i]['image'];
            document.getElementById('imgadd').src=product[i]['image'];
            
            document.getElementById('MFG').value=product[i]['MFG'];
            document.getElementById('ED').value=product[i]['ED'];
            document.getElementById('mass').value=product[i]['mass'];

            var e = document.getElementById("industry");
            var strUser = e.options[e.selectedIndex].value=product[i]['industry'];
            var e = document.getElementById("company");
            var strUser = e.options[e.selectedIndex].value=product[i]['company'];
        }
    }
    
}
function myFunction(){
    var e = document.getElementById("industry");
    var data = e.value;
    if(data=="Other"){
        document.getElementById("input-industry").innerHTML="<label for=''>Nhập ngành sản phẩm</label><br><input type='text' name='name-industry' placeholder='Nhập ngành sả phẩm' required><br>";
    }
    else
    document.getElementById("input-industry").innerHTML="";
}
function myFunction1(){
    var e = document.getElementById("company");
    var data = e.value;
    if(data=="Other"){
        document.getElementById("input-company").innerHTML="<label for=''>Nhập tên công ty</label><br><input type='text' name='name-company' placeholder='Nhập tên công ty' required><br><label for=''>Nhập địa chỉ công ty</label><br><input type='text' name='address-company' placeholder='Nhập địa chỉ công ty' required><br><label for=''>Giám đốc công ty</label><br><input type='text' name='manager-company' placeholder='Nhập giám đốc công ty' required><br><label for=''>Mã số thuế</label><br><input type='text' name='license-number' placeholder='Mã số thuế' required><br>";
    }
    else
    document.getElementById("input-company").innerHTML="";
}