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
						<input type="text" class="form-control" placeholder="Employee ID" name="emp_id" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Full Name" name="name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" name="username" required>
					</div>
					<div class="form-group">
						<select class="form-control custom-select" id="profile-gender" name="position" required>
							<option value="" disabled selected value>Position</option>
							<option value="1">Manager</option>
							<option value="2">Mechanic</option>
							<option value="3">Accounting</option>
							<option value="4">Stock Management</option>
							<option value="5">Cashier</option>
							<option value="6">Warehouse Operator</option>
							<option value="7">Salesperson</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="E-mail" name="email" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" name="password" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Confirm Password" name="confirm" required>
					</div>

					<div class="text-center daftar">
						<button type="submit" class="btn btn-block mx-auto" id="signinButton">Register</button>
					</div>
					<footer class="mt-3">
						<a class="acc" href="<?php echo site_url('Login/index'); ?>" style="align-content: center;">Already have an Account?</a>
					</footer>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
if($this->session->flashdata('error') == 'username_taken') {
 	echo "<script>alert('Username/ID has been taken!');</script>";
} else if ($this->session->flashdata('error') == 'password_wrong') {
	echo "<script>alert('Password and its confirmation are different!');</script>";
}
?>