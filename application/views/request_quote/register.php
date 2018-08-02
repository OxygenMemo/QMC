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
                        <h2>Request Quote</h2>
                        <p>กรุณากรอกข้อมูลของท่าให้ครบถ้วน</p>
                        <p>Your email : <?php echo $_SESSION['email'] ?></p>
                        <div class="article" style="text-align: left;" >
                        <?php echo form_open(base_url()."index.php/page/register"); ?>
                                <div class="form-group">
                                    <label for="company_name">Company name :</label>
                                    <input type="text" class="form-control" id="company_name" placeholder="Your company name" name="company_name" maxlength="80" required>
                                </div>
                                <div class="form-group">
                                    <label for="company_code">Company code : <sub>(ตัวอักษรย่อของบริษัท 4 ตัว)</sub></label>
                                    <input type="text" class="form-control" id="company_code" placeholder="Your company code" name="company_code" maxlength="4" required>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact : </label>
                                    <input type="text" class="form-control" id="contact" placeholder="Contact" name="contact">
                                </div>
                                <div class="form-group">
                                    <label for="branch">branch : </label>
                                    <input type="text" class="form-control" id="branch" placeholder="Your branch" name="branch">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address: </label>
                                    <textarea style="resize: vertical; " class="form-control" id="address" placeholder="Your company address" name="company_code" maxlength="150" required></textarea>
                                </div>
                                <div class="form-inline" >
                                        <label for="sel1">Select list (select one) : </label> <br>
                                        <select class="form-control" style="width:30%" id="sel1">
                                          <option selected>กรุณาเลือก</option>
                                          <?php
                                            foreach ($cities->result() as $key => $value) {
                                                echo "<option value='{$value->city_id}'>{$value->city_name_th}</option>";
                                            }
                                          ?>
                                          
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="postcode">postcode : </label>
                                        <input type="text" class="form-control" id="postcode" placeholder="Your company postcode" name="postcode" required maxlength="5">
                                </div>
                                <div class="form-group">
                                        <label for="tex_id">tex id : </label>
                                        <input type="text" class="form-control" id="tex_id" placeholder="Your company tex id" name="tex_id" required maxlength="12">
                                </div>
                                <div class="form-group">
                                        <label for="mobile">mobile : </label>
                                        <input type="text" class="form-control" id="mobile" placeholder="Your company mobile" name="mobile" required maxlength="12">
                                </div>
                                <div class="form-group">
                                        <label for="fax">Fax : </label>
                                        <input type="text" class="form-control" id="fax" placeholder="Your company fax" name="fax" required maxlength="12">
                                </div>
                                
                                <button type="submit" class="btn btn-default">Submit</button>
                               
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