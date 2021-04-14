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
	<link rel="stylesheet" href="{{ asset('fonts/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	<title>Cryptomatix - Dashboard</title>
</head>
<body class="h-100 dashboard">
	<div id="sidebar">
		<div class="logo">
			<a href="#"><img src="{{ asset('img/logo.png') }}" alt=""></a>
		</div>
		<ul class="menu">
			<li class="{{ (request()->is('/')) ? 'mm-active' : '' }}"><a href="{{ route('index') }}" class="has-arrow"><i class="flaticon-381-networking"></i> <span class="navText">Dashboard</span></a></li>
			<li class="{{ (request()->is('kyc*')) ? 'mm-active' : '' }}"><a href="#" class="has-arrow"><i class="flaticon-381-notepad"></i> <span class="navText">KYC</span></a>
				<ul class="subMenu">
					<li><a href="{{ route('kyc.create') }}">Create</a></li>
					<li><a href="#">List</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="flaticon-381-settings-2"></i> <span class="navText">Activity</span></a></li>
		</ul>
		<div class="footerNav">
			<p><b>Mophy Payment Admin Dashboard</b><br>© 2021 All Rights Reserved</p>
			<p>Made with ♥ by DexignZone</p>
		</div>
	</div>

	<div id="content">

		<x-widgets.header />

		<main>
			<div class="container-fluid">

                {{ $slot }}

			</div>
		</main>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</body>
</html>
