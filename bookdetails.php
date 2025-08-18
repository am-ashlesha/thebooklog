<?php 
session_start();
// if (isset($_SESSION['u_id']) &&
//      isset($_SESSION['u_email'])) {

	# Database Connection File
	include "db_conn.php";
    $id = $_GET['id'];
# Book helper function
include "php/func-book.php";
$books = get_book($conn,$id);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);

# Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);
	
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Book Store</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">
<style>
    .bg {
        
        background-color:lightgrey;
    }
    .container{

    }
    </style>
</head>
<body>

<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
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
					  <a class="nav-link" 
						 href="queries.php">Queries</a>
					</li>
					<li class="nav-item position-absolute top end-0">
					  <a class="nav-link"
						 href="logout.php">Logout</a>
					</li>
				  </ul>
				  
				</div>
		</nav><h1 class="display-4 p-3 fs-3"> 
			<a href="userblog.php"
			   class="nd">
				<img src="img/back-arrow.PNG" 
				     width="35">
			</a>
		   
		</h1>
<?php foreach ($books as $book) { ?>
<div class="card mb-3" style="max-width: 100rem; width:100%;">
  <div class="row g-0">
  
    <div class="col-md-4"> 
      <img src="uploads/cover/<?=$books['cover']?>" 
      class="img-fluid rounded-start" alt="..."style="max-height:30rem;height:50rem;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?=$books['title']?></h5>
        <p class="card-text">
							<i><b>By:
								<?php foreach($authors as $author){ 
									if ($author['id'] == $books['author_id']) {
										echo $author['name'];
										break;
									}
								?>
								<?php } ?>
							</b></i>
                            
							<br><i><b>Category:
								<?php foreach($categories as $category){ 
									if ($category['id'] == $books['category_id']) {
										echo $category['name'];
										
									}
								?>
                               
								<?php } ?>
							<br></b></i>
                            <i><b>Description</b></i>
							<?=$books['description']?>
						</p>
                        
      </div>
                                
    </div>
    
  </div>

  <?php break;} ?>
</div>