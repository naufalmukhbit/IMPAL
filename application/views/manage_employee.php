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
							<ul class="collapse show list-unstyled" id="empSubmenu">
								<li class="active side">
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
									<h2 style="color: black">Manage <b style="color: black">Employees</b></h2>
								</div>
								<div class="col-sm-6">
									<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
									<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
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
									<th>ID</th>
			                        <th>Name</th>
			                        <th>Email</th>
									<th>Position</th>
			                        <th>Actions</th>
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
									<td><?php echo $value->emp_id ?></td>
			                        <td><?php echo $value->name ?></td>
			                        <td><?php echo $value->email?></td>
									<td><?php echo $value->level ?></td>
			                        <td>
			                            <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
			                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
			                        </td>
			                    </tr>
			                <?php } ?>
			                </tbody>
			            </table>
						<div class="clearfix">
			                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
			                <ul class="pagination">
			                    <li class="page-item disabled"><a href="#">Previous</a></li>
			                    <li class="page-item"><a href="#" class="page-link">1</a></li>
			                    <li class="page-item"><a href="#" class="page-link">2</a></li>
			                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
			                    <li class="page-item"><a href="#" class="page-link">4</a></li>
			                    <li class="page-item"><a href="#" class="page-link">5</a></li>
			                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
			                </ul>
			            </div>
			        </div>
				</div>
				<!-- Edit Modal HTML -->
				<div id="addEmployeeModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<form>
								<div class="modal-header">						
									<h4 class="modal-title">Add Employee</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">					
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" required>
									</div>					
								</div>
								<div class="modal-footer">
									<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-success" value="Add">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Edit Modal HTML -->
				<div id="editEmployeeModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<form>
								<div class="modal-header">						
									<h4 class="modal-title">Edit Employee</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">					
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address</label>
										<textarea class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" required>
									</div>					
								</div>
								<div class="modal-footer">
									<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-info" value="Save">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Delete Modal HTML -->
				<div id="deleteEmployeeModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<form>
								<div class="modal-header">						
									<h4 class="modal-title">Delete Employee</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">					
									<p>Are you sure you want to delete these Records?</p>
									<p class="text-warning"><small>This action cannot be undone.</small></p>
								</div>
								<div class="modal-footer">
									<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-danger" value="Delete">
								</div>
							</form>
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