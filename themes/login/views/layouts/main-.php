<!DOCTYPE html>

<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">

        <title>Portal Amil by BAZNAS Jawa Barat</title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/favicon.png">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/icon180.png" sizes="180x180">
        
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/plugins.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/themes.css">
		
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/vendor/modernizr.min.js"></script>
		
		 <style>
		.dev-page{visibility: hidden;}
		#result {
			padding-left: 18px;
			display: none;
			font-size: 12px;
		}
		
		.body-login {
			background: #011842;
			height: 100%;
			width: 100%;
			display: none;
			color: #fff;
		}

		.body-lock {
			background: url(<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/backgrounds/opening.jpg) no-repeat center;
			height: 100%;
			font-family: "Segoe UI", Verdana, Tahoma,Helvetica,sans-serif;
		}
		
		.body-lock .dateandtime .hour-time {
			font-size: 10em;
			font-weight: lighter;
			height: 160px;
		}

		.body-lock .dateandtime .date-time {
			font-size: 3em;
			font-weight: lighter;
			margin-left: 5px;
		}
		
		.body-lock .dateandtime {
			color: #fff;
			position: absolute;
			bottom: 10%;
			left: 3%;
			display: inline-block;
		}
		</style>
    </head>
    <body>
        <!-- Login Alternative Row -->
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div id="login-alt-container">
                        <!-- Title -->
                        <h1 class="push-top-bottom">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/favicon.png" > <strong>PORTAL</strong> AMIL<br>
                            <small>by BAZNAS Jawa Barat</small>
                        </h1>
                        <!-- END Title -->

                        <!-- Key Features -->
                        <ul class="fa-ul text-muted">
                            <li><i class="fa fa-facebook-square text-white"></i> <a href="https://www.facebook.com/Baznasjawabarat" target="_blank" class="text-white"> BAZNAS Jawa Barat</a></li>
                            <li><i class="fa fa-twitter mr-10 text-white"></i> <a href="https://twitter.com/baznasjabar" target="_blank" class="text-white"> @baznasjabar</a></li>
                            <li><i class="fa fa-instagram mr-10 text-white"></i> <a href="https://www.instagram.com/baznasjabar/" target="_blank" class="text-white"> @baznasjabar</a></li>
                            <li><i class="fa fa-youtube-square mr-10 text-white"></i> <a href="https://www.youtube.com/channel/UCwvSlyxJRiiEMyoSpzU6M7A" target="_blank" class="text-white"> Baznas Jawa Barat</a></li>
							<!--
                            <li><i class="fa fa-linkedin mr-10 text-white"></i> <a href="https://www.linkedin.com/company/baznas-indonesia" target="_blank" class="text-white"> Badan Amil Zakat Nasional</a></li>
                            <li><i class="fa fa-check-square-o mr-10 text-white "></i> <a href="http://line.me/ti/p/~@baznasindonesia" target="_blank" class="text-white"> LINE @zakibaznas</a></li>
                            <li><i class="fa fa-whatsapp mr-10 text-white"></i> <a href="https://bit.ly/kontakBAZNAS" target="_blank" class="text-white"> Layanan Muzaki</a></li>
							-->
                        </ul>
                        <!-- END Key Features -->

                        <!-- Footer -->
                        <footer class="text-muted push-top-bottom">
                            <small><?php echo date('Y'); ?> &copy; <a href="http://hexasoft.id/" target="_blank">AM Software Development</a></small>
                        </footer>
                        <!-- END Footer -->
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Login Container -->
                    <div id="login-container">
                        <!-- Login Title -->
                        <div class="login-title text-left">
                            <h1><strong>Silahkan Login...</h1>
                        </div>
                        <!-- END Login Title -->

                        <!-- Login Block -->
                        <div class="block push-bit">
                            <!-- Login Form -->
                            <form action="<?php echo CController::createUrl('site/login'); ?>" method="post" id="formlogin" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                            <input type="text" name="LoginForm[username]" id="username" class="form-control input-lg" placeholder="Username" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
											<input type="password"name="LoginForm[password]" id="password"  class="form-control input-lg" placeholder="Password">
                                        </div>
                                    </div>
									<span id="result" class="text-primary"></span>
                                </div>
								
								
                                <div class="form-group form-actions">
                                    <div class="col-xs-4">
                                        <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                            <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                            <span></span>
                                        </label>
                                    </div>
									<div class="col-xs-8 text-right">
                                        <button type="button" class="btn btn-sm btn-primary" id="login"><i class="fa fa-angle-right"></i> Masuk </button> 
                                    </div>
                                </div>
								<center><i class="fa fa-spinner fa-2x fa-spin" id="loader"></i></center>
								
								<br>
                            </form>
                            <!-- END Login Form -->
                        </div>
                        <!-- END Login Block -->
                    </div>
                    <!-- END Login Container -->
                </div>
            </div>
        </div>
        <!-- END Login Alternative Row -->

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/vendor/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/app.js"></script>
        <script>
		
		$(function(){ 
		
			
			$('#loader').hide();
			
			$('#login').click(function() {				
				$('#formlogin').submit();
			});
			
			$('#username,#password').keydown(function(e) {
				if (e.keyCode === 13) {
					$('#formlogin').submit();
				}
			});
			
			$('#formlogin').submit(function() {				
				if ($('#username').val() === '') {
					$('#username').focus(); return false;
				}
				if ($('#password').val() === '') {
					$('#password').focus(); return false;
				}
				
				$.ajax({
					//url: $(this).attr('action'),
					data: $(this).serialize(),
					dataType: 'json',
					type: 'POST',
					cache: false,
					beforeSend: function() {
						$('#loader').show();
					},
					success: function(data) {
						console.log("hasil login "+data.login);
						if (data.login == null) {
							$('#loader').hide();
							$('#result').show().html('Username dan password salah !'+"\n");
						} else {
							$('#loader').hide();
							window.location = "<?php echo Yii::app()->getBaseUrl(true); ?>";
						}
					}
					
				});
				return false;
			});
		
		
		});
		
		</script>
    </body>
</html>