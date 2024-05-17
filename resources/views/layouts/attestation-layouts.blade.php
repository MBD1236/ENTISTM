<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Enseignant</title>


        {{-- JS --}}
        {{-- <script src="{{asset('assets/js/vendor/jquery-3.6.3.min.js')}}"></script> --}}
        
        {{-- Inclure les fichiers CSS de Select2 --}}
        {{-- <link rel="stylesheet" href="{{asset('assets/assets/select2/select2.css')}}"> --}}
        {{-- <link rel="stylesheet" href="{{asset('assets/assets/select2/select2.min.css')}}"> --}}

        <script type="text/javascript" src="{{ asset('assets/qrcodejs/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/qrcodejs/qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/assets/js/custom.js') }}"></script>
        {{-- FIN --}}
         

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

        {{-- Inclure jQuery avant d'autres scripts --}}

    </head>
    <body>

        <div class="container">
            <main id="main" class="main">
                @yield('content')
            </main>
        </div>
        
       
        {{-- Inclure les scripts JavaScript de Select2 --}}
        {{-- <script src="{{ asset('assets/select2/select2.full.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/assets/select2/costomselect2.js') }}"></script> --}}

        {{-- Initialiser Select2 --}}
        {{-- <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script> --}}

    </body>
</html>
