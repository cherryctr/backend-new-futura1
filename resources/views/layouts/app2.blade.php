
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

@include('header.headcss')
</head>
@yield('content')
@include('footer.scriptjs')
</html>
