<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>T&apos;Gallery</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../adminlte/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../adminlte/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/../adminlte/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>Login</b> APEL</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="site/login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!--<div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!--<div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <!--<p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>-->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/../adminlte/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/../adminlte/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/../adminlte/assets/dist/js/adminlte.min.js"></script>

	<script>
		$(function(){ 
			$(document).ready(function() {
				window.history.pushState(null, "", window.location.href);        
				window.onpopstate = function() {
					window.history.pushState(null, "", window.location.href);
				};
				
				$('#username').keyup(function(){this.value = this.value.toUpperCase();});
				document.getElementById("username").focus();
			});
				
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
				$('#password').focus(); 
				if ($('#username').val() === '') {
					swal("Warning!", "Input Username", "warning");
					return false;
				}
				if ($('#password').val() === '') { 
					swal("Warning!", "Input Password", "warning");
					return false;
				}
				
				$.ajax({
					url: $(this).attr('action'),
					data: $(this).serialize(),
					dataType: 'json',
					type: 'POST',
					cache: false,
					beforeSend: function() {
						document.getElementById("login").disabled = true;
						$('#loader').show();
					},
					success: function(data) { 
						console.log("dosis3a_login: "+ data.login); 
						console.log("dosis3a_login_msg: "+ data.msg);
						//console.log("dosis3a_update_password: "+ data.dosis3a_update_password);
						if (data.login==1) { 
								window.location = "<?php echo Yii::app()->getBaseUrl(true); ?>";
						} else {
							alert("Warning!", data.msg, "warning");
							window.location = "<?php echo Yii::app()->getBaseUrl(true); ?>";
							//$('#loader').hide();
							//document.getElementById("login").disabled = false;
						}
					}
					
				});
				return false;
			});
		});
	</script>
</body>
</html>
