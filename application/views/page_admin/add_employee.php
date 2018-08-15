<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="http://measurementcalibration.com/img/favicon.ico" />

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
                        <h2>Add Employee</h2>
                        <p></p>
                        
                        <div class="article" style="text-align: left;" >
                        <?= form_open(base_url()."index.php/page_admin/add_employee"); ?>
                                
                                <div class="form-group">
                                    <label for="employee_name">name: </label>
                                    <input type="text" class="form-control" id="employee_name"
                                    placeholder="employee name" name="employee_name" maxlength="70" required >
                                </div>
                                <div class="form-group">
                                <label for="branch_id">Select Branch (select one):</label>
                                <select class="form-control" id="branch_id" name="branch_id" required>
                                    <?php 
                                    foreach ($branchs as $key => $value) {
                                        echo "<option value='{$value->emp_branch_id}'>{$value->emp_branch_name}</option>";
                                    }
                                    ?>
                                    
                                </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="employee_username">username : </label>
                                    <input type="text" class="form-control" id="employee_username" 
                                    placeholder="username" name="employee_username" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="employee_password">password : </label>
                                    <input type="text" class="form-control" id="employee_password" 
                                    placeholder="password" name="employee_password" maxlength="20" >
                                </div>
                                <div class="form-group">
                                    <label for="employee_password">password confirm : </label>
                                    <input type="text" class="form-control" id="employee_password" 
                                    placeholder="password confirm" name="employee_password" maxlength="20" >
                                </div>
                                
                               
                                <button name="submit" type="submit" class="btn btn-default" value="ok">Submit</button>
                        </form>
                            
                            <div class="clr"></div>
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