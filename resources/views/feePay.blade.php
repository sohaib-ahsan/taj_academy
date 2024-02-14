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

                        <h4 class=" col-md-5 my-3 tajText"> Fee Details </h4>
                        <div class="contlayout border p-4 mt-4">

                            <div class='row'>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="username" class="form-label  mx-3 mt-2 fw-bold"
                                        style="width:120px;">Name</label>
                                    <label for="username" class="form-label  mx-5 mt-2">{{$student->name}}</label>
                                </div>

                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="username" class="form-label mx-3 mt-2 fw-bold"
                                        style="width:120px;">Total Fees</label>
                                    <label for="username" class="form-label mx-5 mt-2">{{$student->fees}}</label>
                                </div>
                            </div>

                            <div class='row'>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="username" class="form-label  mx-3 mt-2 fw-bold"
                                        style="width:120px;">Paid</label>
                                    <label for="username" class="form-label  mx-5 mt-2">{{$fee->sum('paid')}}</label>
                                </div>

                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="username" class="form-label mx-3 mt-2 fw-bold"
                                        style="width:120px;">Balance</label>
                                    <label for="username" class="form-label mx-5 mt-2">{{$student->fees -
                                        $fee->sum('paid')}}</label>
                                </div>
                            </div>

                            <p class='muted mt-5 mx-3'>Installments</p>

                            <div class="contlayout border p-4 mt-4">

                                @if (count($fee) == 0)
                                <h4 class="muted mt-5 text-center">No Installments yet</h4>
                                @else

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 40%;">Date</th>
                                            <th scope="col" style="width: 50%;">Amount</th>
                                            <th scope="col" class="text-center" style="width: 33%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fee as $f)
                                        <tr>
                                            <td>{{Carbon\Carbon::parse($f->date)->format('d M Y')}}</td>
                                            <td>{{$f->paid}}</td>
                                            <td class="d-flex justify-content-end">
                                                <button class="Absent" data-fee-id="{{$f->fee_id}}"
                                                    style="width: 100px;" onclick="redirectToPrint(this)">Print</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>



                        <div class="contlayout border p-4 mt-4">

                            <p class='muted mt-5 mx-3'>Add Installment</p>
                            <form action="{{route('addInstallment')}}" method="POST">
                                @csrf
                                <div class='row'>
                                    <div class="my-2 col-md-6 d-flex align-items-center">
                                        <label for="username" class="form-label  mx-3 mt-2 fw-bold"
                                            style="width:120px;">Date</label>
                                        <input type="date" class="form-control" name="date" id="date"
                                            value="{{date('Y-m-d')}}" required>
                                    </div>

                                    <div class="my-2 col-md-6 d-flex align-items-center">
                                        <label for="username" class="form-label mx-3 mt-2 fw-bold"
                                            style="width:120px;">Amount</label>
                                        <input type="number" class="form-control" name="amount" id="amount" min="1"
                                            max="{{$student->fees - $fee->sum('paid')}}" required>
                                    </div>
                                </div>

                                <input type="hidden" name="std_id" value="{{$student->std_id}}">
                                <input type="hidden" name="fees" value="{{$student->fees}}">
                                <input type="hidden" name="paid" value="{{$fee->sum('paid')}}">
                                <input type="hidden" name="balance" value="{{$student->fees - $fee->sum('paid')}}">
                                <input type="hidden" name="name" value="{{$student->name}}">

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="myBtn5 mt-3">Add</button>
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
        window.location.href = "{{route('fees')}}";
    }

    function redirectToPrint(e) {
        var fee_id = e.getAttribute("data-fee-id");
        window.location.href = "{{url('printFee')}}" + fee_id;

    }

</script>

</html>