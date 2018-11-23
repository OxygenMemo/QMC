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
                        <h2>product </h2>
                        <br>
                        <div class="article" style="text-align:left;" >
                                    <?php
                                        foreach ($category as $key => $value) {
                                            echo "<h3>{$value->product_category_name} 
                                            <a href='".base_url()."index.php/page_admin/addproduct/{$value->product_category_id}'><span class='glyphicon glyphicon-plus'></span></a>
                                            </h3>";
                                        ?>
                                    <table class="table">
                                        <tr>
                                            <th>product_no</th>
                                            <th>product_name</th>
                                            <th>product_price</th>
                                            <th colspan="2">option</th>
                                        </tr>
                                    <?php
                                        foreach ($value->products as $row) {
                                            echo "<tr>";
                                            echo "<td>".htmlspecialchars($value->product_category_no.$row->product_no)."</td>";
                                            echo "<td>".htmlspecialchars($row->product_name)."</td>";
                                            echo "<td>".htmlspecialchars($row->product_price)."</td>";
                                            echo "<td><a href='".base_url()."index.php/page_admin/edit_product/{$row->product_id}'><button><span class='glyphicon glyphicon-pencil'></span></button></a></td>";
                                            echo "<td>
                                                <form method='post' action='".base_url()."index.php/page_admin/change_product_status_remove'>
                                                    <input type='hidden' name='pid' value='{$row->product_id}'/>
                                                    <button onclick='return confirm(`you want to delete ".htmlspecialchars($row->product_no)." ?`)' type='submit'><span class='glyphicon glyphicon-trash'></span></button>
                                                </form>
                                                </td>";
                                            echo "</tr>";
                                        }
                                        
                                        echo "</table>";
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