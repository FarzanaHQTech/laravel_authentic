<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Streamline your business with our advanced CRM template. Easily integrate and customize to manage sales, support, and customer interactions efficiently. Perfect for any business size">
    <meta name="keywords" content="Advanced CRM template, customer relationship management, business CRM, sales optimization, customer support software, CRM integration, customizable CRM, business tools, enterprise CRM solutions">
    <meta name="author" content="Dreams Technologies">
    <meta name="robots" content="index, follow">

    <!-- Title -->
    <title>Super Admin Dashboard | CRMS - Advanced Bootstrap 5 Admin Template for Customer Management</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/tabler-icons/tabler-icons.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <span class="loader"></span>
        </div>

        <!-- Header -->
        @include('layouts.backend.header')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('layouts.backend.sidebar')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">
                @yield('page_content') 
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    @include('layouts.backend.footer') <!-- Remove semicolon here -->
</body>

</html>
