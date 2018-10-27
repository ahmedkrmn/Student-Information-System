<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php 
	include_once('./controllers/common.php');
	include_once('./components/headcourses.php');
	include_once('./models/course.php');
	include_once('./models/grade.php');

	Database::connect('school', 'root', '');
?>
	<div style="padding: 10px 0px 10px 0px; vertical-align: text-bottom;">
		<span style="font-size: 125%;">Courses</span>
		<button class="button float-right edit_course" id="0">Add Course</button>
	</div>

    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Average grade</th>
	      		<th scope="col">Study Year</th>
	      		<th scope="col"></th>
	      		<th scope="col"></th>
	      		<th scope="col"></th>

	    	</tr>
	  	</thead>
	  	<tbody>
		  	<?php	
				$courses = Course::all(safeGet('keywords'));
				foreach ($courses as $course) {
					$sum=0;
					$grades = Grade::all(1, $course->id);
					foreach($grades as $grade){
						$sum+=$grade->degree;
					}
				$average = (count($grades)) ? $sum/count($grades) : 0;
			?>
    		<tr>
    			<td><?=$course->id?></td>
    			<td><?=$course->name?></td>
    			<td><?=round($average,2)?> / <?=$course->max_degree?></td>
    			<td><?=$course->study_year?></td>
    			<td><button class="button view_grades" id="<?=$course->id?>">View detailed grades</button>&nbsp;
    			<td><button class="button edit_course" id="<?=$course->id?>">Edit course</button></td>
    			<td><button class="button delete_course" id="<?=$course->id?>">Delete course</button></td>

    		</tr>
    		<?php } ?>
    	</tbody>
    </table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.view_grades').click(function(event) {
			window.location.href = "grades.php?t=1&id="+$(this).attr('id');
		});

		$('.edit_course').click(function(event) {
			window.location.href = "editcourse.php?id="+$(this).attr('id');
		});
	
		$('.delete_course').click(function(){
			var r = confirm("Are you sure you want to delete this course?\nDeleting this course will also delete all of its grades.");
      	 	if (r === false) return false;
			var anchor = $(this);
			$.ajax({
				url: './controllers/deletecourse.php',
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