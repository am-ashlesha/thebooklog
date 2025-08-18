

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</head>
<body>
<div class="d-flex justify-content-center align-items-center"
	     style="min-height: 100vh;">
       <form class="p-5 rounded shadow"
		      style="max-width: 30rem; width: 100%"
		      method="POST" action="../php/reg-user.php">

              <div class="ps-md-3 ps-lg-5 ps-xl-0">
                
                
		  <h2 class="text-center display-4 pb-5">REGISTER</h2>
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
                <form class="needs-validation" novalidate="" method ="POST" action = "../php/reg-user.php">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-1 row-cols-lg-2">
                    <div class=" mb-3">
                      <label>Name</label>
                      <input class="form-control form-control-md" type="text" name = "u_name" required="">
                    </div>
                    
                    <div class="mb-3">
                    <label>Email</label>
                      <input class="form-control form-control-md" type="email" name = "u_email"  required="">
                    </div>
                  </div>
                  <div class="password-toggle mb-3">
                    <label>Password</label>
                    <input class="form-control form-control-md" type="password" name = "u_pass" required="">
                  </div>
                  <div class="password-toggle mb-4">
                    <label>Confirm Password</label>
                    <input class="form-control form-control-md" type="password" name = "u_cpass"  required="">
                    </label>
                  </div>
                  <button class="btn btn-s btn-primary w-100 mb-4" type="submit" name = "register">Sign up</button>
                  <a href="userlogin.php" style="text-decoration:none;">Login</a>
                </form>
              </div>
            </div> 
</body>
</html>
