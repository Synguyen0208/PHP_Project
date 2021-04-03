<?php

class product{
    function product(){}
    function  insertData($name, $price, $discount, $title, $ED, $MFG, $image, $mass, $industry_id, $id_com, $quantity){
        $sql="insert into product(name, price, discount, title, ED, MFG, image, mass, industry_id, id_com, quantity)
        values('$name', $price, $discount, '$title', '$ED', '$MFG', '$image', $mass, $industry_id, $id_com, $quantity);";

        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function update($id, $name, $price, $discount, $title, $ED, $MGF, $image, $mass, $industry_id, $id_com, $quantity){
        $sql="Update product set name='$name', price=$price, discount=$discount, title='$title', ED='$ED', MFG='$MGF', image='$image', mass=$mass, industry_id=$industry_id, id_com=$id_com, quantity=$quantity where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
       
    }
    function delete($id){
        $sql="delete from product where id=$id";

        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function getData(){
        $sql="select*from product";
        $result=$GLOBALS['conn']->execute($sql);
        if($result)
        return $result;
        
    }
    function getFullData(){
        $sql="SELECT pro.id, pro.name,quantity, price, discount, title, ED, MFG, image, mass, industry, com.name as company FROM ((product pro INNER JOIN product_industry ind ON pro.industry_id=ind.id) INNER JOIN company com on pro.id_com=com.id)";
        $result=$GLOBALS['conn']->execute($sql);
        if($result)
        return $result;
        
    }
}

class company{
    private $name;
    private $address;
    private $manager;
    private $license_number;
    function __construct(){
    }

    function  insertData($name, $address, $manager, $license_number){
        $sql="insert into company(name, address, manager, license_number)
        values('$name', '$address', '$manager', '$license_number');";

        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function  update($id, $name, $address, $manager, $license_number){
        $sql="Update company set name='$name', address=$address, manager=$manager, license_number='$license_number' where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function delete($id){
        $sql="delete*from company where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function getData(){
        $sql="select*from company";
        $result=$GLOBALS['conn']->execute($sql);
        if($result)
        return $result;
    }
}

class customer{
    function  customer($name, $birthday, $gendder, $phone, $address){
        $sql="insert into customer(name, birthday, gendder, phone, address)
        values('$name', '$birthday', '$gendder', '$phone', '$address');";
        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function  update($id, $name, $birthday, $gendder, $phone, $address){
        $sql="Update customer set name='$name', address='$address', birthday='$birthday', phone='$phone', gendder='$gendder' where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function delete($id){
        $sql="delete*from customer where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function getData(){
        $sql="select*from customer";
        $result=$GLOBALS['conn']->execute($sql);
        if($result)
        return $result;
        
    }
}
class industry{
    function industry(){}
    public function insertData($name){
        $sql="insert into product_industry(industry)
        values('$name');";
    
        $result=$GLOBALS['conn']->execute($sql);
        
    }
    function  update($id, $name){
        $sql="Update product_industry set name='$name' where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
      
    }
    function delete($id){
        $sql="delete*from product_industry where id=$id";
        $result=$GLOBALS['conn']->execute($sql);
       
    }
    function deleteCom($id){
        $sql="delete*from product_industry where id=$id";
        $result=$GLOBALS['conn']->execute($sql);

    }
    function getData(){
        $sql="select*from product_industry";
        $result=$GLOBALS['conn']->execute($sql);
        if($result)
        return $result;
        
    }
}
?>