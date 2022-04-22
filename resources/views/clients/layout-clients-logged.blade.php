<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức 24/24</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="{{asset('clients/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('clients/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('clients/css/reponsive.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.min.css">
</head>
<body>
<div class="app">
{{--    //header--}}
@include('clients.partials.header-logged')
{{--    //content--}}
@include('clients.partials.content-logged')
{{--    //footer--}}
@include('clients.partials.footer')

<!-- Menu mobile -->
@include('clients.modal.menuMobile')
<!-- Login Modal -->

    <script type="text/javascript" src="{{asset('clients/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('clients/js/jquery-3.6.0.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.min.js"></script>


</body>
</html>
