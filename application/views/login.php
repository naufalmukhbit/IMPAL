<!DOCTYPE html>
<html>
<head>
	<title>Login to Showroom</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
</head>
<body>
	<div class="bg">
		<div class="container">
			<?php 
		        echo form_open("Login/validate_data");
		    ?>
				<div class="form-box">
					<h2 class="teks">Login</h2>
					
					<div class="form-group">
						<p>Username</p>
						<input type="text" class="form-control" name="username" required>
					</div>
					
					<div class="form-group">
						<p>Password</p>
						<input type="Password" class="form-control" name="password" required>
					</div>

					<div class="text-center daftar">
						<button type="submit" class="btn btn-block mx-auto" id="signinButton">Login</button>
					</div>
					<footer class="mt-3">
						<a class="acc" href="../register/register.html">Create Account</a>
					</footer>
				</div>
			</form>
			
		</div>
	</div>
</body>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript">
	function validasi() {
		var Username = document.getElementById("Username").value;
		var Password = document.getElementById("Password").value;
		if (Username != "" && Password !="") {
			return true;
		}else{
			alert('Username or Password wrong !');
		}
	}
</script>
</html>
<?php
if($this->session->flashdata('message') == 'login_failed') {
	echo "<script>alert('Username/password is incorrect.');</script>";
}
?>