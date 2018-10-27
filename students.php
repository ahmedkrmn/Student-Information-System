<?php 
	include_once('./controllers/common.php');
	include_once('./components/headstudents.php');
	include_once('./models/student.php');
	Database::connect('school', 'root', '');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Students</span>
		<button class="button float-right edit_student" id="0">Add Student</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col"></th>
	      		<th scope="col"></th>
	      		<th scope="col"></th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$students = Student::all(safeGet('keywords'));
				foreach ($students as $student) {
			?>
    		<tr>
    			<td><?=$student->id?></td>
    			<td><?=$student->name?></td>
    			<td><button class="button view_grades" id="<?=$student->id?>">View student's grades</button><td>
    			<td><button class="button edit_student" id="<?=$student->id?>">Edit student name</button></td>
    			<td><button class="button delete_student" id="<?=$student->id?>">Delete student</button></td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_student').click(function(event) {
			window.location.href = "editstudent.php?id="+$(this).attr('id');
		});

		$('.view_grades').click(function(event) {
			window.location.href = "grades.php?t=0&id="+$(this).attr('id');
		});
	
		$('.delete_student').click(function(){
			var r = confirm("Are you sure you want to delete this student?\nDeleting this student will also delete all of his/her grades.");
      	 	if (r === false) return false;
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletestudent.php',
				type: 'GET',
				dataType: 'json',
				data: {id: anchor.attr('id')},
			})
			.done(function(reponse) {
				if(reponse.status==1) {
					anchor.closest('tr').fadeOut('slow', function() {
						$(this).remove();
					});
				}
			})
			.fail(function() {
				alert("Connection error.");
			})
		});
	});
</script>