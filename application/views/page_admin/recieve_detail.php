<?php if(empty($qid))die();  ?>
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
                        
                        <h2>recive detail </h2>
                        <p></p>
                        
                        <div class="article" style="text-align: left;" >
                            <div  class="col-sm-7">
                                <fieldset>
                                <legend><h3><a href='<?= base_url() ?>index.php/page/gen_pdf/<?= $recieve[0]->quote_no ?>'><?= $recieve[0]->quote_no ?></a></h3></legend>
                                Code : <p><?= htmlspecialchars($recieve[0]->customer_code) ?></p>
                                Company : <p><?= htmlspecialchars($recieve[0]->customer_company) ?></p>
                                tex id :<p><?= htmlspecialchars($recieve[0]->customer_texid) ?></p>
                                Contact : <p><?= htmlspecialchars($recieve[0]->customer_contact) ?></p>
                                Branch : <p><?= htmlspecialchars($recieve[0]->customer_branch) ?></p>
                                Email :<p><?= htmlspecialchars($recieve[0]->customer_email) ?></p>
                                address :<p><?= htmlspecialchars($recieve[0]->customer_address)." ".htmlspecialchars($recieve[0]->customer_postcode) ?></p>
                                tel :<p><?= htmlspecialchars($recieve[0]->customer_tel) ?></p>
                                mobile :<p><?= htmlspecialchars($recieve[0]->customer_mobile) ?></p>
                                fax :<p><?= htmlspecialchars($recieve[0]->customer_fax) ?></p>
                                
                                
                                
                                </fieldset>
                            </div>
                            <div class="col-sm-5">
                                
                                <fieldset>
                                <legend><a href="<?= $recieve[0]->recive_certificate_url ?>"><h3>certificate</h3></a></legend>
                                    expiry :<p><?= htmlspecialchars($recieve[0]->recive_certificate_expiry) ?></p>
                                    issue :<p><?= htmlspecialchars($recieve[0]->recive_certificate_issue) ?></p>
                                </fieldset>
                            </div>
                                
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