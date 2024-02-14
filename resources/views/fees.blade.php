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


        <div class="container my-3">
            <div class='row my-5'>

                <div class="col-md-12 my-4">
                    <div class='p-4 contlayout'>
                        <div class='row'>
                            <div class="col-md-1 my-2"><button onclick="redirectBack()" ` class="backBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24"
                                        width="20" height="20">
                                        <path
                                            d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                                    </svg>
                                </button>
                            </div>
                            <h2 class=" col-md-5 my-3 tajText"> Fee & Invoices </h2>
                        </div>
                        <div class="col-md-12 my-4 border contlayout p-4" style="min-height:10px;">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <h6 class="mx-3 tajText text-dark">Amount Collected for {{date('M Y')}} </h6>
                                </div>
                                <div class="col-md-3 offset-md-1">
                                    <h6 class="mx-3 ">Pkr {{$paid}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contlayout p-4 mt-4">
                        <form action="/searchAstudent" method="post">
                            @csrf
                            <div class="col-md-8 mt-5 label-select-container">
                                <p class="m-2 constant-width2 text-muted">Roll No. / Name</p>
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search">
                                <button class="myBtn6" type='submit' name='searchBtn'>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="search" x="0px" y="0px" viewBox="0 0 513.749 513.749"
                                        style="enable-background:new 0 0 513.749 513.749;" xml:space="preserve"
                                        width="20" height="20">
                                        <g>
                                            <path
                                                d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z" />
                                        </g>
                                    </svg>
                                </button>
                                <button class="myBtn6" name="refreshBtn" type='submit'>
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="refresh" x="0px" y="0px" viewBox="0 0 511.494 511.494"
                                        style="enable-background:new 0 0 511.494 511.494;" xml:space="preserve"
                                        width="20" height="20">
                                        <g>
                                            <path
                                                d="M478.291,255.492c-16.133,0.143-29.689,12.161-31.765,28.16c-15.37,105.014-112.961,177.685-217.975,162.315   S50.866,333.006,66.236,227.992S179.197,50.307,284.211,65.677c35.796,5.239,69.386,20.476,96.907,43.959l-24.107,24.107   c-8.33,8.332-8.328,21.84,0.004,30.17c4.015,4.014,9.465,6.262,15.142,6.246h97.835c11.782,0,21.333-9.551,21.333-21.333V50.991   c-0.003-11.782-9.556-21.331-21.338-21.329c-5.655,0.001-11.079,2.248-15.078,6.246l-28.416,28.416   C320.774-29.34,159.141-19.568,65.476,86.152S-18.415,353.505,87.304,447.17s267.353,83.892,361.017-21.828   c32.972-37.216,54.381-83.237,61.607-132.431c2.828-17.612-9.157-34.183-26.769-37.011   C481.549,255.641,479.922,255.505,478.291,255.492z" />
                                        </g>
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout border' style="min-height:43vh;">

                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center align-middle" style="width: 10%;">
                                                    Roll No.</th>
                                                <th scope="col" class="text-center align-middle" style="width: 20%;">
                                                    Name
                                                </th>
                                                <th scope="col" class="text-center align-middle" style="width: 35%;">
                                                    Course</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%;">
                                                    Total Fee</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%;">
                                                    Paid</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%;">
                                                    Balance</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%;">
                                                    Status</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($students as $student)
                                            @if ($student->active == 1)

                                            @if(in_array($student->std_id, $array2))
                                            <tr class="clickTable" data-student-id="{{$student->std_id}}"
                                                onclick="redirectToStudentDetails(this)">
                                                @else
                                            <tr class="clickTable" data-student-id="{{$student->std_id}}"
                                                onclick="redirectToStudentDetails(this)"
                                                style="background-color: #f8d7da;">
                                                @endif

                                                <td class="text-center">{{$student->roll_no}}</td>
                                                <td class="text-center">{{$student->name}}</td>
                                                <td class="text-center">{{$student->courses->name}}</td>
                                                <td class="text-center">{{$student->fees}}</td>
                                                <td class="text-center">
                                                    @if(array_key_exists($student->std_id, $array))
                                                    {{$array[$student->std_id]}}
                                                    @else
                                                    0
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if(array_key_exists($student->std_id, $array))
                                                    {{$student->fees - $array[$student->std_id]}}
                                                    @else
                                                    {{$student->fees}}
                                                    @endif
                                                    @endif
                                                </td>

                                                <td class="text-center">
                                                    @if(in_array($student->std_id, $array2))
                                                    <span class="badge bg-success">Paid</span>
                                                    @else
                                                    <span class="badge bg-danger">Unpaid</span>
                                                    @endif
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


        <footer></footer>
    </div>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script>
    function redirectBack() {
        window.location.href = "{{route('home')}}";
    }

    function redirectToStudentDetails(id) {
        var studentId = id.getAttribute('data-student-id');
        window.location.href = "{{url('feePay')}}" + studentId;
    }
</script>

</html>