<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {
      
    $id = $_GET['id'];
	# Database Connection File
	include "db_conn.php";
    include "php/func-query.php";
    $queries = get_query($conn,$id);
     
    $name = $queries['name'];
    $email = $queries['email'];

    foreach($queries as $query){ 
        if ($id == $queries['id']) {
            $query1 = $queries['queries'];
            break;
        }
    }

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light ">
		  <div class="container-fluid">
		  <img src="logo.png" width="300px" height="150px"style="margin-left:-150px">
		    <a class="navbar-brand" href="admin.php">Admin</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" 
		             aria-current="page" 
		             href="User/userblog.php">Blog</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-book.php">Add Book</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-category.php">Add Category</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="add-author.php">Add Author</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link active" 
		             href="queries.php">Comments</a>
		        </li>
		        <li class="nav-item position-absolute top end-0">
		          <a class="nav-link"
		             href="logout.php">Logout</a>
		        </li>
		      </ul>
		    </div>
		  </div>

		</nav>
		<h1 class="display-4 p-3 fs-3"> 
			<a href="queries.php"
			   class="nd">
				<img src="img/back-arrow.PNG" 
				     width="35">
			</a>
		   
		</h1>
		<form action="php/query-responce.php"
           method="post" 
           class="shadow p-2 rounded d-inline-block mt-1 "
           style="width: 100%; max-width: 40rem; max-height:45rem; height: 100%">

     	<h1 class="text-center pb-5	 display-4 fs-4">
     		 Respond to the Questions
     	</h1>
     	<?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
			  <?=htmlspecialchars($_GET['error']); ?>
		  </div>
		<?php } ?>
		<?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
			  <?=htmlspecialchars($_GET['success']); ?>
		  </div>
		<?php } ?>
     	<div class="mb-3">
				<input type="hidden" name="id" value= <?=$id?>>
		    <label class="form-label">
		           	Name
		           </label>
                   <input class="form-control" type="text" name ="name" value= <?=$name?> disabled>
                   <label class="form-label">
		           	Email
		           </label>
                   <input class="form-control" type="text" name ="email" value= <?=$email?> disabled>
                   <label class="form-label">
		           	Query
		           </label>
               <textarea  class="form-control" name="comment"  id="" cols="20" rows="4" disabled><?=$query1?></textarea>
               <label class="form-label">
		           	Answer
		           </label>
               <textarea  class="form-control" name="answer"  id="" cols="20" rows="6"></textarea>   
			 	  <br>
			   <input type="submit"
	            class="btn btn-primary">   
		</div>   
	 
     </form> 

<?php }else{
  header("Location: login.php");
  exit;
} ?>