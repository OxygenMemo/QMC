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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style>
    </style>
</head>

<body data-spy="scroll">
        <?php require('template/menu.php'); ?>
        <section id="quote" class="home-section text-center">
            <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="section-heading req-quote">
                        <h2>Request quote </h2>
                        <p>กรุณากรอกข้อมูลให้ครบถ้วน</p>
                        <p>Your email : <?php echo htmlspecialchars($_SESSION['customer_email']) ?></p>
                        <div class="article" >
                        <form action="<?= base_url() ?>index.php/page/save_quote" method="post" onsubmit="return confirm('คุณต้องการยืนยันการทำรายการหรือไม่')">
                                <h3>Product : </h3>
                                <hr>
                                
                                <table class="table" ng-app="myApp" ng-controller="tableProduct">
                                
                                    <tr>
                                        <th width="100px">type</th>
                                        <th width="500px">description</th>
                                        <th width="120px">unit price</th>
                                        <th width="50px">quantity</th>
                                        <th width="100px">amount</th>
                                        <th width="100px">option {{data[0].category}}</th>
                                    </tr>
                                    
                                        <tr >
                                            <td>
                                                <select ng-model="data_send[0].category" ng-change="change_category(data_send[0].category,0)" required >
                                                    <option class="category" value="">กรุณาเลือก</option>
                                                   <option  ng-repeat="(key,category) in products.categories " class="category" value="{{products.categories[key]}}">{{ category.product_category_name}}</option> 
                                                   
                                                </select>
                                            </td>
                                            <td >
                                                <select ng-model="data_send[0].product" required>
                                                    <option class="product" value="">----------- กรุณาเลือก -----------</option>
                                                    <option class="product" ng-repeat="x in products[0]">{{x.product_id}}</option>
                                                    
                                                </select>
                                            </td>
                                            <td>
                                                <p id="unitprice">0.00</p>
                                            </td>
                                            <td>
                                                <input onkeyup="change_quantity(this)" name="quantity[]" value="1"  width="50" type="number" required min="1" max="100">
                                            </td>
                                            <td>
                                                <p class="amount">0.00</p>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr id="product-list" style="margin-top: 30px">
                                            
                                            <td colspan="6" style="text-align: center">
                                                <input id="btnadd" type="button" value="add">
                                            </td>
                                        </tr>
                                        <tr >
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td id="sub_total">total : 0.00</td>
                                            <td></td>
                                        </tr>
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td id="tex">tex (7%): 0.00</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td id="total">total : 0.00</td>
                                            <td></td>
                                        </tr>
                                       
                                </table>

                                <hr>
                                <p>กรุณาตรวจสอบรายการให้ถูกต้องก่อนยืนยัน</p>
                                <br>
                                <input id="submit" type="submit" value="submit">
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
            var app = angular.module('myApp', []);
            app.controller('tableProduct', function($scope, $http) {
                $scope.products = <?= json_encode($products) ?>;

                $scope.gg=1;

                $scope.change_category = function(category,index){
                    
                    //console.log(data.products);
                    $scope.products[0] = JSON.parse(category).products;
                }
                
            });
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