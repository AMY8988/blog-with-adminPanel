<?php require "./core/base.php"?>
<?php require "./core/functions.php";

//print_r(password_verify('rasmuslerdorf', "$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a"));
//print_r(password_verify('aaaaa', '$2y$10$wSa2XI0RxTsMi'));
print_r(password_verify('password', '$2y$10$YDuaPZ1R30eHG'));


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DashBoard</title>

	<link rel="stylesheet" href="<?php echo $url; ?>assets/style.css">
	<link rel="stylesheet" href="<?php echo $url; ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/dataTable/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/dataTable/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/fontawesome/css/all.css">

</head>

<body>

	<div class="container">
		<div class="row min-vh-100 align-items-center justify-content-center">
			<div class="col-6">
				<div class="card bg-light">
					<div class="card-body">
						<form action="" method="post">

							<h3 class="text-center p-2 text-primary">
								<i class="fa-solid fa-user-group"></i>
								Log In
							</h3>

							<?php

                        if(isset($_POST['login-btn'])){
                            logIn();
                        }


                        ?>
							<div class="my-3">
								<label for="">
									<i class="fa-solid fa-envelope"></i>
									Your Email
								</label>
								<input class="form-control" name="email" type="email" required>
							</div>
							<div class="my-3">
								<label for="">
									<i class="fa-solid fa-lock-open"></i>
									Your Password
								</label>
								<input class="form-control" name="password" type="password" required>
							</div>
							<div class="my-3">
								<button class="btn btn-primary " name="login-btn">Register</button>
								<a href="register.php" class="btn btn-link">create a new account</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->

	<script src="<?php echo $url; ?>assets/vendor/jQuery/jquery.js"></script>
	<script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>assets/vendor/wayPoint/lib/jquery.waypoints.js"></script>
	<script src="<?php echo $url; ?>assets/vendor/counter-up/jquery.counterup.js"></script>
	<script src="<?php echo $url; ?>assets/vendor/dataTable/jquery.dataTables.min.js"></script>
	<script src="<?php echo $url; ?>assets/vendor/dataTable/dataTables.bootstrap4.min.js"></script>

	<script src="<?php echo $url; ?>assets/vendor/Chart/chart.min.js"></script>
	<script src="<?php echo $url; ?>assets/js/app.js"></script>


</body>

</html>