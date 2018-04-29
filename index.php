
<?php
$ch = curl_init();   //Debugbreak();

curl_setopt($ch, CURLOPT_URL, 'https://api.coursera.org/api/courses.v1');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$contents = curl_exec($ch);

$contents = json_decode($contents);

//print_r($contents);

if(empty($contents->elements)){
   echo "No Response from API"; 
   return;
} 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
</head>
<form action="view.php" method="get">
<input type="submit" value="view">
</form>
<table id="courseTable" class="display" style="width:100%">
<thead>
<tr>
    <th>S.N</th> <th>Course Id</th><th>Course Name</th><th>Course Type</th><th>Option</th>
</tr>
 </thead>
        <tbody>
<?php 
foreach($contents->elements as $key=>$course){
$rowNum = $key+1 ?>
<tr>
        <td><?php echo $rowNum?></td><td><?php echo $course->id ?></td><td><?php echo $course->name ?></td><td><?php echo $course->courseType ?></td>
        <td><input type="button" id = 'save_btn_<?php echo $rowNum?>' class = "save_btn" row = '<?php echo $rowNum?>' value="Save">
        <input type="hidden" value="<?php echo $course->id ?>" id="courseid_<?php echo $rowNum ?>">
        <input type="hidden" value="<?php echo $course->name ?>" id="coursename_<?php echo $rowNum ?>">
        <input type="hidden" value="<?php echo $course->courseType ?>" id="coursetype_<?php echo $rowNum ?>">
        <span id = "result_<?php echo $rowNum?>"></span>
        </td>
    </tr>   
	
<?php } ?> 
</tbody>
</table>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#courseTable').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
$('.save_btn').on('click',function(){
   var rowNum = $(this).attr("row");
   var courseType =  $('#coursetype_'+rowNum).val()
   var courseId = $('#courseid_'+rowNum).val()
   var courseName = $('#coursename_'+rowNum).val()
   
   $("#save_btn_"+rowNum).hide();
   $("#result_"+rowNum).html("Please Wait");
    $.ajax(
    {
        url: "savecourse.php",
        type:"post",
        dataType:"json",
        data:"courseid="+courseId+"&coursename="+courseName+"&coursetype="+courseType, 
        success: function(result){
           if(result){
		   $("#result_"+rowNum).html("Success");}
			esle
			{
				$("#save_btn_"+rowNum).show();
				$("#result_"+rowNum).html("Not Able to update");
			}
        }
    })
});
</script>