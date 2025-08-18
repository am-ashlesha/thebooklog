<?php  
session_start();


if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

        include "../db_conn.php";

        if (isset($_POST['id']) &&
        isset($_POST['answer'])) {

        $id = $_POST['id']; 
        $message =$_POST['answer']; 
        if (empty($message)) {
            $em = "The user name is required";
            header("Location: ../queryreply.php?error=$em&id=$id");
            exit;
        }else{
        $sql  = "UPDATE query 
			         SET answer=?
			         WHERE id=?";
			$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$message, $id]);
        
        if($res){

               $sm = "Responded";
				header("Location: ../queryreply.php?success=$sm&id=$id");
	            exit;

        }
        else
        {
            $em = "Failed";
			header("Location: ../queryreply.php?error=$em&id=$id");
            exit;
        }
    }
    }

    }

else{
  header("Location: ../login.php");
  exit;
}
?>