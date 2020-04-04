<?php 
include "config.php";
class DB{
	private static $pdo;
	public static function connection(){
		if(!isset(self::$pdo)){
            try {

            	self::$pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME,DB_USER,DB_PASS);
            	
            } catch (PDOException $e) {
            	echo $e->getMessage();
            }

	     }
      return self::$pdo;

	}
	     //This prepare is not default define prepare its make by us for working on our project/ or understand how its works
	public static function prepare($sql){
       return self::connection()->prepare($sql);

	}

}

 ?>