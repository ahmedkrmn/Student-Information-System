<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php
	include_once('database.php');

	class Grade extends Database{
		function __construct($id) {
			$sql = "SELECT * FROM grades WHERE id = $id;";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}

		public static function add($student_id, $course_id, $degree, $examine_at) {
			$sql = "INSERT INTO grades (student_id, course_id, degree, examine_at) VALUES (?, ?, ?, ?)";
			Database::$db->prepare($sql)->execute([$student_id, $course_id, $degree, $examine_at]);
		}
		
		public function delete() {
			$sql = "DELETE FROM grades WHERE id = $this->id;";
			Database::$db->query($sql);
		}

		public function save() {
			$sql = "UPDATE grades SET student_id = ?, course_id = ?, degree = ?, examine_at = ? WHERE id = ?;";
			Database::$db->prepare($sql)->execute([$this->student_id, $this->course_id, $this->degree, $this->examine_at, $this->id]);
		}

		public static function all($type, $id) {
			$sql = ($type)?"SELECT * FROM grades WHERE course_id LIKE ($id);" : "SELECT * FROM grades WHERE student_id LIKE ($id);";
			$statement = Database::$db->prepare($sql);
			$statement->execute();
			$grades = [];
			while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
				$grades[] = new grade($row['id']);
			}
			return $grades;
		}
	}
?>