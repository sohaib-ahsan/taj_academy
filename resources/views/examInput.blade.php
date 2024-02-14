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

                        @if ($id == 1)
                        <div class="col-md-1 my-2"><button  class="backBtn" onclick="window.location.href='{{url('/examination')}}'">
                            @else
                            <div class="col-md-1 my-2"><button  class="backBtn" onclick="window.location.href='{{url('/newExam')}}'">
                                @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                            </svg>
                        </button>
                    </div>

                    <div class="col-md-6">
                        
                        <h2 class="tajText my-4"> Exam Marks Input </h2>
                            
                            <div>
                                <div class="label-select-container">
                                    <h6 class="mx-3 tajText text-dark">Date </h6> 
                                    <h6 class="mx-3 ">{{$date}}</h6> 
                                </div>
                                <div class="label-select-container">
                                    <h6 class="mx-3 tajText text-dark">Exam </h6> 
                                    <h6 class="mx-3 ">{{$exam}}</h6> 
                                </div>
                                <div class="label-select-container">
                                    <h6 class="mx-3 tajText text-dark">Total Marks </h6> 
                                    <h6 class="mx-3 ">{{$marks}}</h6> 
                                </div>
                                <div class="my-2 label-select-container">
                                    <p class="mx-3 my-3     tajText text-dark">Hide Empty Rows </p>    
                                    <button class="hideShowToggle" onclick="hideToggle()">Hide</button>
                                </div>
                            </div>
                            </div>
                        </div>
                            
                            <div class='row'>
                                <div class="col-md-12 my-3">
                                <div class='p-4 contlayout border' style="min-height:43vh;">
                                    <div class="table-responsive">
                                        
                                        <!-- Add a responsive wrapper -->
                                        
                                        <form action="{{route('saveMarks')}}" method='post'>
                                            @csrf
                                            <input type="hidden" name="date" value="{{$date}}">
                                            <input type="hidden" name="exam" value="{{$exam}}">
                                            <input type="hidden" name="totalmarks" value="{{$marks}}">
                                            
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
                                                                style="width: 20%;">Obt. Marks</th>
                                                                <th scope="col" class="text-center align-middle"
                                                                style="width: 20%;">Percentage</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($id == 0)
                                                        @foreach($students as $student)
                                                        <tr class="tr">
                                                            <td class="text-center">{{$student->roll_no}}</td>
                                                            <td class="px-5">{{$student->name}}</td>
                                                            <td class="px-5">{{$student->courses->name}}</td>
                                                            <td class="px-5">
                                                                <input type="number" name="marks[{{$student->std_id}}]"
                                                                class="form-control" min="0" max="{{$marks}}"
                                                                id="inputMarks">
                                                            </td>
                                                            <td colspan="3" class="text-center align-middle percentage"></td>
                                                        </tr>
                                                        @endforeach
                                                        @endif
                                                        
                                                        @if ($id == 1)
                                                        @foreach($students as $student)
                                                        <tr class="tr">
                                                            <td class="text-center">{{$student->roll_no}}</td>
                                                            <td class="px-5">{{$student->name}}</td>
                                                            <td class="px-5">{{$student->courses->name}}</td>
                                                            @if ($exams[$student->std_id] == 0 || $exams[$student->std_id])
                                                            <td class="px-5">
                                                                <input type="number" name="marks[{{$student->std_id}}]"
                                                                    class="form-control" min="0" max="{{$marks}}"
                                                                    value="{{$exams[$student->std_id]}}" id="inputMarks">
                                                            </td>
                                                            @else
                                                            <td class="px-5">
                                                                <input type="number" name="marks[{{$student->std_id}}]"
                                                                    class="form-control" min="0" max="{{$marks}}"
                                                                     id="inputMarks">
                                                            </td>
                                                            @endif
                                                            <td colspan="3" class="text-center align-middle percentage"></td>
                                                        </tr>
                                                        @endforeach
                                                        @endif

                                                            <!-- percentage -->
                                                                
                                                        
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
    function hide(){
        // hide all table rows for whom the values are empty
        var table = document.getElementById("table");
        var tr = document.getElementsByClassName("tr");
        for (var i = 0; i < tr.length; i++) {
            var td = tr[i].getElementsByTagName("td")[3];
            if (td) {
                var input = td.getElementsByTagName("input")[0];
                if (input.value == "") {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function show(){
        // show all table rows
        var table = document.getElementById("table");
        var tr = document.getElementsByClassName("tr");
        for (var i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    }
    
    function hideToggle(){
        var btn = document.getElementsByClassName("hideShowToggle")[0];
        if (btn.innerHTML == "Hide"){
            btn.innerHTML = "Show";
            hide();
        }
        else{
            btn.innerHTML = "Hide";
            show();
        }
    }

    // bind on input to calculate percentage
    var inputMarks = document.getElementsByClassName("form-control");

    // if any input value exists already, calculate percentage
    for (var i = 0; i < inputMarks.length; i++) {
        var marks = inputMarks[i].value;
        if (marks == "") {
            continue;
        }
        var totalMarks = inputMarks[i].max;
        var percentage = (marks / totalMarks) * 100;
        var percentageTd = inputMarks[i].parentNode.parentNode.getElementsByClassName("percentage")[0];
        percentageTd.innerHTML = percentage.toFixed(2) + "%";
    }

    for (var i = 0; i < inputMarks.length; i++) {
        inputMarks[i].addEventListener("input", function() {
            var marks = this.value;
            var totalMarks = this.max;
            var percentage = (marks / totalMarks) * 100;
            var percentageTd = this.parentNode.parentNode.getElementsByClassName("percentage")[0];
            percentageTd.innerHTML = percentage.toFixed(2) + "%";
        });
    }
</script>
</html>