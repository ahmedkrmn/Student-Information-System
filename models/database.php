<!-- 
By: Ahmed Karaman
GitHub: https://github.com/ahmedkrmn
Date: 10-27-2018
-->
<?php
	class Database {
		protected static $db = null;
		
		public static function connect($database, $uid, $pwd) {
			if(!empty(Database::$db)) return;

			$dsn = "mysql:host=localhost;dbname=$database";
			
			try {
		   		Database::$db = new PDO($dsn, $uid, $pwd);
			} catch(PDOException $e){
		   		echo $e->getMessage();
			}
		}

		public function get($field) {
			if(isset($this->{$field}))
				return $this->{$field};
			return null;
		}
	}
?>