<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['u_id']) &&
    isset($_SESSION['u_email'])) {

	# Database Connection File
	include "../db_conn.php";
    
	
	if (isset($_POST['comment'])) {
	
		$comment = $_POST['comment'];
		$useremail = $_SESSION['u_email']; 

		$query  = $conn -> prepare("SELECT u_name FROM user WHERE u_email = ?");
        $stmt = $query -> execute([$useremail]);
		$stmt = $query ->fetchcolumn();
		$username = $stmt; 
		#simple form Validation
		if (empty($comment)) {
			$em = "Please fill the empty field !";
			header("Location: ../User/Contactus.php?error=$em");
            exit;
		}
		else {
			# Insert Into Database
			$sql  = "INSERT INTO query (queries,name,email)
			         VALUES (?,?,?)";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$comment,$username,$useremail]);
			/**
		      If there is no error while 
		      inserting the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Query Sent successfully!";
				header("Location: ../User/Contactus.php?success=$sm");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../User/Contactus.php?error=$em");
	            exit;
		     }
			}
	}else {
       header("Location: ../User/Contactus.php");
      exit;
	}

}else{
  header("Location: ../User/userlogin.php");
  exit;
}