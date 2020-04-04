<!-- <?php include "header.php" ?> -->
<link rel="stylesheet" type="text/css" href="header.php">
<?php 
    

 spl_autoload_register(function($class_name){
   include "classes/".$class_name.".php";
});
 ?>
 <?php 
 //create a object for get date from student class insert code
   $user = new teacher();
   if(isset($_POST['create'])){
       $name = $_POST['name'];
        $dept = $_POST['dept'];
         $age = $_POST['age'];
           
           $user->setName($name);
           $user->setDept($dept);
           $user->setAge($age);
    
    if($user->insert()){
    	echo "<span class='insert' style='text-align:center'> Registration Complete... </span>";
    }      
   }

//Update Code 
      if(isset($_POST['update'])){
      	$id = $_POST['id'];
       $name = $_POST['name'];
        $dept = $_POST['dept'];
         $age = $_POST['age'];
           
           $user->setName($name);
           $user->setDept($dept);
           $user->setAge($age);
    
    if($user->update($id)){
    	echo "<span class='insert' style='text-align:center'> Updated Successfully... </span>";
    }      
   }

  ?>
<!-- Delete Code -->
 <?php 
      if (isset($_GET['action']) && $_GET['action']=='delete') {
      	$id = $_GET['id'];
      	if($user->delete($id)){
      		echo "<span class='insert' style='text-align:center'> Deleted Successfully... </span>";
      	}
     
}


  ?>


 <!--  //update code -->
 <?php 
      if (isset($_GET['action']) && $_GET['action']=='update') {
      	$id = $_GET['id'];
      	$result = $user->readById($id);
     



  ?>
<section class="main"><p> CRUD WITH PDO <span style=" margin-left: auto; list-style: none;"><a href="index.php" style="text-decoration: none; color:#008CBA;font-size: 30px"><b>For Student</b></a> || <a href="indexTeacher.php" style="text-decoration: none; color:#008CBA;font-size: 30px"><b>For Teacher</b></a></span></p></section>
<section class="main">
<section class="mainleft">
	<form action="" method="post">
		<table>
			<input type="hidden" name="id"  value="<?php echo $result['id']; ?>">
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $result['name']; ?>" required="1"></td>
			</tr>
			<tr>
				<td>Department: </td>
				<td><input type="text" name="dept"  value="<?php echo $result['dept']; ?>" required="1"></td>
			</tr>
			<tr>
				<td>Age: </td>
				<td><input type="text" name="age" value="<?php echo $result['age']; ?>" required="1"></td>
			</tr>
			<tr>
				<td class="btn"><input type="submit" name="update" value="Update"></td>
			</tr>

		</table>
		
	</form>
</section>
<?php  }  else { ?>

</section>

<section class="main"><p> CRUD WITH PDO <span style=" margin-left: auto; list-style: none;"><a href="index.php" style="text-decoration: none; color:#008CBA;font-size: 30px"><b>For Student</b></a> || <a href="indexTeacher.php" style="text-decoration: none; color:#008CBA;font-size: 30px"><b>For Teacher</b></a></span></p></section>

	<section class="main">
<section class="mainleft">
	<form action="" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" placeholder="Your Name.." required="1"></td>
			</tr>
			<tr>
				<td>Department: </td>
				<td><input type="text" name="dept" placeholder="Your Department.." required="1"></td>
			</tr>
			<tr>
				<td>Age: </td>
				<td><input type="text" name="age" placeholder="Your Age.." required="1"></td>
			</tr>
			<tr>
				<td class="btn"><input type="submit" name="create" value="Submit"></td>
			</tr>

		</table>
		
	</form>

</section>
<?php } ?>
<section class="mainright">
	<table class="tblone">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Department</th>
			<th>Age</th>
			<th>Action</th>
		</tr>
	<!-- 	//PHP Code here -->
		<?php 
		$i=0;
         foreach ($user->readAll() as $key => $value) {
         $i++;



		 ?>

		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo $value['dept']; ?></td>
			<td><?php echo $value['age']; ?></td>
			<td>
				<?php 
                     echo "<a href='indexTeacher.php?action=update&id=".$value['id']."'>Update</a>";  
				 ?>

				 ||
		         <?php
				    echo "<a href='indexTeacher.php?action=delete&id=".$value['id']."' onClick='return confirm(\"Are You Sure to Delete Data\")'>Delete</a>"; 
				    ?>
			</td>
		</tr>
		<?php } ?>	
	
		
	</table>
	

</section>

</section>
