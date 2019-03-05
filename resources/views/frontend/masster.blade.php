<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="{{ asset('') }}">
	<title>Nội thất</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="public/frontend/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/frontend/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/frontend/css/style.css">
	
</head>
<body>
	@include('frontend.header')
	<main>
		@yield('contentFront')
		}
	</main>
	<footer>
		@include('frontend.footer')	
	</footer>
</body>
<script src="public/frontend/js/jquery-3.2.1.min.js"></script>
<script src="public/frontend/bootstrap/js/bootstrap.min.js"></script>
</html>