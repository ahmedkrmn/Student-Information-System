<?php
	include_once("../models/grade.php");
	include_once("../controllers/common.php");
	Database::connect('school', 'root', '');
	$grade_id = safeGet('grade_id');
	$student_id = safeGet('student_id');
	$course_id = safeGet('course_id');
	$type = safeGet("type");
	$grade = new Grade($grade_id);
	$grade->delete();
	$id = ($type) ? $course_id : $student_id;	
	header('Location: ../grades.php?t='.$type."&id=".$id);
?>