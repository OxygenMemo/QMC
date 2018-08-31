<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
		<style>
		/*    --------------------------------------------------
		:: Login Section
		-------------------------------------------------- */
	#login {
		padding-top: 50px
	}
	#login .form-wrap {
		width: 30%;
		margin: 0 auto;
	}
	#login h1 {
		color: #F43F00;
		font-size: 18px;
		text-align: center;
		font-weight: bold;
		padding-bottom: 20px;
	}
	#login .form-group {
		margin-bottom: 25px;
	}
	#login .checkbox {
		margin-bottom: 20px;
		position: relative;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		-o-user-select: none;
		user-select: none;
	}
	#login .checkbox.show:before {
		content: '\e013';
		color: #1fa67b;
		font-size: 17px;
		margin: 1px 0 0 3px;
		position: absolute;
		pointer-events: none;
		font-family: 'Glyphicons Halflings';
	}
	#login .checkbox .character-checkbox {
		width: 25px;
		height: 25px;
		cursor: pointer;
		border-radius: 3px;
		border: 1px solid #ccc;
		vertical-align: middle;
		display: inline-block;
	}
	#login .checkbox .label {
		color: #F43F00;
		font-size: 13px;
		font-weight: normal;
	}
	#login .btn.btn-custom {
		font-size: 14px;
		margin-bottom: 20px;
	}
	#login .forget {
		font-size: 13px;
		text-align: center;
		display: block;
	}

	/*    --------------------------------------------------
		:: Inputs & Buttons
		-------------------------------------------------- */
	.form-control {
		color: #6d6d6d;
	}
	.btn-custom {
		color: #fff;
		background-color: #F43F00;
	}
	.btn-custom:hover,
	.btn-custom:focus {
		color: #fff;
	}

	/*    --------------------------------------------------
		:: Footer
		-------------------------------------------------- */
	#footer {
		color: #6d6d6d;
		font-size: 12px;
		text-align: center;
	}
	#footer p {
		margin-bottom: 0;
	}
	#footer a {
		color: inherit;
	}
	#icon {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
	}
</style>
</head>
<body>


<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
				
        	    <div class="form-wrap">
					
				<img id="icon" src="<?= base_url() ?>share/img/logo-mc.gif" >
				<h1>Welcome to QMCal admin</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="username" maxlength="20" required>
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" maxlength="20" required>
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
						</div>
						<?php 
							if(!empty($error)){
								echo "<p>".$error."</p>";
							}
						?>
                        <input type="submit" name="btn_login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in" >
                    </form>
                    
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				
				
			</div>
		</div> <!-- /.modal-content -->
	</div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Page © - 2016</p>
                
            </div>
        </div>
    </div>
</footer>
	<script>
	function showPassword() {
    
    var key_attr = $('#key').attr('type');
    
    if(key_attr != 'text') {
        
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
        
    } else {
        
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
        
    }
    
}
	</script>
</body>
</html>