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


        <div class="container my-5">
            <div class="row">

                <div class="col-md-1 pl-5 mt-4"><button onclick="redirectToCourses()" class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="mt-4 mb-5 col-md-10">
                    <div class="contlayout container p-4">
                        <h2 class='m-2 mb-4 tajText'>{{$course->course_code}} - {{$course->name}}</h2>

                        <p class='muted mx-3'> Course Information </p>
                        <div class="row">
                            <div class="my-2 col-md-6 d-flex align-items-center">
                                <label for="username" class="form-label constant-width mx-3 mt-2 fw-bold">Course
                                    Code</label>
                                <label for="username"
                                    class="form-label constant-width mx-3 mt-2">{{$course->course_code}}</label>
                            </div>
                            <div class="my-2 col-md-6 d-flex align-items-center">
                                <label for="name" class="form-label constant-width mx-3 mt-2 fw-bold">Course</label>
                                <label for="name" class="form- mx-3 mt-2">{{$course->name}}</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class="my-2 col-md-6 d-flex align-items-center">
                                <label for="username" class="form-label constant-width mx-3 mt-2 fw-bold">Students
                                    Enrolled</label>
                                <label for="username"
                                    class="form-label constant-width mx-3 mt-2">{{$studentsEnrolled->count()}}</label>
                            </div>

                            <div class="my-2 col-md-6 d-flex align-items-center">
                                <label for="username" class="form-label constant-width mx-3 mt-2 fw-bold">Active
                                    Students</label>
                                <label for="username"
                                    class="form-label constant-width mx-3 mt-2">{{$activeStudents->count()}}</label>
                            </div>
                        </div>


                        <div class="row">
                            <div class="my-2 col-md-6 d-flex align-items-center">
                                <label for="username" class="form-label constant-width mx-3 mt-2 fw-bold">Course
                                    Fee</label>
                                <label for="username"
                                    class="form-label constant-width mx-3 mt-2">{{$course->course_fees}}</label>
                            </div>
                        </div>


                    </div>
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
<script>
    function redirectToCourses() {
        window.location.href = "{{url('courses')}}";
    }
</script>

</html>