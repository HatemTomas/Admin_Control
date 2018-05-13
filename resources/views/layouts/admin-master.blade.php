<!DOCTYPE HTML >
<html lang="en">
<head>
    <meta charset=UTF-8">
    <title>Admin area</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    @yield('styles')
</head>
<body>
@yield('content')
<script type="text/javascript">
    var baseUrl = "{{URL::to('/')}}";
</script>

@yield('scripts')
</body>
</html>