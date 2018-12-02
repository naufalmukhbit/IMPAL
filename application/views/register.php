<!DOCTYPE html>
<html>
<head>
	<title>Register to Showroom</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/register.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
</head>
<body>
	<div class="bg">
		<div class="container">
			<?php 
		        echo form_open("Register/add_data");
		    ?>
				<div class="form-box">
					<p class="teks">Register New Account</p>
					
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username">
					</div>
					<div class="form-group">
						<select class="form-control custom-select" id="profile-gender" name="gender">
							<option value="" disabled selected value>Position</option>
							<option value="Manager">Manager</option>
							<option value="Employee">Employee</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="E-mail">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Confirm Password">
					</div>

					<div class="text-center daftar">
						<button type="submit" class="btn btn-block mx-auto" id="signinButton">Register</button>
					</div>
					<footer class="mt-3">
						<a class="acc" href="../register/register.html" style="align-content: center;">Already have an Account?</a>
					</footer>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
if($this->session->flashdata('error') == 'username_taken') {
  echo "<script>alert('Username has been taken!');</script>";
}
?>