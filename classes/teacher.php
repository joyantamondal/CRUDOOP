<?php 
include "main.php";
     class teacher extends main{
     	protected $table = 'tbl_teacher';
     	private $name;
     	private $dept;
     	private $age;
     	
        
        //This setter system will be helpfull for multiple and huge data call make easy to call
        public function setName($name){
        	$this->name = $name;
        }
        public function setDept($dept){
        	$this->dept = $dept;
        }
         public function setAge($age){
        	$this->age = $age;
        }
        //insert query here into a method
        public function insert(){
        	$sql= "INSERT INTO $this->table(name, dept, age) VALUES(:name, :dept, :age)";
        	$stmt = DB::prepare($sql);
        	$stmt->bindParam(':name', $this->name);
        	$stmt->bindParam(':dept', $this->dept);
        	$stmt->bindParam(':age', $this->age);
        	return $stmt->execute();
        }

        //update Code
        public function update($id){
        	$sql= "UPDATE $this->table SET name=:name, dept=:dept, age=:age WHERE id=:id";
        	$stmt = DB::prepare($sql);
        	$stmt->bindParam(':name', $this->name);
        	$stmt->bindParam(':dept', $this->dept);
        	$stmt->bindParam(':age', $this->age);
        	$stmt->bindParam(':id', $id);
        	return $stmt->execute();
        	
        }
        
      
        
     }



 ?>