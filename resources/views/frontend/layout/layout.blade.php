<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.egenslab.com/html/odion/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Jul 2021 12:17:46 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="{{asset('front/css/home.css')}}">
   
    @yield("header")

</head>
<body >
   
    @include("frontend.includes.navbar")

    @yield("content")


    @include("frontend.includes.footer")

    @yield("script")

    </body>
    </html>

    