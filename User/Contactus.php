<?php
session_start();
if (
	isset($_SESSION['u_id']) &&
	isset($_SESSION['u_email'])
) {

	$email = $_SESSION['u_email'];
	# Database Connection File
	include "../db_conn.php";

	//include "../php/func-query.php";
	//$queries = get_user_query($conn, $email);
	
    include "../php/func-query.php";
    $queries = get_all_query($conn);
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Book Store</title>

		<!-- bootstrap 5 CDN-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<!-- bootstrap 5 Js bundle CDN-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
			crossorigin="anonymous"></script>
		<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

		<link rel="stylesheet" href="../css/style.css">

	</head>

	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light ">
				<div class="container-fluid">
				<img src="../logo.png" width="300px" height="150px"style="margin-left:-150px">
					<a class="navbar-brand" href="userblog.php">Blog</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
						data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<!-- <li class="nav-item">
				  <a class="nav-link " 
					 aria-current="page" 
					 href="userblog.php">Blog</a>
				</li>-->
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="Contactus.php">Contact Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="aboutus.php">About Us</a>
							</li>

							<li class="nav-item position-absolute top end-0">
								<a class="nav-link " aria-current="page" href="userlogout.php">Logout</a>
							</li>
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
		   
		</h1>
			<form action="../php/user-contactus.php" method="post" class="shadow p-2 rounded d-inline-block mt-1 "
				style="width: 100%; max-width: 40rem; max-height:32rem; height: 50%;">

				<h1 class="text-center pb-5 display-4 fs-3">
					Comment Section
				</h1>
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?= htmlspecialchars($_GET['error']); ?>
					</div>
				<?php } ?>
				<?php if (isset($_GET['success'])) { ?>
					<div class="alert alert-success" role="alert">
						<?= htmlspecialchars($_GET['success']); ?>
					</div>
				<?php } ?>
				<div class="mb-3">
					<label class="form-label">
						Enter Comments:-
					</label>
					<textarea class="form-control" name="comment" id="" cols="30" rows="10"></textarea>
				</div>

				<button type="submit" class="btn btn-primary">
					Submit</button>
			</form>

			<div class="p-2 d-inline-block align-top mt-1" style="width: 100%; max-width: 40rem;height:100%;max-height:45rem;margin-top:-22px">
			<div class=" pt-2">
			<?php if ($queries == 0){ ?>
				<div class="alert alert-warning 
        	            text-center p-5" 
        	     role="alert">
        	     <br>
			    There is no query
				
		       </div>
		<?php } ?>	
		<div class="card overflow-auto"
						style="width: 100%; max-width: 50rem;  max-height:28rem;height:100%;margin-top:-1rem">
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
									<i><b>Comment:</b>
							<?=$query['queries']?>
							</i></p>
							<p class="card-email">
						    <i><b>Answer:</b>
							<?=$query['answer']?>
							</i>
				</p>
							<?php } ?>
							</div>
				</div>
			 </div> 
             </body>   
             <?php }else{
  header("Location: userlogin.php");
  exit;
} ?>