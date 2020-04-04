<?php 
//Abstract Factory Design Pattern Integrate to easily work when we have work with many database table then we can use this design pattern
include "DB.php";
	abstract class main{
		protected $table;
		abstract public function insert();
		abstract public function update($id);
            //Select ID Only
        public function readById($id){
          $sql = "SELECT * FROM $this->table WHERE id=:id";
          $stmt = DB::prepare($sql);
          $stmt->bindParam(':id', $id);
          $stmt->execute();
             return $stmt->fetch();  
        }


          //Read ALl data from database

          public function readAll(){
          	$sql = "SELECT * FROM $this->table";
          	$stmt = DB::prepare($sql);
          	$stmt->execute();
          	return $stmt->fetchAll();
          }

        
          //Delete Query
        public function delete($id){
        
        	 $sql = "DELETE FROM $this->table WHERE id=:id";
        	    $stmt = DB::prepare($sql);
          		$stmt->bindParam(':id', $id);
          		 return $stmt->execute();
             
        }


}


	 ?>