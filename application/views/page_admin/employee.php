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
                        <h2>Employee </h2>
                        <p>การแก้ใขข้อมูล Employee นั้นจะมีผลต่อเมื่อมีการ Login อีกรอบ</p>
                        
                        <a href="<?= base_url() ?>index.php/page_admin/add_employee">
                            <button type="button" class="btn">
                            <span class="glyphicon glyphicon-plus"></span> add employee
                          </button>
                        </a>
                        <div class="article" style="text-align: left;" >
                        <table class="table">
                            
                                <tr>
                                    <th>no</th>
                                    <th>name</th>
                                    <th>branch</th>
                                    <th>username</th>
                                    <th>status</th>
                                    
                                    <th colspan="2">option</th>
                                </tr>
                                <?php
                                    foreach ($emps as $key => $value) {
                                       
                                            echo "<tr>";
                                            echo "<td>".htmlspecialchars($value->employee_no)."</td>";
                                            echo "<td>".htmlspecialchars($value->employee_name)."</td>";
                                            echo "<td>".htmlspecialchars($value->emp_branch_name)."</td>";
                                            echo "<td>".htmlspecialchars($value->employee_username)."</td>";
                                            if($value->employee_status == 1)
                                                echo "<td>staying</td>";
                                            else
                                                echo "<td>quit</td>";
                                            
                                            echo "<td><a href=".base_url() ."index.php/page_admin/edit_employee/". $value->employee_id ."><span class='glyphicon glyphicon-pencil'></span></a></td>";
                                            
                                            echo "</tr>";
                                        }
                                        
                                        
                                    

                                ?>


                            
                                
                            
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