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
                                
                                <table class="table">
                                    
                                    <tr>
                                        <th width="100px">type</th>
                                        <th width="500px">description</th>
                                        <th width="120px">unit price</th>
                                        <th width="50px">quantity</th>
                                        <th width="100px">amount</th>
                                        <th width="100px">option</th>
                                    </tr>
                                    

                                        <tr  >
                                            <td>
                                                <select onchange="change_category(this)" name="category[]" required>
                                                    <option class="category" value="null">กรุณาเลือก</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select onchange="chenge_product(this)" name="product[]" id="" required>
                                                    <option class="product" value="">----------- กรุณาเลือก -----------</option>
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
                                <p>กรุณาตรวจสอบรายการให้พูกต้องก่อนยืนยัน</p>
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
            $(document).ready(function(){
                
                    $.get("http://localhost:8080/QMC/index.php/api/product_catagories", function(data, status){
                    console.log("Data: " + data + "\nStatus: " + status +"\ndatal "+data.length);
                    let catagory = JSON.parse(data);
                        let html2 ="";
                    for(i=0;i<catagory.length;i++){
                        html2+= `<option value='${catagory[i].product_category_id}'>${catagory[i].product_category_name}</option>`;
                    }
                    
                    $(".category").after(html2);

                    $("#btnadd").click(function(){
                        let html = `<tr>
                                            <td>
                                                <select onchange="change_category(this)" name="category[]" required>
                                                    <option class="category" value="null">กรุณาเลือก</option>
                                                    ${html2}
                                                </select>
                                            </td>
                                            <td>
                                                <select onchange="chenge_product(this)" name="product[]" id="" required>
                                                    <option class="product" value="">----------- กรุณาเลือก -----------</option>
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
                                                <input type="button" onclick="remove_product(this)" value="remove">
                                            </td>
                                        </tr>`;
                        $("#product-list").before(html);
                        
                    });

                });
                
            });
            function change_category(tag)
            {
                
                $.get("<?= base_url() ?>index.php/api/product_in_catagories/"+$(tag).val(), function(data, status){
                    //console.log("Data: " + data + "\nStatus: " + status +"\ndatal "+data.length);
                    let product = JSON.parse(data);
                        let tem ="";
                    for(i=0;i<product.length;i++){
                        tem+= `<option value='${product[i].product_id}'>${product[i].product_category_id+product[i].product_no+" "+product[i].product_name}</option>`;
                    }
                    let description = ` <select onchange="chenge_product(this)" name="product[]" id="">${tem}</select>`;
                    
                    $(tag).parent().next().html(description);
                    chenge_product($(tag).parent().next().children())
                    
                });
            }
            function chenge_product(tag)
            {
                
                $.get("<?= base_url() ?>index.php/api/getPriceProduct/"+$(tag).val(), function(data, status){
                    //console.log("Data: " + data + "\nStatus: " + status +"\ndatal "+data.length);
                    let product = JSON.parse(data);
                        
                    let description = product[0].product_price;
                    
                    $(tag).parent().next().html("<p >"+description+"</p>");
                    
                    change_quantity($(tag).parent().next().next().children());
                });
                //$(tag).parent().next().html(description);
            }
            function change_quantity(tag)
            {
                let tag_unitprice = $(tag).parent().prev();
                let unitp=$(tag_unitprice).children().html();
                //alert(unitp)
                let amount = unitp * $(tag).val();
                //alert(amount)
                $(tag).parent().next().html(`<p class='amount'>${amount}</p>`)
                //$(tag).parent().next().html("<p>"+description+"</p>");  
                total() 
            }
            function remove_product(tag)
            {
                $(tag).parent().parent().remove();
                total()
            }
            function total()
            {
                let total=0;
                $(".amount").each(function() {
                    total +=parseInt($(this).html());
                });
                
                let tex_rate = Math.round(total*0.07);
                $('#tex').html("tex (7%): "+tex_rate);
                $("#sub_total").html("sub total : "+total);
                $('#total').html("total : "+(tex_rate+total))
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