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
                        <h2>Receive </h2>
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
                                    <th>quote no</th>
                                    <th>company</th>
                                    <th>total + tex rate</th>
                                    <th>status</th>
                                    <th colspan="3">option</th>
                                </tr>
                                <?php
                                if(empty($quotes) || $quotes[0]->quote_id ==null){
                                    echo "<td colspan='7'>don't have quote</td>";
                                }else{
                                    foreach ($quotes as $key => $value) {
                                        
                                        echo "<tr>";
                                        echo "<td><a href='".base_url()."index.php/page/gen_pdf/{$value->quote_no}'>{$value->quote_no}</a></td>";
                                        echo "<td>".htmlspecialchars($value->customer_company)."</td>";
                                        echo "<td>".htmlspecialchars($value->total)."</td>";
                                        switch($value->quote_status){
                                            case 0:
                                                echo "<td>not vertify</td>"; 
                                                echo "<td>";
                                                echo "<form action='".base_url()."index.php/page_admin/changeStatusQuote_quote_to_working' method='post'>";
                                                echo "<input type='hidden' name='qid' value='{$value->quote_id}'>";
                                                echo "<button type='submit' onclick='return confirm(`Are you sure for change status to working?`)'>"."<span class='glyphicon glyphicon-ok'></span>"."</button>";
                                                
                                                echo "</form>";
                                                echo "</td>";
                                            break;
                                            case 1: echo "<td><a href='".base_url()."index.php/page_admin/working/{$value->quote_id}'>working</a></td>"; break;
                                            case 2: echo "<td><a href='".base_url()."index.php/page_admin/recieve_detail/{$value->quote_id}'>receive</a></td>"; break;
                                        }
                                        
                                        //echo "<td><span class='glyphicon glyphicon-pencil'></span></td>";
                                        echo "<td>
                                                <form action='".base_url()."index.php/page_admin/delete_quote_recive' method='post'>
                                                <input type='hidden' name='qid' value='{$value->quote_id}'>
                                                <button  name='submit' type='subbmit' onclick='return confirm(`Are you want to delete {$value->quote_no}?`)'><span class='glyphicon glyphicon-trash'></span></button>
                                                </form>
                                            </td>";
                                        
                                        echo "</tr>";
                                        
                                    }
                                }
                                ?>


                            </table>
                                
                            
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
        <ul class="pagination" id="pageing">
    
        </ul>
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
    <script>
        $(document).ready(()=>{
            let html="";
            for(i =1;i<= <?= $numpage ?>;i++){
                if(<?= $page ?> ==  i){
                    html = `<li class="disabled"><a href="#">${i}</a></li>`;
                }else{
                    html = `<li><a href="<?= base_url() ?>index.php/page_admin/recive/${i}">${i}</a></li>`;
                }
                $("#pageing").append(html);
            }

            
        })
    </script>
</body>
</html>