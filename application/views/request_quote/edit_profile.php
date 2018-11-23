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
                        <p>Your email : <?php echo  htmlspecialchars($_SESSION['customer_email']) ?></p>
                        <?php echo form_open(base_url()."index.php/page/edit_profile"); ?>
                        
                        <div class="article" style="text-align: left;" >

                                <div class="form-group">
                                    <label for="customer_code">Company code : <sub>(ตัวอักษรย่อของบริษัท 4 ตัว)</sub> <?php echo form_error('customer_code'); ?></label>
                                    <input type="text" class="form-control" id="customer_code" 
                                    placeholder="Your company code" name="customer_code" maxlength="4" 
                                    value="<?= htmlspecialchars($_SESSION['customer_code']);?>"  />
                                </div>
                                <div class="form-group">
                                
                                    <label for="company_name">Company name : </label>
                                    <input type="text" class="form-control" id="customer_company"
                                    placeholder="Your company name" name="customer_company" maxlength="80" 
                                    value="<?= htmlspecialchars($_SESSION['customer_company']); ?>"  />
                                </div>
                                <div>
                                    <label for="customer_contact">Contact : </label>
                                    <input type="text" class="form-control" id="customer_contact" 
                                    placeholder="Contact" name="customer_contact" maxlength="60" 
                                    value="<?= htmlspecialchars($_SESSION['customer_contact']) ?>">
                                </div>
                                <div class="form-group">
                                    <label for="customer_branch">branch : </label>
                                    <input type="text" class="form-control" id="customer_branch" 
                                    placeholder="Your branch" name="customer_branch" maxlength="50" 
                                    value="<?=  htmlspecialchars($_SESSION['customer_branch']);?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address: </label>
                                    <textarea style="resize: vertical; " class="form-control" id="customer_address" 
                                    placeholder="Your company address" name="customer_address" maxlength="150" 
                                    ><?= htmlspecialchars($_SESSION['customer_address']) ?></textarea>
                                </div>

                                <div class="form-group">
                                        <label for="tex_id">tex id : <?php echo form_error('tex_id'); ?></label>
                                        <input type="text" class="form-control" id="customer_texid" 
                                        placeholder="Your company tex id" name="customer_texid" required maxlength="12"
                                        value="<?= htmlspecialchars($_SESSION['customer_texid']);?>" >
                                </div>
                                <div class="form-group">
                                        <label for="tel">tel : <?php echo form_error('customer_tel'); ?></label>
                                        <input type="text" class="form-control" id="customer_tel" 
                                        placeholder="Your company tel" name="customer_tel" required maxlength="12"
                                        value="<?= htmlspecialchars($_SESSION['customer_tel']);?>" >
                                </div>
                                <div class="form-group">
                                        <label for="mobile">mobile : <?php echo form_error('mobile'); ?></label>
                                        <input type="text" class="form-control" id="customer_mobile" 
                                        placeholder="Your company mobile" name="customer_mobile" required maxlength="12"
                                        value="<?= htmlspecialchars($_SESSION['customer_mobile']);?>" >
                                </div>
                                <div class="form-group">
                                        <label for="fax">Fax : <?php echo form_error('fax'); ?></label>
                                        <input type="text" class="form-control" id="customer_fax" 
                                        placeholder="Your company fax" name="customer_fax" required maxlength="12"
                                        value="<?= htmlspecialchars($_SESSION['customer_fax']);?>" >
                                </div>
                                

                               
                            
                            <div class="clr"><input type="submit" name="btn_edit" value="save" class="btn btn-info"/></div>
                        </div>
                        </form>
            
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