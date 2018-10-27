<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php 
	include_once("./controllers/common.php");
	include_once('./components/headstudents.php');
	include_once('./models/student.php');
	$id = safeGet('id');
	Database::connect('school', 'root', '');
	$student = new Student($id);
?>

    <h2 class="mt-4"><?=($id)?"Edit":"Add"?> Student</h2>

    <form action="controllers/savestudent.php" method="post">
    	<input type="hidden" name="id" value="<?=$student->get('id')?>">
		<div class="card">
  			<div class="card-body">
				<div class="form-group row gutters">
					<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="name" value="<?=$student->get('name')?>" required>
					</div>
				</div>		    	
		    	<div class="form-group">
		    		<button class="button float-right" type="submit"><?=($id)?"Edit":"Add"?></button>
		    	</div>
		</div>
    </form>

<?php include_once('./components/tail.php') ?>