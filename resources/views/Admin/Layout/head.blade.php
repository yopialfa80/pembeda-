<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nazox - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{url('assets/images')}}/favicon.ico">
    <link href="{{url('assets/libs')}}/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/libs')}}/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/libs')}}/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />  
    <link href="{{url('assets/css')}}/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css')}}/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/css')}}/app.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('Admin.Layout.header')

        @include('Admin.Layout.sidebar')