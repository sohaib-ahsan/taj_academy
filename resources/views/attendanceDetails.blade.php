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
                        <h3 class="tajText mb-4"> Attendance Details </h3>

                        <div class="row p-3">
                            <div class="contlayout border p-4  col-md-12">
                                <h4 class="tajText mb-3">Summary</h4>
                                <div class="row mx-2">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Roll No</p>
                                            </div>
                                            <div class="col-8">
                                                <p>{{$student->roll_no}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Name</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{$student->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Course</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{$student->courses->name}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Registration Date</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{Carbon\Carbon::parse($student->registration_date)->format('d M Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 offset-md-1">
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Total Days</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{count($dates)}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Present</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{count($present)}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Absent</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{count($dates) - count($present)}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="fw-bold">Percentage</p>
                                            </div>
                                            <div class="col-8">
                                                <p class="">{{round((count($present)/count($dates))*100, 2)}}%</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                        </div>

                        
                        <!-- date search -->
                        <div class="m-3 col-md-5 label-select-container">
                                <input type="date" class='form-control' id="dateSearch" name="date" id="date" required>
                                <button class="myBtn6" id='search'>
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

                                <button class="myBtn6" name="refreshBtn" id='refresh'>
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
                            

                        <div class='row'>
                            <div class="col-md-12 my-3">
                                <div class='p-4 contlayout border' style="min-height:43vh;">
                                    <div class="table-responsive">

                                        <!-- Add a responsive wrapper -->

                                        <div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center align-middle"
                                                            style="width: 50%;">Date</th>
                                                        <th scope="col" class="text-center align-middle"
                                                            style="width: 50%;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($dates as $date)
                                                    @if (in_array($date, $present))
                                                    <tr class="table-success">
                                                        <td class="text-center">
                                                            {{Carbon\Carbon::parse($date)->format('d M Y')}}</td>
                                                        <td class="text-center">Present</td>
                                                    </tr>
                                                    @else
                                                    <tr class="table-danger">
                                                        <td class="text-center">
                                                            {{Carbon\Carbon::parse($date)->format('d M Y')}}</td>
                                                        <td class="text-center">Absent</td>
                                                    </tr>
                                                    @endif
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
    window.location.href = "{{route('rollNoAttendance')}}";
}

// search by date
document.getElementById('search').addEventListener('click', function() {
    var date = document.getElementById('dateSearch').value;
    var rows = document.querySelectorAll('tbody tr');

        const months = {
            '01': 'Jan',
            '02': 'Feb',
            '03': 'Mar',
            '04': 'Apr',
            '05': 'May',
            '06': 'Jun',
            '07': 'Jul',
            '08': 'Aug',
            '09': 'Sep',
            '10': 'Oct',
            '11': 'Nov',
            '12': 'Dec'
        };

        var dateParts = date.split('-');
        var date =  dateParts[2] + months[dateParts[1]]  + dateParts[0];



    for (var i = 0; i < rows.length; i++) {
        var showRow = false;

        var dateCol = rows[i].querySelectorAll('td')[0];
        dateCol = dateCol.innerHTML;
        dateCol = dateCol.replace(/\s/g, '');

        if (dateCol == date) {    
            showRow = true;
        }

        if (!showRow) {
            rows[i].style.display = 'none';
        } else {
            rows[i].style.display = '';
        }
    }

});

document.getElementById('refresh').addEventListener('click', function() {
    var rows = document.querySelectorAll('tbody tr');

    for (var i = 0; i < rows.length; i++) {
        rows[i].style.display = '';
    }
});
</script>

</html>