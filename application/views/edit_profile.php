<!DOCTYPE html>
<html>
<head> 
    <title>Edit Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript">
        $(document).ready(function() {
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
            }
          
            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 sidebar-col-2">
                <nav id="sidebar">

                    <ul class="list-unstyled components">
                        <li class="side">
                            <a href="#">&lt; Back</a>
                        </li>
                        <li class="active side">
                            <a href="#">Edit Profile</a>
                        </li>
                        <li class="side">
                            <a href="<?php echo site_url('Change_password/index'); ?>">Change Password</a>
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
                    <h2>Your Profile</h2><br>
                    <?php echo form_open_multipart("Edit_profile/edit_profile",array('class'=>'mx-auto'));
                        foreach ($profile as $data) {
                            if($data->disp_pic == "") {
                            ?>
                            <img src="<?php echo base_url(); ?>docs/display-pictures/default.png" class="rounded-circle" id="pic-preview">
                            <?php
                            } else {
                            ?>
                            <img src="<?php echo base_url(); ?>docs/display-pictures/<?php echo $data->disp_pic; ?>" class="rounded-circle" id="pic-preview">
                            <?php
                            }
                            ?>
                            <br><br><input type="file" id="photo" name="display-picture" size="10" onchange="previewImage()">
                            <br><br><label>Username</label><br>
                            <input type="text" name="username" value="<?php echo $data->username; ?>"><br><br>
                            <label>Name</label><br>
                            <input type="date" name="name" value="<?php echo $data->name; ?>"><br><br>
                            <label>Email</label><br>
                            <input type="email" name="email" value="<?php echo $data->email; ?>"><br><br>
                            <label>Level</label><br>
                            <input type="text" name="level" value="<?php echo $data->level; ?>"><br>
                        <?php
                        }
                        ?>
                        <br><button type="submit" name="editChanges" class="btn btn-primary">Submit Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>  

<?php 
if($this->session->flashdata('message') == 'update_error') {
  echo "<script>alert('Something's wrong. Please try again.');</script>";
} else if($this->session->flashdata('message') == 'update_succes') {
  echo "<script>alert('Profile updated!');</script>";
} else if($this->session->userdata('emp_id') == NULL) {
  echo "<script>alert('userid not found');</script>";
}
?>