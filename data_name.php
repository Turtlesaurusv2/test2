<?php

include('conn.php'); 
$mydb = new db(); // สร้าง object ใหม่ , class db()

$conn = $mydb->connect();
//รับค่า Query จากหน้า index.php 
if(isset($_POST["id"])){
    $id = $_POST["id"];
    $resu = $conn->prepare("SELECT * FROM invoice_item   WHERE  invoice_id = $id LIMIT 0,1 ");
}
$resu->execute();
$response = [];
while($row = $resu->fetch(PDO::FETCH_ASSOC))
{
	
	 echo  
    "ราคา  " . $row['price'] ." <br> invoice_id <br> invoice_item   ".$row['invoice_id']." = invoice".$id ;

} 
?>