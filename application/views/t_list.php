<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cashier's Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/t_list.css">
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
						<li class="side">
							<a href="<?php echo site_url('Cashier/index'); ?>">Home</a>
						</li>
						<li class="side">
							<a href="#">New Transaction</a>
						</li>
						<li class="active side">
							<a href="#">Transactions List</a>
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
									<h2 style="color: black">Manage <b style="color: black">Transaction</b></h2>
								</div>
								<div class="col-sm-6">
									<a href="#addTransactionModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Transaction</span></a>						
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
			                        <th>ID Transaction</th>
			                        <th>Type Transaction</th>
			                        <th>Purchase Date</th>
			                        <th>Customer Name</th>
			                        <th>Customer ID</th>
			                        <th>Unit Type</th>
			                        <th>Unit ID</th>	
			                        <th>Color</th>
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
			                        <td><?php echo $value->idtransaction ?></td>
			                        <td><?php echo $value->typetransaction?></td>
									<td><?php echo $value->date ?></td>
			                        <td><?php echo $value->customername ?></td>
			                        <td><?php echo $value->ktp ?></td>
			                        <td><?php echo $value->unit_type ?></td>
			                        <td><?php echo $value->idcar ?></td>
			                        <td><?php echo $value->color ?></td>
			                        <td>
			                            <a href="#editTransactionModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
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
				<div id="addTransactionModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">						
									<h4 class="modal-title">Add New Transaction</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">	
								<form method="POST" action="<?php echo base_url('Transaction_c/add'); ?>" enctype="multipart/form-data">				
									<div class="form-group">
										<label>ID Transaction</label>
										<input type="text" class="form-control" name="idtransaction" required>
									</div>
									<div class="form-group">
										<label>Type Transaction</label>
										<input type="text" class="form-control" name="typetransaction" required>
									</div>
									<div class="form-group">
										<label>Date</label>
										<input type="Date" class="form-control" name="date" required>
									</div>
									<div class="form-group">
										<label>Description</label>
										<input type="text" class="form-control" name="deskripsi" required>
									</div>	
									<div class="form-group">
										<label>Price</label>
										<input type="text" class="form-control" name="price" required>
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
				<div id="editTransactionModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">						
									<h4 class="modal-title">Edit Transaction</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<div class="modal-body">
								<form method="POST" action="<?php echo site_url("Transaction_c/editData/".$value->idtransaction) ?>" enctype="multipart/form-data">					
									<div class="form-group">
										<label>ID Transaction</label>
										<input type="text" class="form-control" name="idtransaction" value="<?php echo $this->session->userdata('idtransaction'); ?>" required>
									</div>
									<div class="form-group">
										<label>Type Transaction</label>
										<input type="text" class="form-control" name="typetransaction" required>
									</div>
									<div class="form-group">
										<label>Date</label>
										<input type="Date" class="form-control" name="date" required>
									</div>				
									<div class="form-group">
										<label>Deskription</label>
										<input type="text" class="form-control" name="deskripsi" required>
									</div>	
									<div class="form-group">
										<label>Price</label>
										<input type="text" class="form-control" name="price" required>
									</div>	
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-info" value="Save">
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