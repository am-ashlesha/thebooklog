<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>The BookLog</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light">
		  <div class="container-fluid">
		  <img src="../logo.png" width="300px" height="150px"style="margin-left:-150px">
          <a class="navbar-brand" href="userblog.php">Blog</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		     <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
		        <!-- <li class="nav-item">
		          <a class="nav-link " 
		             aria-current="page" 
		             href="userblog.php">Blog</a>
		        </li>-->
                <li class="nav-item"> 
		          <a class="nav-link" 
		             aria-current="page" 
		             href="Contactus.php">Contact Us</a>
		        </li>
                <li class="nav-item">
		          <a class="nav-link active" 
		             aria-current="page" 
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
		   
		</h1>
            <h1 style="font-family:'Times New Roman', Times, serif;text-align:center;padding:1px;"> Know More About Our Website </h1>
<div class="bg-light" style="font-family:Sans serif  ;text-align:center;padding:6px;margin:20px;font-size:20px">

<p>
	In book blogging, the book blogger is usually an avid book reader who wants to share their passion with like-minded people. 
	The main reason behind every book blogger is to promote the reader to read more and more books. 
	The review regarding the book will help the reader to have a brief information about the book.
	<p>
The BookLog is a website to read more about the books and their overview provided by the admin of the page.
This website provides you with the basic information that a reader needs before starting to read a book.
This will help to develop their interests in the book. The basic information described in this website is totally a social overview.</p>
</p>
<p>
This website provides a great platform for the reader of the book world community.
Its easy to navigate and because of its simple design , the readers won't have any problem navigating it.
The comment section is provided to comment about the books-review.
The comments will be replied by the admin,and will be shown in the comments section as welll.
</p>
<p>
Here, the user can approach for the queries.The answered queries will be shown on the page itself.
If interested in the books , the user can buy the books by direct messaging the admin on the instagram app.<br>
<br><i style="font-size:25px;" class="fa">&#xf16d;</i><a href="https://www.instagram.com/buybestbook/" style="text-decoration:none;color:red"> BuyBestBook</a>
</div>
<footer>
	<hr>
	<img src="../bbblogo.jpg" width="100px" height="100px">
	&copy; By Ashlesha
	<div style="float:right;">
	 <p style="color:red"><big>Sanjay Nayak</big><br></p>
	Address: <br>
	 3/68 DDA Flats Garhi East of Kailash <br>
New Delhi – 110065

<div>
<br>
</footer>

