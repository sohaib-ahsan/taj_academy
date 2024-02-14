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

    
    <div class="c1">
        <section style='z-index:-1;'>
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
                    <div class=' col-md-6 my-3 side2'>
                        <form action="/submit-password" method='post'>
                            @CSRF
                            <h3 class='pt-4 greet mt-3'>Change Password</h3>
                            <p class='pb-3 muted'>Please Provide your previous password</p>
                            <div class='px-4'>
                                <label for='current' class='px-3' for='name'>Current Password</label>
                                <input type='password' name='current' class='form-control' required />
                                <label class='px-3' for='password'>New Password</label>
                                <input name='password' type="password" id='password' class="form-control m-2" required>
                                <div class='m-2 error2'></div>
                                <label class='px-3 mt-2' for='password'>Confirm Password</label>
                                <input name='confirmPassword' type="password" id='confirmPassword' class="form-control m-2" required>
                                <div class='mx-2 error'></div>
                                <button type='submit' class='btn loginBtn my-4'>Save</button>
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

    document.addEventListener('DOMContentLoaded', function() {
    var errorMessage = document.querySelector('.alert');
    if(errorMessage != null){
        errorMessage.classList.add('show');
        var duration = 9000; 
        setTimeout(function() {
            errorMessage.classList.remove('show');
        }, duration);
    }
    });


    pass = document.querySelector('#password')
    confirmPass = document.querySelector('#confirmPassword')

    confirmPass.addEventListener('keyup', function() {
        if (pass.value !== confirmPass.value) {
            document.querySelector('.error').innerHTML = '❌<i> Passwords do not match</i>';
            document.querySelector('.error').classList.add('text-danger');
            document.querySelector('.error').classList.remove('text-success');
        } else {
            document.querySelector('.error').innerHTML = '✅ <i>Passwords match</i>';
            document.querySelector('.error').classList.add('text-success');
            document.querySelector('.error').classList.remove('text-danger');
        }
    });
    
    pass.addEventListener('keyup', function() {
        if (pass.value.length < 8) {
            document.querySelector('.error2').innerHTML = '❌ <i>Password must be atleast 8 characters long</i>';
            document.querySelector('.error2').classList.add('text-danger');
            document.querySelector('.error2').classList.remove('text-success');
        } else {
            document.querySelector('.error2').innerHTML = '✅ <i>Password is valid</i>';
            document.querySelector('.error2').classList.add('text-success');
            document.querySelector('.error2').classList.remove('text-danger');
        }
    });
        

</script>
</html>