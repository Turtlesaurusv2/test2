<?php

include('conn.php'); 
$mydb = new db(); // สร้าง object ใหม่ , class db()

$conn = $mydb->connect();
//รับค่า id จากหน้า name.php 
if(isset($_POST["id"])){
    $id = $_POST["id"];
    $resu = $conn->prepare("SELECT * FROM invoice_item   WHERE  invoice_id = $id LIMIT 0,1 ");
}

$resu->execute();
$row = $resu->fetch(PDO::FETCH_ASSOC);
$invoice_id =$row['invoice_id']??"";//กำหนดค่า invoice_id ถ้าไม่มีให้เป็นค่าว่าง

//มีข้อมูลใน invoice_item จะแสดงข้อมูล 
if($id == $invoice_id ){

	
	 echo  
     "description: " .$row['description'] ." <br>".
     "price: " . $row['price'] ."<br>".
     "vat: " . $row['vat'] ."<br>".
     "before_vat: " . $row['before_vat'] ."<br>".
     "total: " . $row['total'] ."<br>";
    }else{
        echo "ไม่มีข้อมูล";//ไม่มีข้อมูลใน  invoice_item
    }

?>