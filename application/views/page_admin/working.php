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
                        <h2>work order status </h2>
                        <!--
                        <form class="form-inline" action="/action_page.php">
                            <div class="form-group">
                                <label for="search">search : </label>
                                <input type="text"  class="form-control" name="search" id="search">
                            </div>
                            
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </form> 
                        -->
                        <br>
                       
                        <div class="article" style="text-align: left;" >
                            <table  class="table">
                                
                                <tr>
                                    <th>detail</th>
                                    <th>status</th>
                                    <th>Employee</th>
                                    <th>option</th>
                                </tr>
                                <?php
                                    if(!empty($workorder)){
                                        foreach ($workorder as $key => $value) {
                                            
                                            echo "<tr>";
                                            echo "<td>".htmlspecialchars($value->workorder_detail_name)."</td>";
                                            $status =$value->workorder_status == 0 ? "incomplete" : "complete" ;
                                            echo "<td>{$status}</td>";
                                            if(empty($value->employee_id)){ //dont have emp
                                                echo "<td><form method='post' action='".base_url()."index.php/page_admin/addEmptoWorking'>";
                                                echo "<input type='hidden' value='$qid' name='qid' />";
                                                echo "<input type='hidden' value='$value->workorder_id' name='woid' />";
                                                echo "<select name='empid' required>";
                                                echo "<option value=''>--- pleaes select employee ---</option>";
                                                foreach ($employee as $key => $r) {
                                                    echo "<option value='{$r->employee_id}'>".$r->employee_name."</option>";
                                                }
                                                echo "</select>";
                                                echo "<input onclick='return confirm(`you confirm ?`)' type=submit value=select>";
                                                echo "</form></td>"; //employee
                                            }else{
                                                echo "<td>$value->employee_name</td>";
                                            }
                                            
                                            echo "<td>";
                                            if($value->workorder_status == 0)
                                            {
                                                echo "<form action='".base_url()."index.php/page_admin/admin_wod_complete' method='post'>";
                                                echo "<input type='hidden' name='wodid' value='{$value->workorder_id}'>";
                                                echo "<input type='hidden' name='qid' value='{$qid}'>";
                                                
                                                echo "<button type='submit' onclick='return confirm(`Are you want to change status to complete ?`)'><span class='glyphicon glyphicon-ok'></span></button>";
                                                
                                                echo "</form>";
                                            }else{
                                                /*
                                                echo "<form action='".base_url()."index.php/page_admin/admin_wod_not_complete' method='post'>";
                                                echo "<input type='hidden' name='wodid' value='{$value->workorder_id}'>";
                                                echo "<input type='hidden' name='qid' value='{$qid}'>";
                                                echo "<button type='submit' onclick='return confirm(`Are you want to change status to not complete ?`)'><span class='glyphicon glyphicon-remove'></span></button>";
                                                
                                                echo "</form>";
                                                */
                                            }
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    }else{
                                        echo "<tr>";
                                        echo "<td colspan='4' style='text-align:center'><p>don't have workorder</p></td>";
                                        echo "</tr>";
                                    }

                                ?>


                            </table>
                                
                            <button onclick="window.history.back();">back</button>
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