<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <title>Taj Institute of Information Technology</title>
</head>

<body>

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

    <div class="c1">
        <section>
            <div class='container px-5'>
                <div class='row crow py-4'>
                    <div class="offset-md-2 col-md-1 my-4"><button onclick="redirectBack()" class="backBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                                height="20">
                                <path
                                    d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                            </svg>
                        </button>
                    </div>
                    <div class='col-md-6 my-3 side2'>
                        <form action="/submit-signup" method='post'>
                            @CSRF
                            <h3 class='pt-4 greet mt-3'>Sign Up👋</h3>
                            <p class='pb-3 greet'>Sign up to Taj Academy</p>
                            <div class='px-4'>
                                <label for='name' class='px-3' for='name'>Username</label>
                                <input type='text' name='username' class='form-control' required />
                                <label class='px-3' for='password'>Password</label>
                                <input name='password' type="password" class="form-control m-2" required>

                                <button class='btn loginBtn mt-4'>Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer></footer>
    </div>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script>
    function redirectBack() {
        window.location.href = "{{url('/home')}}"
    }
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