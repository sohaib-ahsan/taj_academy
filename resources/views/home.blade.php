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

        <section class="mt-5">
            <div class="container">
                <div class="row m-2 pt-3 d-flex justify-content-center">
                    <div class="col-md-3 m-3 contlayout1" onclick="redirect(3)">
                        <div class="text-cont label-select-container">
                            <svg id="homeSVG" height="10" viewBox="0 0 24 24" width="10"
                                xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                <path
                                    d="m12 0a12 12 0 1 0 12 12 12.013 12.013 0 0 0 -12-12zm4 13h-3v3a1 1 0 0 1 -2 0v-3h-3a1 1 0 0 1 0-2h3v-3a1 1 0 0 1 2 0v3h3a1 1 0 0 1 0 2z" />
                            </svg>
                            New Admission
                        </div>
                    </div>
                    <div class="col-md-3 m-3 contlayout1" onclick="redirect(1)">
                        <div class="text-cont label-select-container">
                            <svg id="homeSVG" height="10" viewBox="0 0 24 24" width="10"
                                xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                                <path
                                    d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm6.5 11h-13a1 1 0 0 1 -1-1v-.5a7.5 7.5 0 0 1 15 0v.5a1 1 0 0 1 -1 1zm3.5-15a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm-1.421 2.021a6.825 6.825 0 0 0 -4.67 2.831 9.537 9.537 0 0 1 4.914 5.148h6.677a1 1 0 0 0 1-1v-.038a7.008 7.008 0 0 0 -7.921-6.941z" />
                            </svg>Students Details
                        </div>
                    </div>
                    <div class="col-md-3 m-3 contlayout1" onclick="redirect(4)">
                        <div class="text-cont label-select-container">
                            <svg id="homeSVG" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                                width="10" height="10">
                                <path
                                    d="M24,3V20.611l-12,3.429L0,20.611V4c0-.95,.435-1.823,1.194-2.395,.249-.188,.523-.316,.806-.418V19.103l10,2.857,10-2.857V.187c.283,.102,.558,.23,.806,.418,.759,.572,1.194,1.445,1.194,2.395Zm-11,.371v14.263l-1,.286-1-.286V3.371c0-1.332-.895-2.519-2.251-2.903L7.08,.069c-1.571-.375-3.08,.817-3.08,2.432v15.213l8,2.286,8-2.286V2.535c0-1.597-1.477-2.785-3.037-2.442l-1.788,.393c-1.281,.366-2.176,1.553-2.176,2.885Z" />
                            </svg>
                            Courses
                        </div>
                    </div>
                    <div class="col-md-3 m-3 contlayout1" onclick="redirect(6)">
                        <div class="text-cont label-select-container">
                            <svg id="homeSVG" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                                width="10" height="10">
                                <path
                                    d="M19.414,5h-4.414V.586l4.414,4.414Zm-5.414,13v-3H6v3H14Zm2.023,6H0V3C0,1.343,1.343,0,3,0H13V7h7v3h-3v1.417c-.792,.347-1.468,.901-1.982,1.583H4v7H14c0,1.64,.801,3.088,2.023,4ZM4,7h5v-2H4v2Zm0,4h5v-2H4v2Zm17.685,6.267l-3.041-.507c-.373-.062-.644-.382-.644-.76,0-.551,.448-1,1-1h2c.552,0,1,.449,1,1h2c0-1.654-1.346-3-3-3v-1h-2v1c-1.654,0-3,1.346-3,3,0,1.36,.974,2.51,2.315,2.733l3.041,.507c.373,.062,.644,.382,.644,.76,0,.551-.448,1-1,1h-2c-.552,0-1-.449-1-1h-2c0,1.654,1.346,3,3,3v1h2v-1c1.654,0,3-1.346,3-3,0-1.36-.974-2.51-2.315-2.733Z" />
                            </svg>
                            Fees & Invoices
                        </div>
                    </div>

                    <div class="col-md-3 m-3 contlayout1" onclick="redirect(5)">
                        <div class="text-cont label-select-container">
                            <svg id="homeSVG" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                data-name="Layer 1">
                                <path
                                    d="m11.191 13a4.9 4.9 0 0 1 .252-.766l.575-1.193.539 1.192a4.949 4.949 0 0 1 .252.767zm9.809-6v17h-18v-21a3 3 0 0 1 3-3h8v7zm-9.04 12.456-1.42-1.408-1.863 1.881a.249.249 0 0 1 -.347.007l-.866-.884-1.428 1.4.873.891a2.255 2.255 0 0 0 3.185 0zm1.04-4.456v1h2v-1.7a6.964 6.964 0 0 0 -.621-2.883l-.522-1.153a2 2 0 0 0 -3.7-.04l-.539 1.194a6.956 6.956 0 0 0 -.618 2.882v1.7h2v-1zm5 4h-4v2h4zm2.785-14h-4.785v-4.781a4 4 0 0 1 1.586.953l2.242 2.242a3.969 3.969 0 0 1 .957 1.586z" />
                            </svg>
                            Examination
                        </div>
                    </div>
                    <div class="col-md-3 m-3 contlayout1" onclick="redirect(2)">
                        <div class="text-cont label-select-container">
                            <svg id="homeSVG" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"
                                width="10" height="10">
                                <path
                                    d="M24,7v1H0v-1C0,4.239,2.239,2,5,2h1V1c0-.552,.448-1,1-1h0c.552,0,1,.448,1,1v1h8V1c0-.552,.448-1,1-1h0c.552,0,1,.448,1,1v1h1c2.761,0,5,2.239,5,5Zm0,10c0,3.86-3.141,7-7,7s-7-3.14-7-7,3.141-7,7-7,7,3.14,7,7Zm-5,.586l-1-1v-1.586c0-.552-.448-1-1-1h0c-.552,0-1,.448-1,1v2c0,.265,.105,.52,.293,.707l1.293,1.293c.39,.39,1.024,.39,1.414,0h0c.39-.39,.39-1.024,0-1.414Zm-11-.586c0-2.829,1.308-5.35,3.349-7H0v9c0,2.761,2.239,5,5,5h6.349c-2.041-1.65-3.349-4.171-3.349-7Z" />
                            </svg>
                            Attendance
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer></footer>
    </div>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script>
    document.getElementById("home").classList.add("active");

    function redirect(id) {
        switch (id) {
            case 1:
                window.location.href = "{{route('student')}}";
                break;
            case 2:
                window.location.href = "{{route('attendance')}}";
                break;
            case 3:
                window.location.href = "{{route('newAdmission')}}";
                break;
            case 4:
                window.location.href = "{{route('courses')}}";
                break;
            case 5:
                window.location.href = "{{route('examination')}}";
                break;
            case 6:
                window.location.href = "{{route('fees')}}";
                break;
        }
    }

</script>

</html>