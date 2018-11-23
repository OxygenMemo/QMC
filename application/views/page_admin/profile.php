<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>share/img/favicon.ico" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QMC-QAL Measurement calibration Laboratory-THAILAND</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>share/css/common.css" type="text/css" />
<link rel="stylesheet" href="<?= base_url() ?>share/css/responsive.css" type="text/css" />    
    <link href="<?= base_url() ?>share/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 
    <!-- Fonts -->
    <link href="<?= base_url() ?>share/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>share/css/nivo-lightbox.css" rel="stylesheet" />
	<link href="<?= base_url() ?>share/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>share/css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="<?= base_url() ?>share/css/style.css" rel="stylesheet">
	<link href="<?= base_url() ?>share/color/default.css" rel="stylesheet">
    <style>
    </style>
</head>

<body data-spy="scroll">
        <?php require('template/menu.php'); ?>
        <section id="quote" class="home-section text-center">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2" >
                    <div class="section-heading req-quote">
                        <h2>Your profile</h2>
                        <p></p>
                        
                        <div class="article" style="text-align: left;" >
                        
                                <div class="form-group">
                                    <label for="employee_no">employee_no :  <?php echo form_error('employee_no'); ?></label>
                                    <input type="text" class="form-control" id="employee_no" 
                                    placeholder="Your employee no" name="employee_no" maxlength="4" 
                                    value="<?= htmlspecialchars($_SESSION['employee_no']);?>"  disabled>
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">employee_name: </label>
                                    <input type="text" class="form-control" id="employee_name"
                                    placeholder="Your company name" name="employee_name" maxlength="80" 
                                    value="<?=  htmlspecialchars($_SESSION['employee_name']); ?>"  disabled>
                                </div>
                                <div class="form-group">
                                    <label for="employee_username">employee_username : </label>
                                    <input type="text" class="form-control" id="employee_username" 
                                    placeholder="Contact" name="employee_username" maxlength="60" 
                                    value="<?= htmlspecialchars($_SESSION['employee_username']) ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="emp_branch_name">emp_branch_name : </label>
                                    <input type="text" class="form-control" id="emp_branch_name" 
                                    placeholder="Your branch" name="emp_branch_name" maxlength="50" disabled
                                    value="<?=  htmlspecialchars($_SESSION['emp_branch_name']);?>">
                                </div>
                               
                            
                            <div class="clr"><a href="<?= base_url() ?>index.php/page_admin/edit_profile"><button type="button" class="btn btn-default">Edit</button></a></div>
                        </div>
                        
            
                    </div>
                </div>
            <div class="article">
            

                <div class="clr"></div>
                <p>&nbsp;</p>
                <div class="clr"></div>
            </div>
            </div>
        </div>
        </section>


     <!-- Core JavaScript Files -->
     <script src="<?= base_url() ?>share/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>share/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>share/js/jquery.easing.min.js"></script>	
	<script src="<?= base_url() ?>share/js/classie.js"></script>
	<script src="<?= base_url() ?>share/js/gnmenu.js"></script>
	<script src="<?= base_url() ?>share/js/jquery.scrollTo.js"></script>
	<script src="<?= base_url() ?>share/js/nivo-lightbox.min.js"></script>
	<script src="<?= base_url() ?>share/js/stellar.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>share/js/custom.js"></script>

</body>
</html>