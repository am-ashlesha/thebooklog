<?php 
session_start();

# If not author ID is set
if (!isset($_GET['id'])) {
	header("Location: userblog.php");
	exit;
}

# Get author ID from GET request
$id = $_GET['id'];

# Database Connection File
include "../db_conn.php";

# Book helper function
include "../php/func-book.php";
$books = get_books_by_author($conn, $id);

# author helper function
include "../php/func-author.php";
$authors = get_all_author($conn);
$current_author = get_author($conn, $id);


# Category helper function
include "../php/func-category.php";
$categories = get_all_categories($conn);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$current_author['name']?></title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light ">
		  <div class="container-fluid">
		  <img src="../logo.png" width="300px" height="150px"style="margin-left:-150px">
		    <a class="navbar-brand" href="userblog.php">Blog</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="contactus.php">Contact Us</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="aboutus.php">About Us</a>
			</li>	
			<?php 
     if (isset($_SESSION['u_id']) &&
      isset($_SESSION['u_email'])) {?>

<li class="nav-item  position-absolute top end-0">
		          <a class="nav-link "
                 
		             aria-current="page" href="userlogout.php">Logout</a></li>
                    
            </li>
<?php
   } else{ ?>
			<li class="nav-item dropdown position-absolute top end-0">
		          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" 
                  role="button" data-bs-toggle="dropdown" 
		             aria-expanded="false" >Login/Register </a>
                     <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		            <li ><a class="dropdown-item" href="userlogin.php">Login</a></li>
                    <li ><a class="dropdown-item" href="userreg.php">Register</a></li>
            </li>
<?php
  }
  ?> 	
		      </ul>
		    </div>
		  </div>
		</nav>
		<h1 class="display-4 p-3 fs-3"> 
			<a href="userblog.php"
			   class="nd">
				<img src="../img/back-arrow.PNG" 
				     width="35">
			</a>
		   <?=$current_author['name']?>
		</h1>
		<div class="d-flex pt-3" >
			<?php if ($books == 0){ ?>
				<div class="alert  
        	            text-center" 
        	     role="alert"style="padding:200px;margin-left:200px;;margin-right:200px	" >
        	     <img src="../img/empty.png" 
        	          width="100">
        	     <br>
			    There is no book in the database
		       </div>
			<?php }else{ ?>
			<div class="pdf-list d-flex flex-wrap">
				<?php foreach ($books as $book) { ?>
				<div class="card m-1"style="max-height:40rem;max-width:70rem;">
					<img src="../uploads/cover/<?=$book['cover']?>"
					     class="card-img-top">
					<div class="card-body">
						<h5 class="card-title">
							<?=$book['title']?>
						</h5>
						<p class="card-text">
							<i><b>By:
								<?php foreach($authors as $author){ 
									if ($author['id'] == $book['author_id']) {
										echo $author['name'];
										break;
									}
								?>

								<?php } ?>
							<br></b></i>
							
							<i><b>Category:
								<?php foreach($categories as $category){ 
									if ($category['id'] == $book['category_id']) {
										echo $category['name'];
										break;
									}
								?>

								<?php } ?>
							<br></b></i>
						</p>
						<a type="button" href="bookdetail.php?id=<?=$book['id']?>" 
					   class="btn btn-primary">
					   View</a>
					</div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>

		<div class="category">
			<!-- List of categories -->
			<div class="list-group">
				<?php if ($categories == 0){
					// do nothing
				}else{ ?>
				<a href="#"
				   class="list-group-item list-group-item-action active">Category</a>
				   <?php foreach ($categories as $category ) {?>
				  
				   <a href="category.php?id=<?=$category['id']?>"
				      class="list-group-item list-group-item-action">
				      <?=$category['name']?></a>
				<?php } } ?>
			</div>

			<!-- List of authors -->
			<div class="list-group mt-5">
				<?php if ($authors == 0){
					// do nothing
				}else{ ?>
				<a href="#"
				   class="list-group-item list-group-item-action active">Author</a>
				   <?php foreach ($authors as $author ) {?>
				  
				   <a href="author.php?id=<?=$author['id']?>"
				      class="list-group-item list-group-item-action">
				      <?=$author['name']?></a>
				<?php } } ?>
			</div>
		</div>
		</div>
	</div>
</body>
</html>