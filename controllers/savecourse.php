<?php
	include_once("../controllers/common.php");
	include_once("../models/course.php");
	Database::connect('school', 'root', '');
	$id = safeGet("id", 0);
	if($id==0) {
		Course::add(safeGet("name"), safeGet("maxdegree"), safeGet("studyyear"));
	} else {
		$course = new course($id);
		$course->name = safeGet("name");
		$course->max_degree = safeGet("maxdegree");
		$course->study_year = safeGet("studyyear");
		$course->save();
	}
	header('Location: ../courses.php');
?>