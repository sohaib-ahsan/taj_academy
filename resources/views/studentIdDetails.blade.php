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

            @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            {{Session::forget('success')}}
            @endif
        </div>


        <div class="container my-3">
            <div class='row my-5'>


                <div class="col-md-12 my-4">

                    <div class='p-4 contlayout'>

                        <div class="row">
                            <div class="col-md-1 my-2"><button onclick="redirectBack()" ` class="backBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24"
                                        width="20" height="20">
                                        <path
                                            d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="col-md-11 my-3">

                                <div class="d-flex justify-content-between">
                                    <h2 class="tajText">Student Details</h2>
                                </div>
                            </div>
                        </div>

                        <div class='row'>
                            <div class="col-md-6 my-3">
                                <div class='p-4 contlayout border' style="min-height:43vh;">
                                    <div class="d-flex justify-content-center mb-2">
                                        <form action="{{route('updateStatus')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{$student->std_id}}">

                                            @if ($student->active == 1)
                                            <button type="submit" class="myBtn6">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="homeSVG" x="0px" y="0px" viewBox="0 0 512.292 512.292"
                                                    style="enable-background:new 0 0 512.292 512.292; fill:green;"
                                                    xml:space="preserve" width="512" height="512">
                                                    <g>
                                                        <path
                                                            d="M256.061,0L256.061,0c17.673,0,32,14.327,32,32v106.667c0,17.673-14.327,32-32,32l0,0c-17.673,0-32-14.327-32-32V32   C224.061,14.327,238.387,0,256.061,0z" />
                                                        <path
                                                            d="M330.727,105.387L330.727,105.387c-0.157,10.742,5.259,20.8,14.315,26.581c80.432,49.143,105.796,154.185,56.652,234.616   S247.51,472.38,167.078,423.237S61.282,269.052,110.426,188.62c14.042-22.982,33.324-42.315,56.269-56.418   c9.211-5.781,14.773-15.92,14.699-26.795l0,0c0.049-17.673-14.238-32.039-31.911-32.088c-6.07-0.017-12.02,1.693-17.155,4.931   C22.233,146.634-11.58,291.318,56.803,401.412s213.067,143.907,323.161,75.524s143.907-213.067,75.524-323.161   c-19.035-30.645-44.879-56.489-75.524-75.524c-14.997-9.461-34.824-4.973-44.285,10.024   C332.447,93.397,330.731,99.33,330.727,105.387z" />
                                                    </g>
                                                </svg>
                                            </button>

                                            @else
                                            <button type="submit" class="myBtn6">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                    id="homeSVG" x="0px" y="0px" viewBox="0 0 512.292 512.292"
                                                    style="enable-background:new 0 0 512.292 512.292; fill:red; transform:rotate(180deg);"
                                                    xml:space="preserve" width="512" height="512">
                                                    <g>
                                                        <path
                                                            d="M256.061,0L256.061,0c17.673,0,32,14.327,32,32v106.667c0,17.673-14.327,32-32,32l0,0c-17.673,0-32-14.327-32-32V32   C224.061,14.327,238.387,0,256.061,0z" />
                                                        <path
                                                            d="M330.727,105.387L330.727,105.387c-0.157,10.742,5.259,20.8,14.315,26.581c80.432,49.143,105.796,154.185,56.652,234.616   S247.51,472.38,167.078,423.237S61.282,269.052,110.426,188.62c14.042-22.982,33.324-42.315,56.269-56.418   c9.211-5.781,14.773-15.92,14.699-26.795l0,0c0.049-17.673-14.238-32.039-31.911-32.088c-6.07-0.017-12.02,1.693-17.155,4.931   C22.233,146.634-11.58,291.318,56.803,401.412s213.067,143.907,323.161,75.524s143.907-213.067,75.524-323.161   c-19.035-30.645-44.879-56.489-75.524-75.524c-14.997-9.461-34.824-4.973-44.285,10.024   C332.447,93.397,330.731,99.33,330.727,105.387z" />
                                                    </g>
                                                </svg>
                                            </button>
                                            @endif
                                        </form>
                                    </div>


                                    <form action="{{route('updateStudent')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="student_id" value="{{$student->std_id}}">
                                        <div class="d-flex mb-3 justify-content-between">
                                            <p class="text-muted"> Personal Information </p>
                                            <button id="edit" class="myBtn5">Edit</button>
                                        </div>

                                        <table class='table text-muted'>
                                            <tbody>
                                                <tr>
                                                    <td width="50%" class="text-dark fw-bold"> Name </td>
                                                    <td class="text-dark">
                                                        <input type="text" class="form-control"
                                                            value="{{$student->name}}" name="name" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-bold"> Roll No. </td>
                                                    <td class="text-dark">
                                                        <input type="text" class="form-control" required
                                                            value="{{$student->roll_no}}" name='roll_no' disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-bold"> Gender </td>
                                                    <td class="text-dark">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value='{{$student->gender}}' id="male" value="Male"
                                                                required disabled>
                                                            <label class="form-check-label" for="male">Male</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gender"
                                                                value='{{$student->gender}}' id="female" value="Female"
                                                                required disabled>
                                                            <label class="form-check-label" for="female">Female</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-bold"> Father Name </td>
                                                    <td class="text-dark">
                                                        <input type="text" class="form-control" required
                                                            value="{{$student->father_name}}" name='father_name'
                                                            disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-bold"> CNIC </td>
                                                    <td class="text-dark">
                                                        <input type="text" class="form-control" required
                                                            value="{{$student->CNIC}}" name='cnic' disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-bold"> Date of Birth </td>
                                                    <td class="text-dark">
                                                        <input type="date" class="form-control" required
                                                            value="{{$student->DOB}}" name='dob' disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark fw-bold"> Qualification </td>
                                                    <td class="text-dark">
                                                        <input type="text" class="form-control"
                                                            value="{{$student->qualification}}" name='qualification'
                                                            disabled>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                </div>
                                <div class='p-4 mt-5 contlayout border'>
                                    <p class="text-muted"> Contact Information </p>
                                    <table class='table text-muted'>
                                        <tbody>
                                            <tr>
                                                <td width="50%" class="text-dark fw-bold"> Phone </td>
                                                <td class="text-dark">
                                                    <input type="text" class="form-control" required
                                                        value="{{$student->contact_no}}" name='phone' disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" class="text-dark fw-bold"> Father's Contact </td>
                                                <td class="text-dark">
                                                    <input type="text" class="form-control" required
                                                        value="{{$student->father_contactNo}}" name='father_phone'
                                                        disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark fw-bold"> Email</td>
                                                <td class="text-dark">
                                                    <input type="text" class="form-control" value="{{$student->email}}"
                                                        name='email' disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark fw-bold"> Address </td>
                                                <td class="text-dark">
                                                    <input type="text" class="form-control"
                                                        value="{{$student->address}}" name='address' disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class='p-4 mt-5 contlayout border' style="min-height:43vh;">
                                    <p class="text-muted"> Course Information </p>

                                    <table class='table text-muted'>
                                        <tbody>
                                            <tr>
                                                <td class="text-dark fw-bold"> Registration Date </td>
                                                <td class="text-dark">
                                                    <label type="date"
                                                        name='registration_date'>{{$student->registration_date}}</label>
                                                </td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark fw-bold"> Course Code </td>
                                                <td class="text-dark" id="course_code1"> {{$course->course_code}} </td>
                                                <input type="hidden" name="course_code" id="course_code"
                                                    value="{{$course->course_code}}">
                                            </tr>
                                            <tr>
                                                <td width="50%" class="text-dark fw-bold"> Course </td>
                                                <td class="text-dark">
                                                    <select class="form-select" name="course" id="course" required
                                                        disabled>
                                                        <option value="{{$course->name}}" selected disabled hidden>
                                                            {{$course->name}}</option>
                                                        @foreach($All_Courses as $course)
                                                        <option value="{{$course->course_id}}"
                                                            data-course_code="{{$course->course_code}}">
                                                            {{$course->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark fw-bold"> Fees </td>
                                                <td class="text-dark">
                                                    <input type="text" class="form-control" value="{{$student->fees}}"
                                                        name='fees' disabled>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                </div>

                                <div class="d-flex mt-5 mb-3 justify-content-center">
                                    <button type="submit" class="myBtn5" id="save" disabled>Save</button>
                                </div>
                            </div>
                            </form>

                            <div class="col-md-6">

                                <div class="d-flex justify-content-end align-items-right mb-4">
                                    <img src="{{asset('students/'.$student->image)}}"
                                        class="img-fluid rounded d-block mx-1 mt-2" width="200" height="200"
                                        alt="student image">
                                </div>


                                <div class="contlayout border my-3 p-3">
                                    <h4 class="tajText m-3">Attendance</h4>
                                    <div class="row mx-3">
                                        <div class="col-6">
                                            <p class="fw-bold">Total Days</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="">{{$total_days}}</p>
                                        </div>
                                    </div>
                                    <div class="row mx-3">
                                        <div class="col-6">
                                            <p class="fw-bold">Present</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="">{{$present_days}}</p>
                                        </div>
                                    </div>
                                    <div class="row mx-3">
                                        <div class="col-6">
                                            <p class="fw-bold">Absent</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="">{{$total_days - $present_days}}</p>
                                        </div>
                                    </div>
                                    <div class="row mx-3">
                                        <div class="col-6">
                                            <p class="fw-bold">Percentage</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="">{{round(($present_days/$total_days)*100, 2)}}%</p>
                                        </div>
                                    </div>


                                </div>



                                <div class="contlayout border my-3 p-3">
                                    <h4 class="tajText m-3">Fees</h4>

                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center align-middle">Bill No.</th>
                                                <th scope="col" class="text-center align-middle">Date</th>
                                                <th scope="col" class="text-center align-middle">Amount Paid</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($fees->count() == 0)
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">No fees paid yet</td>
                                            </tr>
                                            @endif
                                            @foreach($fees as $fee)
                                            <td class="text-center">{{$fee->fee_id}}</td>
                                            <td class="text-center">
                                                {{Carbon\Carbon::parse($fee->date)->format('d M Y')}}
                                            </td>
                                            <td class="text-center">{{$fee->paid}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="d-flex justify-content-between mt-4">
                                        <h6 class="mx-3 fw-bold">Total</h6>
                                        <h6 class="mx-3 fw-bold">{{$student->fees}}</h6>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mx-3 fw-bold">Paid</h6>
                                        <h6 class="mx-3 fw-bold">{{$fees->sum('paid')}}</h6>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <h6 class="mx-3 fw-bold">Balance</h6>
                                        <h6 class="mx-3 fw-bold">{{$student->fees - $fees->sum('paid')}}</h6>
                                    </div>

                                </div>

                                <div class="contlayout border my-3 p-3">
                                    <h4 class="tajText m-3">Exams</h4>
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th scope="col" width="40%" class="text-center align-middle">Exam</th>
                                                <th scope="col" class="text-center align-middle">Obt.</th>
                                                <th scope="col" style="padding-left: 30px;">Total</th>
                                                <th scope="col" class="text-center align-middle">Date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($exams->count() == 0)
                                            <tr>
                                                <td colspan="4" class="text-center text-muted">No exams taken yet</td>
                                            </tr>
                                            @endif
                                            @foreach($exams as $exam)

                                            <tr class="text-dark">
                                                <td class="text-center">{{$exam->exam_type}}</td>
                                                <td class="text-center">{{$exam->obt_marks}}</td>
                                                <td style="padding-left: 30px;">{{$exam->total_marks}}</td>
                                                <td class="text-center text-success">
                                                    {{Carbon\Carbon::parse($exam->date)->format('d M Y')}}</td>

                                            </tr>
                                            @endforeach
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

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script>
    function redirectBack() {
        window.location.href = "{{route('student')}}";
    }

    button = document.getElementById("edit");
    const course = document.getElementById("course");

    button.addEventListener("click", function () {
        document.getElementById("save").disabled = false;
        inputs = document.getElementsByTagName("input");
        for (i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
        }
        select = document.getElementsByTagName("select");
        for (i = 0; i < select.length; i++) {
            select[i].disabled = false;
        }
        document.getElementById("course").disabled = false;
    });

    course.addEventListener("change", function () {
        var selected = this.options[course.selectedIndex];
        var course_code = selected.getAttribute("data-course_code");
        document.getElementById("course_code").value = course_code;
        document.getElementById("course_code1").innerText = course_code;
    });
</script>

</html>