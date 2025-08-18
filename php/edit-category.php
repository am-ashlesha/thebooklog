<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# Database Connection File
	include "../db_conn.php";


    /** 
	  check if category 
	  name is submitted
	**/
	if (isset($_POST['category_name']) &&
        isset($_POST['category_id'])) {
		/** 
		Get data from POST request 
		and store them in var
		**/
		$name = $_POST['category_name'];
		$id = $_POST['category_id'];

		#simple form Validation
		$query  = $conn -> prepare("SELECT * FROM categories WHERE name = ?");
        $query -> execute([$name]);
		$result = $query -> rowCount();

		if (empty($name)) {
			$em = "The Category name is required";
			header("Location: ../edit-category.php?error=$em&id=$id");
            exit;
		}
		elseif (!preg_match("/^[a-zA-Z\s]+$/",$name)) {
			$em = "The Category name should not contain numbers";
			header("Location: ../edit-category.php?error=$em&id=$id");
            exit;
		}
		elseif ($result > 0) {
			$em = "The Catagory already Exists";
			header("Location: ../add-category.php?error=$em&id=$id");
            exit;
		}
		else {
			# UPDATE the Database
			$sql  = "UPDATE categories 
			         SET name=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name, $id]);

			/**
		      If there is no error while 
		      updating the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Successfully updated!";
				header("Location: ../edit-category.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../edit-category.php?error=$em&id=$id");
	            exit;
		     }
		}
	}else {
      header("Location: ../admin.php");
      exit;
	}

}else{
  header("Location: ../login.php");
  exit;
}