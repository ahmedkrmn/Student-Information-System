<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/student.php");
	include_once("../models/grade.php");
	include_once("../controllers/common.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id");
	$grades = Grade::all(0, $id);
	foreach ($grades as $grade){
		$grade->delete();
	}
	$student = new Student($id);
	$student->delete();
	echo json_encode(['status'=>1]);
?>