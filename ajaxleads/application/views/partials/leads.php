


 <table class="table-striped">
 	<tr>
 		<th>leads_id</th>
 		<th>first name</th>
 		<th>last name</th>
 		<th>registered datetime</th>
 		<th>email</th>
 	</tr>





  <?php 
 	$count=0;
 	$id=0;
 	$page=$data['page'];
 	$rowsperpage=5;
 	$pagenum=0;
 	// var_dump($data);

 	
 	for($i=$page*5;$i<$page*5+$rowsperpage&&$i<count($data)-1;$i++){

 		?>
 	<tr>
 		<td><?= $data[$i]['id']; ?></td>
 		<td><?= $data[$i]['first_name']; ?></td>
 		<td><?= $data[$i]['last_name']; ?></td>
 		<td><?= $data[$i]['registered_datetime']; ?></td>
 		<td><?= $data[$i]['email']; ?></td>
 	</tr>
 	

 <?php } ?>


 </table>


 <?php 
 	
	
	echo "<div id='pages'>";
	for($i=0;$i<count($data)-1;$i++){
 		if($i%$rowsperpage===0){
	 		echo "<a class='page' id='$pagenum'>".($pagenum+1)."</a>";
 			$pagenum++;
	 	}
 	}
 	echo "</div>";
 	 ?>