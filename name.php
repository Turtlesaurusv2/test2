<?php

include('conn.php'); 
$mydb = new db(); // สร้าง object ใหม่ , class db()

$conn = $mydb->connect();
//รับค่า Query จากหน้า index.php 
if(isset($_POST["query"]))
{
// ค้นหาข้อมูลใน database ที่ตรงกับ input 
$q = $_POST["query"];
	
$results = $conn->prepare("SELECT * FROM invoice WHERE email LIKE '%" . $q . "%'
OR name LIKE '%".$q."%'
OR title LIKE '%".$q."%'
OR address LIKE '%".$q."%'
OR organization LIKE '%".$q."%'
OR company_format LIKE '%".$q."%'
OR branch LIKE '%".$q."%'
LIMIT 0,50
");


}
else
{
 //ถ้าไม่ได้ input  จะแสดงข้อมูล ใน datadase
 $results = $conn->prepare("SELECT * FROM invoice  LIMIT 0,50 ");

}
//แสดงข้อมูล column database
$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
	
	 echo '<tr>' . 
    "<td >" . $row['name'] . '</td>' .
	'<td>' ."<button onclick='send(".$row['invoice_id'].");'type='button'  name='butsave' id='show' >เพิ่มเติม</button>". '</td>' .
	'</tr>';

} 

json_encode( $results );
?>
<script>

function send(id){

            // ajax

            $.ajax({
                url: "data_name.php",
                type: "POST",
				data: 'id='+id,
             
              
				success:function(data)
   {
    $('#resu').html(data);
   }
                  });
                
              }
 

</script>
 