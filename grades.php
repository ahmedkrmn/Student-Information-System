<?php 
	include_once("./controllers/common.php");
	include_once('./components/headhome.php');
	include_once('./models/grade.php');
	include_once('./models/student.php');
	include_once('./models/course.php');
	$type = safeGet('t');
	$id = safeGet('id');
	$variable = ($type)?"Course":"Student";
	Database::connect('school', 'root', '');
	$grades = Grade::all($type, $id);
	if($id == 0) header('Location: ./index.php');

?>

    <h2 class="mt-4"><?=$variable?> Grades</h2>
    <table class="table table-striped">
    	<thead>
	    	<tr>
	      		<th scope="col">ID</th>
	      		<th scope="col">Name</th>
	      		<th scope="col">Grade</th>
	      		<th scope="col">Examination date</th>
	      		<th scope="col"></th>
	      		<th scope="col"></th>
	    	</tr>
	  	</thead>
	  	<tbody>
<?php
	if($type){ 
		$students = Student::all(safeGet('keywords'));
		foreach ($students as $student) {
			$flag = False;
			foreach ($grades as $grade){
				if($grade->student_id == $student->id){
					$studentgrade = $grade;
					$flag = True;
					break;
				}
			}
			$studentdegree = ($flag) ? $studentgrade->degree : ".";
			$studentdate = ($flag) ? $studentgrade->examine_at : ".";
			$grade_id = ($flag) ? $studentgrade->id : 0;
			$student_id = $student->id;
			$course_id = $id;

	?>
	<tr>
		<td><?=$student->id?></td>
		<td><?=$student->name?></td>
		<td><?=$studentdegree?></td>
		<td><?=$studentdate?></td>
		<?php 
		if($flag){ ?>
			<td><button class="button edit_grade" grade_id="<?=$grade_id?>" student_id="<?=$student_id?>" course_id = "<?=$course_id?>" type="<?=$type?>">Edit grade</button></td>
			<td><button class="button delete_grade" grade_id="<?=$grade_id?>" student_id="<?=$student_id?>" course_id = "<?=$course_id?>" type="<?=$type?>">Delete grade</button></td>
		<?php }
		else{?>
			<td><button class="button edit_grade" grade_id="<?=$grade_id?>" student_id="<?=$student_id?>" course_id = "<?=$course_id?>" type="<?=$type?>">Add grade</button></td>
			<td></td>
	</tr>
	<?php }}} else{
		$courses = Course::all(safeGet('keywords'));
		foreach ($courses as $course){
			$flag = False;
			foreach($grades as $grade){
				if($grade->course_id == $course->id){
					$coursegrade = $grade;
					$flag = True;
					break;
				}
			}
			$studentdegree = ($flag) ? $coursegrade->degree : ".";
			$studentdate = ($flag) ? $coursegrade->examine_at : ".";
			$grade_id = ($flag) ? $coursegrade->id : 0;
			$student_id = $id;
			$course_id = $course->id;

	?>
	<tr>
		<td><?=$course->id?></td>
		<td><?=$course->name?></td>
		<td><?=$studentdegree?> / <?=$course->max_degree?></td>
		<td><?=$studentdate?></td>
		<?php
		if($flag){ ?>
			<td><button class="button edit_grade" grade_id="<?=$grade_id?>" student_id="<?=$student_id?>" course_id = "<?=$course_id?>" type="<?=$type?>">Edit grade</button></td>
			<td><button class="button delete_grade" grade_id="<?=$grade_id?>" student_id="<?=$student_id?>" course_id = "<?=$course_id?>" type="<?=$type?>">Delete grade</button></td>
		<?php }
		else{?>
			<td><button class="button edit_grade" grade_id="<?=$grade_id?>" student_id="<?=$student_id?>" course_id = "<?=$course_id?>" type="<?=$type?>">Add grade</button></td>
			<td></td>
	</tr>
	<?php }}} ?>
	</tbody>
	</table>

<?php include_once('./components/tail.php') ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.edit_grade').click(function(event) {
			window.location.href = "editgrade.php?grade_id=" + $(this).attr('grade_id') + "&student_id=" + $(this).attr('student_id') + "&course_id=" + $(this).attr('course_id') + "&type=" + $(this).attr('type');
		});
		$('.delete_grade').click(function(event) {
			var r = confirm("Are you sure you want to delete this grade?");
			if (r === false) return false;
			window.location.href = "./controllers/deletegrade.php?grade_id=" + $(this).attr('grade_id') + "&student_id=" + $(this).attr('student_id') + "&course_id=" + $(this).attr('course_id') + "&type=" + $(this).attr('type');
		});
	});
</script>