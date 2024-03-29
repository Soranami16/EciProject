<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Login Page</title>
	<style>
		body {
			padding-top: 90px;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
			margin: 0;
		}



		.panel-login>.panel-heading {
			color: #00415d;
			background-color: #fff;
			border-color: #fff;
			text-align: center;
		}

		.panel-login>.panel-heading a {
			text-decoration: none;
			color: #666;
			font-weight: bold;
			font-size: 15px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}

		.panel-login>.panel-heading a.active {
			color: #59B2E0;
			font-size: 18px;
		}

		.panel-login>.panel-heading hr {
			margin-top: 10px;
			margin-bottom: 0px;
			clear: both;
			border: 0;
			height: 1px;
			background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
			background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
			background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
			background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
		}

		.panel-login input[type="text"],
		.panel-login input[type="email"],
		.panel-login input[type="password"] {
			height: 45px;
			border: 1px solid #ddd;
			font-size: 16px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}

		.panel-login input:hover,
		.panel-login input:focus {
			outline: none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			border-color: #ccc;
		}

		.btn-login {
			background-color: #59B2E0;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #59B2E6;
		}

		.btn-login:hover,
		.btn-login:focus {
			color: #fff;
			background-color: #53A3CD;
			border-color: #53A3CD;
		}

		.forgot-password {
			text-decoration: underline;
			color: #888;
		}

		.forgot-password:hover,
		.forgot-password:focus {
			text-decoration: underline;
			color: #666;
		}

		.logo-container {
			position: absolute;
			left: 200px;
			/* Adjust the left distance as needed */
			top: 50%;
			padding: 20px;
			text-align: center;
			transform: translateY(-50%);
		}

		.logo-container img {
			max-width: 100%;
			height: auto;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="logo-container">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQtljby6AFBk_euANftBJSEzVUg-nA9gAkHzPWD2rJHg&slogo.png" alt="Logo" class="img-fluid">
		</div>
		<div class="col-md-6 col-md-offset-6">
			<div class="panel panel-login">
				<div class="panel-heading">
					<a href="#" class="active" id="login-form-link">Login</a>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<form id="login-form" role="form" style="display: block;">
								<div class="form-group">
									<input type="text" name="username" id="login-username" tabindex="1" class="form-control" placeholder="Username">
								</div>
								<div class="form-group">
									<input type="password" name="password" id="login-password" tabindex="2" class="form-control" placeholder="Password">
									<p id="pesanvalidasi"></P>
									<p id="pesantunggu"></P>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3">
											<input type="button" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="js/global.js"></script>
<script src="js/login.js"></script>

</html>