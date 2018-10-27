<?php 
	include_once("./controllers/common.php");
	include_once('./components/headhome.php');
	include_once('./models/grade.php');
	$grade_id = safeGet('grade_id');
	$student_id = safeGet('student_id');
	$course_id = safeGet('course_id');
	$type = safeGet("type");
	Database::connect('school', 'root', '');
	$grade = new Grade($grade_id);
	$course_grade = ($grade_id==0) ? "." : $grade->get('degree');
	$course_date = ($grade_id==0) ? "." : $grade->get('examine_at');
?>

    <h2 class="mt-4"><?=($grade_id)? "Edit" : "Add"?> grade</h2>

    <form action="controllers/savegrade.php" method="post">
    	<input type="hidden" name="grade_id" value="<?=$grade_id?>">
    	<input type="hidden" name="student_id" value="<?=$student_id?>">
    	<input type="hidden" name="course_id" value="<?=$course_id?>">
    	<input type="hidden" name="type" value="<?=$type?>">
		<div class="card">
  			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Grade</label>
					<div class="col-sm-10">
						<input class="form-control" type="number" name="grade" value="<?=$course_grade?>" required>
					</div>
					<br>
					<br>
					<label for="inputEmail3" class="col-sm-2 col-form-label">Examination Date</label>
					<div class="col-sm-10">
						<input class="form-control" type="date" name="date" value="<?=$course_date?>" required>
					</div>
					
			</div>		    	
		    	<div class="form-group">
		    		<button class="button float-right" type="submit"><?=($grade_id)? "Edit" : "Add"?></button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>