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
        <div class="container unwanted pb-4">
            <div class="row">
                <nav class="navbar navbar-expand-lg"></nav>
            </div>
        </div>


        <div class="container my-3">
            <div class='row my-5'>
                <div class="col-md-1 pl-5 mt-4"><button onclick="redirectBack()" class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="col-md-10 contlayout my-3 d-flex align-items-center justify-content-center">
                    <h3 class="muted">Receipt has been downloaded Successfully</h3>
                </div>
            </div>
        </div>
    </div>


    </div>
    <footer class='unwanted'></footer>
    </div>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script src="{{asset('js/jspdf.js')}}"></script>
<script src="{{asset('js/pdf.js')}}"></script>
<script>

    generatePDF(["{{$fee->fee_id}}", "{{$student->roll_no}}", "{{$student->name}}",
        "{{$student->father_name}}", "{{$student->courses->name}}", "{{$fee->date}}",
        "{{$student->fees}}", "{{$fee->paid}}", "{{$total_recieved}}"]);

    function redirectBack() {
        window.location.href = "{{route('feePay', $student->std_id)}}";
    }

</script>

</html>