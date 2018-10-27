<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php
	include_once("../controllers/common.php");
	include_once("../models/grade.php");
	Database::connect('school', 'root', '');
	$grade_id = safeGet('grade_id');
	$student_id = safeGet('student_id');
	$course_id = safeGet('course_id');
	$course_grade = safeGet("grade");
	$grade_date = safeGet("date");
	$type = safeGet("type");
	// echo $grade_id."\n";
	// echo $student_id."\n";
	// echo $course_id."\n";
	// echo $course_grade."\n";
	// echo $grade_date."\n";
	// echo $type."\n";
	if($grade_id==0) {
		Grade::add($student_id, $course_id, $course_grade, $grade_date);
	} else {
		$grade = new grade($grade_id);
		$grade->degree = $course_grade;
		$grade->examine_at = $grade_date;
		$grade->save();
	}
	$id = ($type) ? $course_id : $student_id;
	header('Location: ../grades.php?t='.$type.'&id='.$id);
?>