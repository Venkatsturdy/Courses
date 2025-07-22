<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <title>Course DESIGNS</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('front_assets/images/fav-icon/fav.png')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"
        integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    @yield("style")
    <script src="{{asset('assets/js/core/jquery.min.js')}}" ></script>
    <script src="{{ asset('assets/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
<style>
    .sidebarbg{
        /* background: #34e89e; */
        /* background: -webkit-linear-gradient(to right, #0f3443, #37da96); */
        background: linear-gradient(to right, #3b3017, #c0972c);
    }
    .sidebarbg2{
        background: #34e89e;
        background: -webkit-linear-gradient(to bottom, #0f3443, #3dd495);
        background: linear-gradient(to bottom, #3b3017, #c0972c);
    }
    .sidebarbg4{
        /* background: #428b6c; */
        /* background: -webkit-linear-gradient(to right, #0f3443, #316673); */
        background: linear-gradient(to right, #3b3017, #c0972c);
    }
</style>
</head>

<body>
