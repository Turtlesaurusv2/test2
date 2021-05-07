<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
  $(document).on('click', '.pagination_link', function(){
           var page = $(this).attr("id");
           load_data(page);
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


function send(id){

$.ajax({
url: "data_name.php",
type: "POST",
data: 'id='+id,//ค่า id ให้ตรงกับค่าที่ไปค้นหาค่า  invoice_id ใน invoice_item 
success:function(data){

  //กดเเสดงและซ่อนข้อมูลในส่วนรายละเอียด invoice_item 
var x = document.getElementById("invoiceBody"+id);
  if (x.style.display === "none") {
    x.style.display = "block";
    $("#invoiceBody"+id).html(data)
  } else {
    x.style.display = "none";
    
  }
}
});

}

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
          
         </div>
		 
		

	  
		
		
		
				<!-- <table  id="main">
				<thead>
				  <tr>
					<th>ชื่อ</th>
					<th></th>
				  </tr>
				</thead>
				
				

				<tbody id="result">
					
				</tbody>
				</table> -->
        
	</div>


	</div>
</div>

<div class="container">
              
                <div class="table-responsive" id="result">
                </div>
           </div>

</body>
</html>