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

                <div class="col-md-1 my-4"><button onclick="redirectBack()" class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="col-md-10 my-4">
                    <div class='p-4 contlayout'>
                        <h2 class="tajText mb-4"> Attendance </h2>
                        <div class="d-flex justify-content-between">
                            <h5 class="mx-3 mt-2 ">Date : {{Carbon\Carbon::parse($date)->format('d M Y')}}</h5>
                            <button onclick="window.location.href='rollNoAttendance'"
                            class="myBtn5 mx-2">Search&nbsp
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        version="1.1" id="addNewSvg2" x="0px" y="0px" viewBox="0 0 513.749 513.749"
                                        style="enable-background:new 0 0 513.749 513.749;" xml:space="preserve"
                                        width="20" height="20">
                                        <g>
                                            <path
                                                d="M504.352,459.061l-99.435-99.477c74.402-99.427,54.115-240.344-45.312-314.746S119.261-9.277,44.859,90.15   S-9.256,330.494,90.171,404.896c79.868,59.766,189.565,59.766,269.434,0l99.477,99.477c12.501,12.501,32.769,12.501,45.269,0   c12.501-12.501,12.501-32.769,0-45.269L504.352,459.061z M225.717,385.696c-88.366,0-160-71.634-160-160s71.634-160,160-160   s160,71.634,160,160C385.623,314.022,314.044,385.602,225.717,385.696z" />
                                        </g>
                                    </svg>
                        </button>
                    </div>


                        <!-- date search -->
                        <form action="{{route('gotoAttendance')}}" method='post'>
                            @csrf
                            <div class="m-3 col-md-4 label-select-container">
                                <input type="date" class="form-control" name="date" id="date" required>
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
                            </div>
                            </form>

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout border' style="min-height:43vh;">
                                    <div class="table-responsive">

                                        <!-- Add a responsive wrapper -->

                                        <form action="{{route('saveAttendance')}}" method='post'>
                                            @csrf
                                            <input type="hidden" name="date" value="{{$date}}">
                                            <div>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center align-middle"
                                                                style="width: 10%;">Roll No.</th>
                                                            <th scope="col" class="text-center align-middle"
                                                                style="width: 30%;">Student Name</th>
                                                            <th scope="col" class="text-center align-middle"
                                                                style="width: 50%;">Course</th>
                                                            <th scope="col" class="text-center align-middle"
                                                                style="width: 10%;">Attendance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($students as $student)
                                                        <tr>
                                                            <td class="text-center">{{$student->roll_no}}</td>
                                                            <td class="px-5">{{$student->name}}</td>
                                                            <td class="px-5">{{$student->courses->name}}</td>
                                                            <td class="px-5">

                                                                @if (count($present) > 0)
                                                                @if (in_array($student->std_id, $present))
                                                                <div class="attendance-button text-center Present"
                                                                    data-present="true">P
                                                                </div>
                                                                <input type="hidden"
                                                                    name="attendance_status[{{$student->std_id}}]"
                                                                    value="1">
                                                                @else
                                                                <div class="attendance-button text-center Absent"
                                                                    data-present="false">A
                                                                </div>
                                                                <input type="hidden"
                                                                    name="attendance_status[{{$student->std_id}}]"
                                                                    value="0">
                                                                @endif
                                                                @else
                                                                <div class="attendance-button text-center Absent"
                                                                    data-present="false">A
                                                                </div>
                                                                <input type="hidden"
                                                                    name="attendance_status[{{$student->std_id}}]"
                                                                    value="0">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class='text-center'>
                                                <button type="submit" class="myBtn5 my-5 ">Save</button>
                                            </div>
                                        </form>

                                    </div>
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
    window.location.href = "{{url('/home')}}"
}

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.attendance-button');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const isPresent = button.getAttribute('data-present') === 'true';
            const td = button.closest('td');
            const attendanceStatus = td.querySelector('input[name^="attendance_status"]');

            if (isPresent) {
                button.innerText = 'A';
                button.setAttribute('data-present', 'false');
                button.classList.remove('Present');
                button.classList.add('Absent');
                attendanceStatus.value = 0;
            } else {
                button.innerText = 'P';
                button.setAttribute('data-present', 'true');
                button.classList.remove('Absent');
                button.classList.add('Present');
                attendanceStatus.value = 1;
            }
        });
    });

});
</script>

</html>