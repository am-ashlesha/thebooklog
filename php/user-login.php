<?php 
session_start();

if (isset($_POST['email']) && 
	isset($_POST['password'])) {
    
    # Database Connection File
	include "../db_conn.php";
    
    # Validation helper function
	include "func-validation.php";
	
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	# simple form validation

	$text = "Email";
	$location = "../User/userlogin.php";
	$ms = "error";
    is_empty($email, $text, $location, $ms, "");

    $text = "Password";
	$location = "../User/userlogin.php";
	$ms = "error";
    is_empty($password, $text, $location, $ms, "");

    # search for the email
    $sql = "SELECT * FROM user
            WHERE u_email = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    # if the email is exist
    if ($stmt->rowCount() === 1) {
    	$user = $stmt->fetch();

    	$user_id = $user['u_id'];
    	$user_email = $user['u_email'];
    	$user_password = $user['u_pass'];
    	if ($email === $user_email) {
    		if ($password === $user_password) {
    			$_SESSION['u_id'] = $user_id;
    			$_SESSION['u_email'] = $user_email;
    			header("Location: ../User/userblog.php");
    		}else {
    			# Error message
    	        $em = "Incorrect User name or password";
    	        header("Location: ../User/userlogin.php?error=$em");
    		}
    	}else {
    		# Error message
    	    $em = "Incorrect User name or password";
    	    header("Location: ../User/userlogin.php?error=$em");
    	}
    }else{
    	# Error message
    	$em = "Incorrect User name or password";
    	header("Location: ../User/userlogin.php?error=$em");
    }

}else {
	# Redirect to "../login.php"
	header("Location: ../User/userlogin.php");
}