<?php 
	foreach($notes as $note){
 ?>
 
 	<div class="note">
	 	<h3><?= $note['title']; ?></h3>
	 	<form class="inline delete_form" action="/notes/delete_note" method="post"> 
	 		<input class="form-control" type="hidden" name="id" value=<?= $note['id']; ?>>
	 		<button class="btn btn-danger pull-right" type="submit">delete</button> 
	 	</form>

	 	<form class="update_form" action="/notes/update_note" method="post">
	 		<input type="hidden" name="id" value=<?= $note['id']; ?>>
		 	<textarea class="form-control description" name="description"><?= $note['description']; ?></textarea>

	 		

		</form>
	</div>
<?php 
	} 
?>