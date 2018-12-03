<!DOCTYPE html>
<html lang="en">
<head>
	<title>Accounting's Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/accounting.css">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

			$(document).ready(function(){
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
						<li class="active side">
							<a href="#">Home</a>
						</li>
						<li class="side">
							<a href="#">Customer List</a>
						</li>
						<li class="side">
							<a href="<?php echo site_url('Cashier/report'); ?>">Send Report</a>
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
			        <div class="table-wrapper">
			            <div class="table-title" style="background-color: white">
			                <div class="row" style="background-color: white">
			                    <div class="col-sm-6">
									<h2 style="color: black">Manage <b style="color: black">Trasurer Data</b></h2>
								</div>
								<div class="col-sm-6">
									<a href="#addBendaharaModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Trasurer</span></a>
									<a href="#deleteBendaharaModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
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
									<th>ID Employee</th>
			                        <th>Trasurer Name</th>
			                        <th>Trasurer Email</th>
									<th>Address</th>
			                        <th>Phone</th>
			                        <th></th>
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
									<td><?php echo $value->idemployee ?></td>
			                        <td><?php echo $value->name ?></td>
			                        <td><?php echo $value->email?></td>
									<td><?php echo $value->address ?></td>
			                        <td><?php echo $value->phone ?></td>
			                        
			                        <td></td>
			                        <td>
			                            <a href="#editBendaharaModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
			                            <a href="<?php echo site_url("Bendahara_c/hapus/".$value->idemployee) ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
			                        </td>
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
				<!-- Edit Modal HTML -->
				<div id="addBendaharaModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">						
									<h4 class="modal-title">Add New Trasurer</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">	
								<form method="POST" action="<?php echo base_url('Bendahara_c/add'); ?>" enctype="multipart/form-data">				
									
									<div class="form-group">
										<label>ID Employee</label>
										<input type="text" class="form-control" name="idemployee" required>
									</div>
									<div class="form-group">
										<label>Trasure Name</label>
										<input type="text" class="form-control" name="name" required>
									</div>
									<div class="form-group">
										<label>Trasure Email</label>
										<input type="email" class="form-control" name="email" required>
									</div>
									<div class="form-group">
										<label>Adress</label>
										<input type="text" class="form-control" name="address" required>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" name="phone" required>
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
				<div id="editBendaharaModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">						
									<h4 class="modal-title">Edit Trasurer</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
								<form method="POST" action="<?php echo site_url("Bendahara_c/editData/".$value->idemployee) ?>" enctype="multipart/form-data">					
									<div class="form-group">
										<label>ID Employee</label>
										<input type="text" class="form-control" name="idemployee" value="<?php echo $this->session->userdata('idemployee'); ?>" required>
									</div>
									<div class="form-group">
										<label>Trasurer Name</label>
										<input type="text" class="form-control" name="name" required>
									</div>
									<div class="form-group">
										<label>Trasurer Email</label>
										<input type="email" class="form-control" name="email" required>
									</div>
									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control" name="address" required>
									</div>
									<div class="form-group">
										<label>Phone</label>
										<input type="text" class="form-control" name="phone" required>
									</div>					
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-info" value="Save">
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Delete Modal HTML -->
				<div id="deleteBendaharaModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<form>
								<div class="modal-header">						
									<h4 class="modal-title">Delete Trasurer</h4>
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
    
</body>
</html>                                		                            