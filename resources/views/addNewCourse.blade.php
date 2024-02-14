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


        @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        {{Session::forget('fail')}}
        @endif

        <div class="container my-5">
            <div class="row">

                <div class="col-md-1 pl-5 mt-4"><button onclick="window.location.href='courses'" class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="my-4 col-md-10">
                    <div class="contlayout container p-4">
                        <h2 class='m-2 mb-4 tajText'>New Course</h2>
                        <form id='form' action="{{route('NewCourse')}}" method="post">
                            @CSRF

                            <div class="row">
                                <p class='muted mx-3'> Recommended Code: {{$course_code}}</p>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="name" class="form-label constant-width mx-3 mt-2">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Course Name"
                                        required>
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="username" class="form-label constant-width mx-3 mt-2">Code</label>
                                    <input type="text" name="courseCode" class="form-control" placeholder="Course Code"
                                        required>
                                </div>

                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="coursefees" class="form-label constant-width mx-3 mt-2">Fee</label>
                                    <input type="number" name="coursefees" class="form-control" placeholder="Course Fee"
                                        required>
                                </div>
                            </div>
                            <div class='text-center'>
                                <button type="submit" class="myBtn5 my-5 ">Save</button>
                            </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
    </div>

    </script>


    <footer></footer>
    </div>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>

</html>