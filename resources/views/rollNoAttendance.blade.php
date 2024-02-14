<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('bootstrap/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/home.css')}}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <title>Taj Institute of Information Technology</title>
</head>

<body>
    <div class="c1">
        <div class="container pb-4">
            <div class="row">
                <nav class="navbar navbar-expand-lg"></nav>
            </div>
        </div>

        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        {{Session::forget('success')}}
        @endif

        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        {{Session::forget('fail')}}
        @endif

        <div class="container my-3">
            <div class='row my-5'>

                <div class="offset-md-2 col-md-1 my-4"><button onclick="redirectBack()" ` class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="col-md-6 my-4">
                    <div class='p-4 contlayout'>

                        <div class="d-flex my-4 justify-content-between align-items-center">
                            <h3 class="tajText"> Attendance Search </h3>
                        </div>

                        <form id='form' action="{{route('rollNosubmit')}}" method="post">
                            @CSRF
                            <div class="my-3 label-select-container align-items-center">
                                <label for="exam" class="form-label  mx-2 px-2 mt-2">Roll No.</label>
                                <input type="text" name="roll_no" class="form-control" required>
                            </div>
                            <div class='text-center'>
                                <button type="submit" class="myBtn5 my-4 ">Next</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer></footer>


</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script>
    function redirectBack() {
        window.location.href = "{{route('attendance')}}";
    }
</script>

</html>