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

        <section style="min-height:93vh;">
            <div class='container'>
                <div class="row pt-5">
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                        <h1 class=" text-center mb-4"><span class="tajText">Contact Us</span></h1>

                        <div class="container">

                            <div class="row ">

                                <div class="col-md-8 offset-md-3">

                                    <div class="d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24"
                                            width="20" height="20">
                                            <path
                                                d="M23.954,5.542,15.536,13.96a5.007,5.007,0,0,1-7.072,0L.046,5.542C.032,5.7,0,5.843,0,6V18a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V6C24,5.843,23.968,5.7,23.954,5.542Z" />
                                            <path
                                                d="M14.122,12.546l9.134-9.135A4.986,4.986,0,0,0,19,1H5A4.986,4.986,0,0,0,.744,3.411l9.134,9.135A3.007,3.007,0,0,0,14.122,12.546Z" />
                                        </svg>
                                        <p class='mx-4'>info@tajinstitute.com.pk</p>
                                    </div>

                                    <div class="d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" id="Filled" data-name="Layer 1"
                                            viewBox="0 0 24 24" width="20" height="20">
                                            <path
                                                d="M23,11a1,1,0,0,1-1-1,8.008,8.008,0,0,0-8-8,1,1,0,0,1,0-2A10.011,10.011,0,0,1,24,10,1,1,0,0,1,23,11Zm-3-1a6,6,0,0,0-6-6,1,1,0,1,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0Zm2.183,12.164.91-1.049a3.1,3.1,0,0,0,0-4.377c-.031-.031-2.437-1.882-2.437-1.882a3.1,3.1,0,0,0-4.281.006l-1.906,1.606A12.784,12.784,0,0,1,7.537,9.524l1.6-1.9a3.1,3.1,0,0,0,.007-4.282S7.291.939,7.26.908A3.082,3.082,0,0,0,2.934.862l-1.15,1C-5.01,9.744,9.62,24.261,17.762,24A6.155,6.155,0,0,0,22.183,22.164Z" />
                                        </svg>
                                        <p class='mx-4'>051-4474871</p>
                                    </div>

                                    <div class="d-flex">
                                        <svg onclick="window.location.href='https:/www.facebook.com/Oxyrichpakistan'" style="cursor:pointer;" xmlns="http://www.w3.org/2000/svg" id="Filled"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px"
                                            y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;"
                                            xml:space="preserve" width="20" height="20">
                                            <g>
                                                <path
                                                    d="M24,12.073c0,5.989-4.394,10.954-10.13,11.855v-8.363h2.789l0.531-3.46H13.87V9.86c0-0.947,0.464-1.869,1.95-1.869h1.509   V5.045c0,0-1.37-0.234-2.679-0.234c-2.734,0-4.52,1.657-4.52,4.656v2.637H7.091v3.46h3.039v8.363C4.395,23.025,0,18.061,0,12.073   c0-6.627,5.373-12,12-12S24,5.445,24,12.073z" />
                                            </g>
                                        </svg>
                                        <p onclick="window.location.href='https:/www.facebook.com/tajinstit'" style="cursor:pointer;" class='mx-4'>Taj Institute</p>
                                    </div>

                                    <div class="d-flex">
                                        <p >Office # 1, First floor, Aman Plaza, Near Jahaz Ground Stop, Khanna Road, Rawalpindi</p>
                                    </div>

                                    <div class="col-md-3"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('images/contact.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </section>

        <footer></footer>
    </div>

</body>
<script src="{{asset('js/nav.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script>
document.getElementById("contact").classList.add("active");
</script>

</html>