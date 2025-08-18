<?php  
session_start();

# If the admin is logged in
if (isset($_SESSION['user_id']) &&
    isset($_SESSION['user_email'])) {

	# Database Connection File
	include "db_conn.php";

    include "php/func-query.php";
    $queries = get_all_query($conn);


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
				<li class="nav-item ">
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
			<a href="admin.php"
			   class="nd">
				<img src="img/back-arrow.PNG" 
				     width="35">
			</a>
		</h1>
		<div class=" pt-0">
			<?php if ($queries == 0){ ?>
				<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <br>
			    <b>There is no query</b>
				
		       </div>
		<?php } ?>	
				 <div class=" card-expand ">
					<div class="card-body "> 
					<?php 
				foreach ($queries as $query) { 
					?> <hr>
					
							<p class="card-text"> 
							<i><b>By:</b>
							<?=$query['name']?>
				</p>
						<p class="card-email">
							<i><b>From:</b>
							<?=$query['email']?>
								<br></i></p>
								<p class="card-text"><i>
									<i><b>Query:</b>
							<?=$query['queries']?>
							</i></p>
							<p class="card-email">
						    <i><b>Answer:</b>
							<?=$query['answer']?>
							</i>
				</p>
							<p class="card-email">
							<a href="queryreply.php?id=<?=$query['id']?>" 
					   class="btn btn-primary">
					   Respond</a>
				</p>
							<?php } ?>
							</div>
				</div>
			 </div> 		 
</body>
</html>

<?php }else{
  header("Location: login.php");
  exit;
} ?>