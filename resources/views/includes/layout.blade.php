<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
	<script type="text/javascript" src="{{ url('js/app.js') }}"></script>
</head>
<body class="jAdmin sticky-menu">

	<div id="jWrap">
		@guest
			@yield('form-login')
		@else
			Inside
		@endguest		
	</div>

</body>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.3'><\/script>".replace("HOST", location.hostname));
//]]>
</script>
</html>