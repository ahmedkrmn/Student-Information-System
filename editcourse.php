<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php 
	include_once("./controllers/common.php");
	include_once('./components/headcourses.php');
	include_once('./models/course.php');
	$id = safeGet('id');
	Database::connect('school', 'root', '');
	$course = new Course($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> Course</h2>

    <form action="controllers/savecourse.php" method="post">
    	<input type="hidden" name="id" value="<?=$course->get('id')?>">
		<div class="card">
  			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="name" value="<?=$course->get('name')?>" required>
					</div>
					<br>
					<br>
					<label for="inputEmail3" class="col-sm-2 col-form-label">Max Grade</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="maxdegree" value="<?=$course->get('max_degree')?>" required>
					</div>
					<br>
					<br>
					<label for="inputEmail3" class="col-sm-2 col-form-label">Study Year</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="studyyear" value="<?=$course->get('study_year')?>" required>
					</div>
					
			</div>		    	
		    	<div class="form-group">
		    		<button class="button float-right" type="submit"><?=($id)?"Edit":"Add"?></button>
		    	</div>
		    </div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>