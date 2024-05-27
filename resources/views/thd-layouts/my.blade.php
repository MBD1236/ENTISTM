<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Print Attestation</title>
        
        {{-- JS --}}
        <script src="{{asset('assets/js/custom.js')}}"></script>

        <!-- pour le select2 -->
        <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
        <script src="{{asset('assets/js/jquery-3.6.0.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/select2.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/qrcodejs/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/qrcodejs/qrcode.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/assets/js/custom.js') }}"></script>
        {{-- FIN --}}

        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    </head>
    <body>

        <div class="container">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>

    </body>
</html>
