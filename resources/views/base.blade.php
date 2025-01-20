<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Petstore')</title>
</head>
<body>
<x-navbar></x-navbar>
<div class="container mt-5">
    @yield('content')
</div>
</body>
</html>
