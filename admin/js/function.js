var product;
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
            document.getElementById('image').value=product[i]['image'];
            document.getElementById('img').src=product[i]['image'];
            
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
function changeCom(k){
    company = JSON.parse(localStorage.getItem('listProduct'));
    for(var i in company){
        if(company[i]['id']==k){
            document.getElementById('id').value=company[i]['id'];
            document.getElementById('name').value=company[i]['name'];
            document.getElementById('address').value=company[i]['address'];
            document.getElementById('manager').value=company[i]['manager'];
            document.getElementById('license').value=company[i]['license_number'];
            document.getElementById('phone').value=company[i]['phone'];
            document.getElementById('email').value=company[i]['email'];
        }
    }
    
}
function setTrue(){
    document.getElementById('bool').value=confirm("Are you sure you want to delete this partner company?\nIf you delete this company, all data related to this company will be deleted!");
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
        document.getElementById("input-company").innerHTML="<label for=''>Nhập tên công ty</label><br><input type='text' name='name-company' placeholder='Nhập tên công ty' required><br><label for=''>Nhập địa chỉ công ty</label><br><input type='text' name='address-company' placeholder='Nhập địa chỉ công ty' required><br><label for=''>Giám đốc công ty</label><br><input type='text' name='manager-company' placeholder='Nhập giám đốc công ty' required><br><label for=''>Mã số thuế</label><br><input type='text' name='license-number' placeholder='Mã số thuế' required><br><label for=''>Phone</label><input type='phone' name='phone' id='' placeholder='Số điện thoại' required><br><label for=''>Email</label><br><input type='email' name='email' placeholder='Email'><br>";
    }
    else
    document.getElementById('input-company').innerHTML="";
}