<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php
	header('Content-Type: application/json; charset=utf-8');
	// include_once("../models/database.php");
	include_once("../models/course.php");
	include_once("../models/grade.php");
	include_once("../controllers/common.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id");
	$grades = Grade::all(1, $id);
	foreach ($grades as $grade){
		$grade->delete();
	}
	$course = new Course($id);
	$course->delete();
	echo json_encode(['status'=>1]);
?>