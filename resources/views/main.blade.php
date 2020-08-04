<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') - CSF</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="{{ asset('style/apple-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('style/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    {{-- <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> --}}
</head>
<body>

    @include('layouts.navbar')
<!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        @include('layouts.header')
        @yield('breadcrumbs')
        @yield('content')
    </div>
    
    <script src="{{ asset("style/assets/js/vendor/jquery-2.1.4.min.js")}}"></script>
    <script src="{{ asset("style/assets/js/popper.min.js")}}"></script>
    <script src="{{ asset("style/assets/js/plugins.js")}}"></script>
    <script src="{{ asset("style/assets/js/main.js")}}"></script>
    
    {{-- <script src="{{ asset("style/assets/js/lib/data-table/datatables.min.js") }}"></script> --}}
    <script src="{{ asset("style/assets/js/lib/data-table/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/dataTables.buttons.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/buttons.bootstrap.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/jszip.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/pdfmake.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/vfs_fonts.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/buttons.html5.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/buttons.print.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/buttons.colVis.min.js") }}"></script>
    <script src="{{ asset("style/assets/js/lib/data-table/datatables-init.js") }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
</body>
</html>