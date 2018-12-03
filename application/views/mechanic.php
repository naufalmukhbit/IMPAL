<!DOCTYPE html>
<html>
<head>
	<title>Mechanic's Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
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
						<li class="active side">
							<a href="#">Home</a>
						</li>
						<li class="side">
							<a href="#">Add Service Data</a>
						</li>
						<li class="side">
							<a href="#">View Service Data</a>
						</li>
						<li class="side">
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
							<a href="<?php echo site_url('Mechanic/logout'); ?>"><i class="fa fa-sign-out-alt"></i></a>
						</div>
					</div>
				</div>
				<div class="container">
					<!-- <h3>New Request</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-box">
								<div class="form-group">
									<p>Date</p>
									<input type="date" style="width: 100%; border-radius: 30px; height: 30px;">
								</div>
								<div class="form-group">
									<p>Supplier</p>
									<select style="width: 100%; border-radius: 30px;">
										<option>-Supplier-</option>
										<option>A</option>
										<option>B</option>
										<option>C</option>
									</select>
								</div>
								<div class="form-group">
									<p>Description</p>
									<input type="text" class="form-control" style="width: 100%; border-radius: 30px; height: 100px;">
								</div>
								<div class="text-center daftar">
									<button type="submit" class="btn btn-block" id="requestpButton">Send Request</button>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-box">
								<div class="form-group" style="width: 48%; display: inline-block; margin-right: 1rem;">
									<p>Unit</p>
									<select style="width: 100%; border-radius: 30px;">
										<option>-Unit-</option>
										<option>aaaa</option>
										<option>bbbb</option>
										<option>cccc</option>
									</select>
								</div>
								<div class="form-group" style="width: 48%; display: inline-block;">
									<p>Amount</p>
									<input type="text" class="form-control" style="width: 100%; border-radius: 30px;">
								</div>
								<a class="acc" href="../login/login.html">+ Add another unit</a>
							</footer>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
</html>