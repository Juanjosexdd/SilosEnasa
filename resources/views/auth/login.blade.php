
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>ENASA</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('vendores/images/logo.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('vendores/images/logo.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendores/images/logo.png')}}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('vendores/styles/core.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendores/styles/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('vendores/styles/style.css')}}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
    <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="{{asset('vendores/images/logo.png')}}" alt="" width="250"></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Cargando...
			</div>
		</div>
	</div>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="{{ route('login') }}">
					<img src="{{asset('vendores/images/logo.png')}}" width="70" alt="">
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendores/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Iniciar Sesión</h2>
						</div>
						<form  method="POST" action="{{ route('login') }}">
                            @csrf
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Usuario">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Recordarme</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										
										<input class="btn btn-primary btn-lg btn-block" type="submit" value="Iniciar Sesión">
										
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="{{asset('vendores/scripts/core.js')}}"></script>
	<script src="{{asset('vendores/scripts/script.min.js')}}"></script>
	<script src="{{asset('vendores/scripts/process.js')}}"></script>
	<script src="{{asset('vendores/scripts/layout-settings.js')}}"></script>
</body>
</html>