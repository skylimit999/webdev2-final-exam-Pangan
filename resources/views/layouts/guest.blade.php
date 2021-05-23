<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/datatable-tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <style media="screen">
        .loader {
            border-top-color: #3498db;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .dataTables_processing{
            top: 25% !important;
            left: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            height: 12.5vh !important;
        }
        table.dataTable thead th, table.dataTable thead td{
            border-bottom: 1px solid #e3e3e3 !important;
        }
        table.dataTable.no-footer{
            border-bottom: 1px solid #e3e3e3 !important;
        }
        table.dataTable tbody th, table.dataTable tbody td {
            padding: 5px 5px !important;
        }
        .bg-status{
        }
        </style>
        <script type="text/javascript">
            var loading = ' <svg class="inline animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
            var loadingForm = '<div class="absolute top-0 left-0 right-0 bottom-0 w-full h-auto z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center"><div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div><h2 class="text-center text-white text-xl font-semibold">Loading...</h2></div>';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
