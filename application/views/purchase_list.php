<!DOCTYPE html>
<html>
<head>
	<title>Manager's Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/manage_employee.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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

		    // Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();
			
			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function(){
				if(this.checked){
					checkbox.each(function(){
						this.checked = true;                        
					});
				} else{
					checkbox.each(function(){
						this.checked = false;                        
					});
				} 
			});
			checkbox.click(function(){
				if(!this.checked){
					$("#selectAll").prop("checked", false);
				}
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
							<a href="<?php echo site_url('Manager/index'); ?>">Home</a>
						</li>
						<li class="side">
							<a href="#empSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">Employees</a>
							<ul class="collapse list-unstyled" id="empSubmenu">
								<li class="side">
									<a href="#">Manage Employees</a>
								</li>
								<li class="side">
									<a href="#">Opt 2</a>
								</li>
								<li class="side">
									<a href="#">Opt 3</a>
								</li>
							</ul>
						</li>
						<li class="side">
							<a href="#repSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports</a>
							<ul class="collapse list-unstyled" id="repSubmenu">
								<li class="active side">
									<a href="<?php echo site_url('Manager/purchase'); ?>">Purchase List</a>
								</li>
								<li class="side">
									<a href="<?php echo site_url('Manager/order'); ?>">Order List</a>
								</li>
								<li class="side">
									<a href="<?php echo site_url('Manager/transaction'); ?>">Transaction List</a>
								</li>
								<li class="side">
									<a href="<?php echo site_url('Manager/stock'); ?>">Stock List</a>
								</li>
							</ul>
						</li>
						<li class="side">
							<a href="#stkSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Stocks Management</a>
							<ul class="collapse list-unstyled" id="stkSubmenu">
								<li class="side">
									<a href="#">Page 1</a>
								</li>
								<li class="side">
									<a href="#">Page 2</a>
								</li>
								<li class="side">
									<a href="#">Page 3</a>
								</li>
							</ul>
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
							<a href="<?php echo site_url('Manager/logout'); ?>"><i class="fa fa-sign-out-alt"></i></a>
						</div>
					</div>
				</div>
				 <div class="container">
			        <div class="table-wrapper">
			            <div class="table-title" style="background-color: white">
			                <div class="row" style="background-color: white">
			                    <div class="col-sm-6">
									<h2 style="color: black">List <b style="color: black">Purchase</b></h2>
								</div>
								<div class="col-sm-6">
															
								</div>
			                </div>
			            </div>
			            <table class="table table-striped table-hover">
			                <thead>
			                    <tr>
									<th>
										<span class="custom-checkbox">
											<input type="checkbox" id="selectAll">
											<label for="selectAll"></label>
										</span>
									</th>
			                        <th>ID Purchase</th>
			                        <th>Type Purchase</th>
			                        <th>Purchase Date</th>
									<th>Customer Name</th>
			                        <th>KTP</th>
			                        <th>Unit Type<th>
			                        <th>Color<th>
			                        <th>Price<th>
			                    </tr>
			                </thead>
			                <tbody>
							<?php foreach ($data -> result() as  $value) { ?>
			                    <tr>
									<td>
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>
										</span>
									</td>
			                        <td><?php echo $value->idpurchase ?></td>
			                        <td><?php echo $value->typepurchase?></td>
									<td><?php echo $value->date ?></td>
			                        <td><?php echo $value->customername ?></td>
			                        <td><?php echo $value->ktp ?></td>
			                        <td><?php echo $value->unit_type ?></td>
			                        <td></td>
			                        <td><?php echo $value->color ?></td>
			                        <td></td>
			                        <td><?php echo $value->price ?></td>
								</tr> 
								<?php } ?>
			                </tbody>
			            </table>
						<div class="clearfix">
			                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
			                <ul class="pagination">
			                    <li class="page-item disabled"><a href="#">Previous</a></li>
			                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
			                    <li class="page-item"><a href="#" class="page-link">2</a></li>
			                    <li class="page-item"><a href="#" class="page-link">3</a></li>
			                    <li class="page-item"><a href="#" class="page-link">4</a></li>
			                    <li class="page-item"><a href="#" class="page-link">5</a></li>
			                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
			                </ul>
			            </div>
			        </div>
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