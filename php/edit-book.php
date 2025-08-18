<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# Database Connection File
	include "../db_conn.php";

    # Validation helper function
    include "func-validation.php";

    # File Upload helper function
    include "func-file-upload.php";


	if (isset($_POST['book_id'])          &&
        isset($_POST['book_title'])       &&
        isset($_POST['book_description']) &&
        isset($_POST['book_author'])      &&
        isset($_POST['book_category'])    &&
        isset($_FILES['book_cover'])      &&
        isset($_POST['current_cover']) )  
        
		{

		/** 
		Get data from POST request 
		and store them in var
		**/
		$id          = $_POST['book_id'];
		$title       = $_POST['book_title'];
		$description = $_POST['book_description'];
		$author      = $_POST['book_author'];
		$category    = $_POST['book_category'];
        
         /** 
	      Get current cover & current file 
	      from POST request and store them in var
	    **/

        $current_cover = $_POST['current_cover'];
        
        #simple form Validation
        $text = "Book title";
        $location = "../edit-book.php";
        $ms = "id=$id&error";
		is_empty($title, $text, $location, $ms, "");

		$text = "Book description";
        $location = "../edit-book.php";
        $ms = "id=$id&error";
		is_empty($description, $text, $location, $ms, "");

		$text = "Book author";
        $location = "../edit-book.php";
        $ms = "id=$id&error";
		is_empty($author, $text, $location, $ms, "");

		$text = "Book category";
        $location = "../edit-book.php";
        $ms = "id=$id&error";
		is_empty($category, $text, $location, $ms, "");
        
		$query  = $conn -> prepare("SELECT * FROM books WHERE title = ?");
        $query -> execute([$title]);
		$result = $query -> rowCount();
		

        /**
          if the admin try to 
          update the book cover
        **/
          if (!empty($_FILES['book_cover']['name'])) {
          	  /**
		          if the admin try to 
		          update both 
		      **/
		      if (!empty($_FILES['file']['name'])) {
		      	# update both here

		      	# book cover Uploading
		        $allowed_image_exs = array("jpg", "jpeg", "png");
		        $path = "cover";
		        $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);

		        # book cover Uploading
		       
		        if ($book_cover['status'] == "error" || 
		            $file['status'] == "error") {

			    	$em = $book_cover['data'];

			    	/**
			    	  Redirect to '../edit-book.php' 
			    	  and passing error message & the id
			    	**/
			    	header("Location: ../edit-book.php?error=$em&id=$id");
			    	exit;
			    }
				// elseif ($result > 0) {
				// 	$em = "The Book already exists";
				// 	header("Location: ../edit-book.php?error=$em&id=$id");
				// 	exit;
				// }
				else {
                  # current book cover path
			      $c_p_book_cover = "../uploads/cover/$current_cover";

			    

			      # Delete from the server
			      unlink($c_p_book_cover);
			      unlink($c_p_file);

			      /**
		              Getting the new file name 
		              and the new book cover name 
		          **/
		           $file_URL = $file['data'];
		           $book_cover_URL = $book_cover['data'];

		            # update just the data
		          	$sql = "UPDATE books
		          	        SET title=?,
		          	            author_id=?,
		          	            description=?,
		          	            category_id=?,
		          	            cover=?
		          	           
		          	        WHERE id=?";
		          	$stmt = $conn->prepare($sql);
					$res  = $stmt->execute([$title, $author, $description, $category,$book_cover_URL, $id]);

				    /**
				      If there is no error while 
				      updating the data
				    **/
				     if ($res) {
				     	# success message
				     	$sm = "Successfully updated!";
						header("Location: ../edit-book.php?success=$sm&id=$id");
			            exit;
				     }else{
				     	# Error message
				     	$em = "Unknown Error Occurred!";
						header("Location: ../edit-book.php?error=$em&id=$id");
			            exit;
				     }


			    }
		      }else {
		      	# update just the book cover

		      	# book cover Uploading
		        $allowed_image_exs = array("jpg", "jpeg", "png");
		        $path = "cover";
		        $book_cover = upload_file($_FILES['book_cover'], $allowed_image_exs, $path);
                
                /**
				    If error occurred while 
				    uploading
				**/
		        if ($book_cover['status'] == "error") {

			    	$em = $book_cover['data'];

			    	/**
			    	  Redirect to '../edit-book.php' 
			    	  and passing error message & the id
			    	**/
			    	header("Location: ../edit-book.php?error=$em&id=$id");
			    	exit;
			    }
				// elseif ($result > 0) {
				// 	$em = "The Book already exists";
				// 	header("Location: ../edit-book.php?error=$em&id=$id");
				// 	exit;
				// }
				else {
                  # current book cover path
			      $c_p_book_cover = "../uploads/cover/$current_cover";

			      # Delete from the server
			      unlink($c_p_book_cover);

			      /**
		              Getting the new file name 
		              and the new book cover name 
		          **/
		           $book_cover_URL = $book_cover['data'];

		            # update just the data
		          	$sql = "UPDATE books
		          	        SET title=?,
		          	            author_id=?,
		          	            description=?,
		          	            category_id=?,
		          	            cover=?
		          	        WHERE id=?";
		          	$stmt = $conn->prepare($sql);
					$res  = $stmt->execute([$title, $author, $description, $category,$book_cover_URL, $id]);

				    /**
				      If there is no error while 
				      updating the data
				    **/
				     if ($res) {
				     	# success message
				     	$sm = "Successfully updated!";
						header("Location: ../edit-book.php?success=$sm&id=$id");
			            exit;
				     }else{
				     	# Error message
				     	$em = "Unknown Error Occurred!";
						header("Location: ../edit-book.php?error=$em&id=$id");
			            exit;
				     }


			    }
			}
            
	      
          }
		//   elseif ($result > 0) {
		// 	$em = "The Book title Exists";
		// 	header("Location: ../edit-book.php?error=$em&id=$id");
		// 	exit;
		// }	
		 	else {
          	# update just the data
          	$sql = "UPDATE books
          	        SET title=?,
          	            author_id=?,
          	            description=?,
          	            category_id=?
          	        WHERE id=?";
          	$stmt = $conn->prepare($sql);
			$res  = $stmt->execute([$title, $author, $description, $category, $id]);

		    /**
		      If there is no error while 
		      updating the data
		    **/
		     if ($res) {
		     	# success message
		     	$sm = "Successfully updated!";
				header("Location: ../edit-book.php?success=$sm&id=$id");
	            exit;
		     }else{
		     	# Error message
		     	$em = "Unknown Error Occurred!";
				header("Location: ../edit-book.php?error=$em&id=$id");
	            exit;
		     }
			}
          } 
	else {
      header("Location: ../admin.php");
      exit;
	
	}
}else{
  header("Location: ../login.php");
  exit;
}