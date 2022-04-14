<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
        integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
        integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="icon" type="image/x-icon" href="data:image/png;base64,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">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
    <script src="{{URL::to('js/app.js')}}"></script>
    <script src="{{URL::to('js/FormValidate.js')}}"></script>
</head>

<body>
    @include('includes.header')
    <div id="divbg">
        @yield('bg_img')
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
