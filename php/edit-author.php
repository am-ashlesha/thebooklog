<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# Database Connection File
	include "../db_conn.php";


    /** 
	  check if author 
	  name is submitted
	**/
	if (isset($_POST['author_name']) &&
        isset($_POST['author_id'])) {
		/** 
		Get data from POST request 
		and store them in var
		**/
		$name = $_POST['author_name'];
		$id = $_POST['author_id'];

		#simple form Validation
		$query  = $conn -> prepare("SELECT * FROM authors WHERE name = ?");
        $query -> execute([$name]);
		$result = $query -> rowCount();
		if (empty($name)) {
			$em = "The author name is required";
			header("Location: ../edit-author.php?error=$em&id=$id");
            exit;
		}
		elseif (!preg_match("/^[a-zA-Z\s]+$/",$name)) {
			$em = "The author name should not cointain numbers";
			header("Location: ../edit-author.php?error=$em&id=$id");
            exit;
		}
		elseif ($result > 0) {
			$em = "The author name already exists";
			header("Location: ../add-author.php?error=$em&id=$id");
            exit;
		}
		else {
			# UPDATE the Database
			$sql  = "UPDATE authors 
			         SET name=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$name, $id]);

			/**
		      If there is no error while 
		      inserting the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Successfully updated!";
				header("Location: ../edit-author.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../edit-author.php?error=$em&id=$id");
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