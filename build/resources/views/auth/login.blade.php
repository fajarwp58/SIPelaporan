<!DOCTYPE html>
<html lang="en">
<head>
    <title>Site Informasi Pelaporan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/polri-favicon.png') }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Assetlogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="Assetlogin/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background: #bbced7">
        <div class="wrap-login100" style="background: #ffffff">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title">
						  <img src="{{ asset('assets/images/logo/polri-logo-fold.png') }}" alt="logo">
                </span>

                <span class="login100-form-title p-b-26">
                            Welcome
                </span>

                <div class="wrap-input100 validate-input" >
                    <input class="input100" type="text" name="login" id="login">
                    <span class="focus-input100{{ $errors->has('user_nrp') ? ' is-invalid' : '' }}" data-placeholder="NRP"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="Assetlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="Assetlogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="Assetlogin/vendor/bootstrap/js/popper.js"></script>
<script src="Assetlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="Assetlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="Assetlogin/vendor/daterangepicker/moment.min.js"></script>
<script src="Assetlogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="Assetlogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="Assetlogin/js/main.js"></script>

</body>
</html>
