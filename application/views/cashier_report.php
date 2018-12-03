<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cashier's Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/cashier_report.css">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script type="text/javascript">
		$(document).ready(function () {
			$("#sidebar").mCustomScrollbar({
				theme: "minimal"
			});

			$('#sidebarCollapse').on('click', function () {
	        	// open or close navbar
	        	$('#sidebar').toggleClass('active');
        		// close dropdowns
        		$('.collapse.in').toggleClass('in');
    	    	// and also adjust aria-expanded attributes we use for the open/closed arrows
        		// in our CSS
        		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
        	});

		});
	</script>
</head>
<body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-2 sidebar-col-2">
				<nav id="sidebar">
					<div class="sidebar-header px-auto">
						<img src="<?php echo base_url(); ?>/assets/images/blank-female-profile.png" class="rounded-circle">
					</div>

					<ul class="list-unstyled components">
						<li class="side">
							<a href="<?php echo site_url('Cashier/index'); ?>">Home</a>
						</li>
						<li class="side">
							<a href="#">New Transaction</a>
						</li>
						<li class="side">
							<a href="<?php echo site_url('Cashier/t_list'); ?>">Transactions List</a>
						</li>
						<li class="active side">
							<a href="#">Send Report</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="col-10 sidebar-col-10">
				<div class="container header">
					<div class="row header-row">
						<div class="col-10 header-col-10">
							Welcome,<br>
							<div class="emp-name"><?php echo $this->session->userdata('name'); ?></div>
							<div><?php echo $this->session->userdata('emp_id'); ?></div>
						</div>
						<div class="col-2 pl-5 pr-0 my-auto">
							<a href="#" class="mr-4"><i class="fa fa-cog"></i></a>
							<a href="<?php echo site_url('Cashier/logout'); ?>"><i class="fa fa-sign-out-alt"></i></a>
						</div>
					</div>
				</div>
				<div class="container">
					<?php 
				        echo form_open("Register/add_data");
				    ?>
						<div class="form-box">
							<div class="container-fluid">
								<div class="col-lg-6">
									<div class="form-group">
										<input type="date" class="form-control" placeholder="Date" name="emp_id">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Vehicle ID" name="name">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Customer ID" name="username">
									</div>
									<div class="form-group">
										<select class="form-control custom-select" id="profile-gender" name="position">
											<option value="" disabled selected value>Unit</option>
											<option value="1">Manager</option>
											<option value="2">Mechanic</option>
											<option value="3">Accounting</option>
											<option value="4">Stock Management</option>
											<option value="5">Cashier</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Title" name="emp_id">
									</div>
									<div class="form-group">
										<textarea class="form-control" placeholder="Description"></textarea>
									</div>
									<div class="text-center daftar">
										<button type="submit" class="btn btn-block mx-auto" id="signinButton">Send</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>                                		                            