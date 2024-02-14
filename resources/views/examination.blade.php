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

        <div class="container my-3">
            <div class='row my-5'>

                <div class="col-md-1 my-4"><button onclick="redirectBack()" ` class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>

                        <div class="d-flex my-3 justify-content-between align-items-center">
                            <h2 class="tajText"> Examination </h2>
                            <button onclick="window.location.href='newExam'"
                                class="myBtn5">New Exam&nbsp
                            <svg xmlns="http://www.w3.org/2000/svg" id="addNewSvg2" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20"><path d="M17,12c0,.553-.448,1-1,1h-3v3c0,.553-.448,1-1,1s-1-.447-1-1v-3h-3c-.552,0-1-.447-1-1s.448-1,1-1h3v-3c0-.553,.448-1,1-1s1,.447,1,1v3h3c.552,0,1,.447,1,1Zm7-7v14c0,2.757-2.243,5-5,5H5c-2.757,0-5-2.243-5-5V5C0,2.243,2.243,0,5,0h14c2.757,0,5,2.243,5,5Zm-2,0c0-1.654-1.346-3-3-3H5c-1.654,0-3,1.346-3,3v14c0,1.654,1.346,3,3,3h14c1.654,0,3-1.346,3-3V5Z"/></svg>
                        </button>
                        </div>

                        <p class="muted m-3 mt-4">Previous Examinations</p>

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout border' style="min-height:43vh;">
                                    <div class="table-responsive">

                                        <table class="table table-hover ">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center align-middle"
                                                    style="width: 30%;">Exam Type</th>
                                                    <th scope="col" class="text-center align-middle"
                                                    style="width: 30%;">Date</th>
                                                    <th scope="col" class="text-center align-middle"
                                                        style="width: 20%;">No. of Students</th>
                                                    <th scope="col" class="text-center align-middle"
                                                        style="width: 20%;">Total Marks</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($exams as $exam)
                                                <tr class="clickTable" onclick="window.location.href='examDetails_{{$exam->exam_type}}_{{$exam->date}}'">
                                                    <td class="text-center">{{$exam->exam_type}}</td>
                                                    <td class="text-center">{{Carbon\Carbon::parse($exam->date)->format('d M Y')}}</td>                                                      
                                                    <td class="text-center">{{$exam->no_of_students}}</td>
                                                    <td class="text-center">{{$exam->total_marks}}</td>
                                                </tr>
                                                @endforeach
                                                <!-- Add more table rows here if needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    window.location.href = "{{route('home')}}";
}

</script>

</html>