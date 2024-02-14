<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <title>Taj Institute of Information Technology</title>
</head>

<body>

    <div class="c1">

        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        {{Session::forget('fail')}}
        @endif

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        {{Session::forget('success')}}
        @endif

        <div class='container'>
            <div class='row crow py-4'>
                <div class='col-md-7 my-3'>
                    <div class=''>
                        <img src="{{asset('images/login.png')}}" class='fixed'>
                    </div>
                </div>
                <div class='col-md-5 my-3 side2'>
                    <form action="/submit-form" method='post'>
                        @CSRF
                        <h3 class='pt-4 greet mt-3'>Hey, Hello👋</h3>
                        <p class='pb-3 greet'>Sign in to Taj Academy</p>
                        <div class='px-4'>
                            <label for='name' class='px-3' for='name'>Username</label>
                            <input type='text' name='username' class='form-control' required />
                            <label class='px-3' for='password'>Password</label>
                            <input name='password' type="password" class="form-control m-2" required>

                            <button class='btn loginBtn mt-4'>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer></footer>
    </div>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorMessage = document.querySelector('.alert');
        if (errorMessage != null) {
            errorMessage.classList.add('show');
            var duration = 9000;
            setTimeout(function () {
                errorMessage.classList.remove('show');
            }, duration);
        }
    });
</script>

</html>