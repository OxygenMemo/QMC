<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>share/img/favicon.ico" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QMC-QAL Measurement calibration Laboratory-THAILAND</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                        <h2>Edit Employee</h2>
                        <p></p>
                        
                        <div class="article" style="text-align: left;" >
                        
                                      
                        <form method="post" action="<?= base_url() ?>index.php/page_admin/new_password/<?= $eid ?>" onsubmit="return formvalid()">
                            <input type="hidden" name="employee_id" value="<?= $eid ?>">
                                <div class="form-group">
                                    <label for="employee_name">name: </label>
                                    <input type="text" class="form-control" id="employee_name"
                                    placeholder="employee name" name="employee_name" maxlength="70" disabled 
                                    value="<?= $employee[0]->employee_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">username: </label>
                                    <input type="text" class="form-control" id="employee_name"
                                    placeholder="employee name" name="employee_name" maxlength="70" disabled 
                                    value="<?= $employee[0]->employee_username ?>">
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">password: </label>
                                    <input type="password" class="form-control" id="password"
                                    placeholder="password" name="password" maxlength="20"  required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="employee_name">password confirm :  </label>
                                    <input type="password" class="form-control" id="repassword"
                                    placeholder="password" name="repassword" maxlength="20" required
                                    >
                                    
                                </div>
                                <p style="color: red" id="error"></p>
                                
                                
                                
                                
                                
                                <button name="submit" type="submit" class="btn btn-default" value="ok">save</button>
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

    <script>
        $(document).ready(function(){
            
        });
        function formvalid(){
                if($('#repassword').val() == $('#password').val()){
                    return true;
                }
                $('#error').html("password don't match");
                return false;
        }    
        
    </script>
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