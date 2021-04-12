<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}"/>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<title>Cryptomatix</title>
</head>
<body class="h-100">
	<div class="container h-100">
		<div class="row">
			<div class="col-lg-12 col-md-4 text-center">
				<img class="logoMessage" src="{{ asset('img/logo.png') }}" alt="">
			</div>
			<div class="col-lg-12 col-md-8">
				{{ $slot }}
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
