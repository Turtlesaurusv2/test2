<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css">

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
   //ส่งข้อมูล ไปยัง name.php เพื่อหาข้อมูลใน database
  $.ajax({
   url:"name.php",
   method:"POST",
   data:{query:query},
   //รับค่า result จาก name.php กลับมาแสดง
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 //สร้าง function รับค่า input
 $('#search_text').keyup(function(){
  var search = $(this).val();
   if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});




</script>
<style>
    td,th{
        border : 2px solid ;
        text-align: center;
        padding: 8px;
        
    }
    </style>


</head>
<body>
</br>
<div class="container">

            
            <input type="text" name="search_text" id="search_text" placeholder="Search " />
          
        
		 
		

	  
		
		
		
				<table  id="main">
				<thead>
				  <tr>
					<th>ชื่อ</th>
					<th>ข้อมูลเพิ่มเติม</th>
				  </tr>
				</thead>
				
				

				<tbody id="result">
					
				</tbody>
				</table>
			
		
		
</div>

</body>
</html>