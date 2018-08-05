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
                        <p>Your email : <?php echo  htmlspecialchars($_SESSION['email']) ?></p>
                        <div class="article" style="text-align: left;" >
                        <?php echo form_open(base_url()."index.php/page/register"); ?>
                                <div class="form-group">
                                    <label for="company_name">Company name : <?php echo form_error('company_name'); ?></label>
                                    <input type="text" class="form-control" id="company_name"
                                    placeholder="Your company name" name="company_name" maxlength="80" required
                                    value="<?php echo set_value('company_name'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="company_code">Company code : <sub>(ตัวอักษรย่อของบริษัท 4 ตัว)</sub> <?php echo form_error('company_code'); ?></label>
                                    <input type="text" class="form-control" id="company_code" 
                                    placeholder="Your company code" name="company_code" maxlength="4" required
                                    value="<?php echo set_value('company_code');?>">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact :  <?php echo form_error('contact'); ?></label>
                                    <input type="text" class="form-control" id="contact" 
                                    placeholder="Contact" name="contact" maxlength="60" required
                                    value="<?php echo set_value('contact');?>">
                                </div>
                                <div class="form-group">
                                    <label for="branch">branch : <?php echo form_error('branch'); ?></label>
                                    <input type="text" class="form-control" id="branch" 
                                    placeholder="Your branch" name="branch" maxlength="50" required
                                    value="<?php echo set_value('branch');?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address: <?php echo form_error('address'); ?></label>
                                    <textarea style="resize: vertical; " class="form-control" id="address" 
                                    placeholder="Your company address" name="address" maxlength="150" required><?php echo set_value('address');?></textarea>
                                </div>
                                <div class="form-inline" >
                                        <label for="city_id">Select list (select one) : <?php echo form_error('city_id'); ?></label> <br>
                                        <select class="form-control" style="width:30%" name="city_id" id="city_id" require>
                                          <option value="" selected>กรุณาเลือก</option>
                                          <?php
                                            foreach ($cities->result() as $key => $value) {
                                                echo "<option value={$value->city_id}>{$value->city_name_th}</option>";
                                            }
                                          ?>
                                          
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="postcode">postcode : <?php echo form_error('postcode'); ?></label>
                                        <input type="text" class="form-control" id="postcode"
                                         placeholder="Your company postcode" name="postcode" required maxlength="5"
                                         value="<?php echo set_value('postcode');?>">
                                </div>
                                <div class="form-group">
                                        <label for="tex_id">tex id : <?php echo form_error('tex_id'); ?></label>
                                        <input type="text" class="form-control" id="tex_id" 
                                        placeholder="Your company tex id" name="tex_id" required maxlength="12"
                                        value="<?php echo set_value('tex_id');?>">
                                </div>
                                <div class="form-group">
                                        <label for="tel">tel : <?php echo form_error('tel'); ?></label>
                                        <input type="text" class="form-control" id="tel" 
                                        placeholder="Your company tel" name="tel" required maxlength="12"
                                        value="<?php echo set_value('tel');?>">
                                </div>
                                <div class="form-group">
                                        <label for="mobile">mobile : <?php echo form_error('mobile'); ?></label>
                                        <input type="text" class="form-control" id="mobile" 
                                        placeholder="Your company mobile" name="mobile" required maxlength="12"
                                        value="<?php echo set_value('mobile');?>">
                                </div>
                                <div class="form-group">
                                        <label for="fax">Fax : <?php echo form_error('fax'); ?></label>
                                        <input type="text" class="form-control" id="fax" 
                                        placeholder="Your company fax" name="fax" required maxlength="12"
                                        value="<?php echo set_value('fax');?>">
                                </div>
                                
                                <button name="submit" type="submit" class="btn btn-default">Submit</button>
                               
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