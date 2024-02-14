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


        <div class="container my-5">
            <div class="row">

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


                <div class="col-md-1 pl-5 mt-4"><button onclick="window.location.href='home'" class="backBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="backSVG" viewBox="0 0 24 24" width="20"
                            height="20">
                            <path
                                d="M19,10.5H10.207l2.439-2.439a1.5,1.5,0,0,0-2.121-2.122L6.939,9.525a3.505,3.505,0,0,0,0,4.95l3.586,3.586a1.5,1.5,0,0,0,2.121-2.122L10.207,13.5H19a1.5,1.5,0,0,0,0-3Z" />
                        </svg>
                    </button>
                </div>
                <div class="my-4 col-md-10">
                    <div class="contlayout container p-4">
                        <h2 class='m-2 mb-4 tajText'>New Admission</h2>
                        <form id='form' action="{{route('saveAdmission')}}" method="post" enctype="multipart/form-data">
                            @CSRF

                            <p class='muted mx-3'> Personal Information </p>

                            <div class="row">
                                <div class="my-2 col-md-6">

                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="roll_no" class="form-label constant-width mx-3 mt-2">Roll
                                            No.</label>
                                        <label name="roll_no"
                                            class="form-label constant-width mx-3 mt-2">{{$roll_no}}</label>
                                        <input type="hidden" name="roll_no" class="form-control" value="{{$roll_no}}"
                                            required>
                                    </div>

                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="name" class="form-label constant-width mx-3 mt-2">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name"
                                            required>
                                    </div>

                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="fatherName"
                                            class="form-label constant-width mx-3 mt-2">Gender</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="male" required checked>
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="female" required>
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                    </div>


                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="cnic" class="form-label constant-width mx-3 mt-2">CNIC</label>
                                        <input type="tel" name="cnic" class="form-control" placeholder="00000-0000000-0"
                                            maxlength="13" required>
                                    </div>


                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="email" class="form-label constant-width mx-3 mt-2">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="abc@xyz.com"
                                            required>
                                    </div>
                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="phone" class="form-label constant-width mx-3 mt-2">Phone</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="03123456789"
                                            maxlength="11" required id='phoneVer'>
                                    </div>


                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="dob" class="form-label constant-width mx-3 mt-2">DOB</label>
                                        <input type="date" name="dob" class="form-control" required>
                                    </div>

                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <label for="dob"
                                            class="form-label constant-width mx-3 mt-2">Qualification</label>
                                        <input type="text" name="qualification" class="form-control"
                                            placeholder="Matric, F.Sc...">
                                    </div>
                                </div>

                                <div class="col-md-4 offset-md-2 my-2 text-end">
                                    <img id="previewImage" src="{{ asset('images/profile.png') }}" alt="placeholder"
                                        class="img-fluid rounded mx-auto d-block" width="200" height="200">
                                    <div class="my-2 col-md-12 d-flex align-items-center">
                                        <input type="file" id="imageInput" name="image" class="form-control"
                                            accept="image/*" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="my-2 col-md-12 d-flex align-items-center">
                                    <label for="address"
                                        class="form-label constant-width mx-2 px-2 mt-2">Address</label>
                                    <textarea type="text" name="address" class="form-control"
                                        placeholder="St-10 G-6/4 Islamabad" required></textarea>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="father" class="form-label constant-width mx-2 px-2 mt-2">Father's
                                        Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        placeholder="Father's Name" required>
                                </div>
                                <div class="my-2 col-md-6 d-flex align-items-center">
                                    <label for="fatherPhone" class="form-label constant-width mx-2 px-2 mt-2">Father's
                                        Phone</label>
                                    <input type="tel" name="father_contactNo" class="form-control"
                                        placeholder="03123456789" maxlength="11" id='phoneVer2' required>
                                </div>



                                <!-- section seperator -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr class="my-5">
                                        </div>
                                    </div>


                                    <p class='muted totalSec'>Courses Information</p>
                                    <div class="row">
                                        <div class="my-2 col-md-6 d-flex align-items-center">
                                            <label for="course"
                                                class="form-label constant-width mx-3 mt-2">Course</label>
                                            <select class="form-select" name="course" id="course" required>
                                                <option value="" selected disabled hidden>Select Course</option>
                                                @foreach($courses as $course)
                                                <option value="{{$course->course_id}}">{{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="course_id" id="course_id" required>
                                        </div>
                                        <div class="my-2 col-md-6 d-flex align-items-center">
                                            <label for="fees" class="form-label constant-width mx-3 mt-2">Course
                                                Fee</label>
                                            <input type="number" name="fees" class="form-control"
                                                placeholder="Course Fee" disabled id="coursefee" required>
                                        </div>


                                        <div class='text-center'>
                                            <button type="submit" class="myBtn5 my-5 ">Save</button>
                                        </div>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        </script>

    </div>

    <footer></footer>

</body>
<script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('bootstrap/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/nav.js')}}"></script>
<script>
    // enable batch selection when course is selected
    document.getElementById('course').addEventListener('change', function () { });

    // populate batch selection based on course selection
    document.getElementById('course').addEventListener('change', function () {

        var courses = @json($courses);

        var coursefee = document.getElementById("coursefee");
        var course = document.getElementById("course").value;

        for (var i = 0; i < courses.length; i++) {
            if (courses[i].course_id == course) {
                coursefee.value = courses[i].course_fees;
                coursefee.disabled = false;
                document.getElementById("course_id").value = courses[i].course_id;
            }
        }
    });


    document.getElementById('imageInput').addEventListener('change', function (e) {
        const fileInput = e.target;
        const previewImage = document.getElementById('previewImage');

        var size = fileInput.files[0].size;
        if (size > 1000000) {
            alert("File is too big!");
            fileInput.value = "";
            previewImage.src = "{{ asset('images/profile.png') }}";
        }
        else if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImage.src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);

        }
    });
</script>

</html>