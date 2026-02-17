@php
   
    $photo = asset('images/me1.jpg'); 
    $name = "Tristan T. Garin";
    $title = "4th Year BS Information Technology Student";
    $phone = "09482013598";
    $email = "tristangarin710@gmail.com";
    $address = "056 Rose Street Mapandan Pangasinan";
    $dob = "December 06, 2003";
    $age = 22;
    $gender = "Male";
    $nationality = "Filipino";
    $linkedin = "www.linkedin.com/in/tristan-garin-1b65ba344";
    $github = "https://github.com/TristanGarin";

    
    $pangasinanAge = 'Duadua tan anem';


    $profile = "Motivated and detail-oriented 4th-year Information Technology student 
            with hands-on academic experience in software development, databases, 
            and mobile applications. Passionate about learning new technologies 
            and applying theoretical knowledge into practical projects.";


    $hs_year = "2016 - 2020";
    $hs_school = "Mapandan National High School";
    $hs_details = "High School Diploma | GWA: 92% | Graduated With Honor";

    $college_year = "2022 - Present";
    $college_school = "Pangasinan State University - Urdaneta City Campus";
    $cgpa = "N/A";
    $specialization = "Bachelor of Science in Information Technology (4th Year)";


    $work_year = "2022 – Present";
    $job_title = "Academic Project Developer";
    $company = "Pangasinan State University";

    $responsibilities = [
        "Created a mobile application using Flutter as part of academic requirements.",
        "Designed and maintained small-scale databases for school projects.",
        "Presented research and system documentation to faculty panels."
    ];


    $skills = [
        "PHP & MySQL",
        "JavaScript",
        "HTML & CSS",
        "Flutter",
        "Database Management"
    ];
@endphp



<!DOCTYPE html>
<html>

<head>
    <title>Biodata</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f4f4;
        }

        .resume {
            width: 900px;
            margin: 20px auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .top {
            display: flex;
        }

        .photo {
            width: 32%;
            background: #e9e9e9;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .top-right {
            width: 68%;
            background: #0b5fa5;
            color: white;
            padding: 25px;
        }

        .top-right h1 {
            margin: 0;
            font-size: 34px;
        }

        .top-right h3 {
            margin-top: 5px;
            font-weight: normal;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-top: 15px;
            font-size: 14px;
        }

        .info-grid p {
            margin: 6px 0;
        }

        .content {
            padding: 25px;
        }

        h2.section-title {
            color: #0b5fa5;
            border-bottom: 2px solid #0b5fa5;
            padding-bottom: 4px;
            margin-top: 25px;
            font-size: 18px;
        }

        .row {
            margin-bottom: 12px;
        }

        .year {
            font-weight: bold;
            color: #0b5fa5;
            width: 120px;
            display: inline-block;
        }

        ul {
            margin: 5px 0 10px 20px;
        }
    </style>
</head>

<body>

    <div class="resume">

        <div class="top">
            <div class="photo">
                <img src="{{ $photo }}" alt="Profile Photo">
            </div>

            <div class="top-right">
                <h1>{{ $name }}</h1>
                <h3>{{ $title }}</h3>

                <div class="info-grid">
                    <p><strong>Phone:</strong> {{ $phone }}</p>
                    <p><strong>Address:</strong> {{ $address }}</p>

                    <p><strong>Email:</strong> {{ $email }}</p>
                    <p><strong>Date of Birth:</strong> {{ $dob }}</p>

                    <p><strong>LinkedIn:</strong> {{ $linkedin }}</p>
                    <p>
                        <strong>Age:</strong> {{ $age }}
                        @if($age == 21)
                            (Dalawampu’t Isa)
                        @elseif($age >= 22 && $age <= 23)
                            ({{ $age == 22 ? 'Dua pulo ket dua' : 'Dua pulo ket tallo' }})
                        @elseif($age > 24)
                            ({{ $pangasinanAge }})
                        @endif
                    </p>

                    <p><strong>GitHub:</strong> {{ $github }}</p>
                    <p><strong>Gender:</strong> {{ $gender }}</p>

                    <p><strong>Nationality:</strong> {{ $nationality }}</p>
                </div>
            </div>
        </div>

        <div class="content">
          
            <p>{{ $profile }}</p>

            <h2 class="section-title">Education</h2>
            <div class="row">
                <span class="year">{{ $hs_year }}</span>
                <strong>{{ $hs_school }}</strong><br>
                {{ $hs_details }}
            </div>

            <div class="row">
                <span class="year">{{ $college_year }}</span>
                <strong>{{ $college_school }}</strong><br>
                CGPA: {{ $cgpa }}<br>
                Specialization: {{ $specialization }}
            </div>

            <h2 class="section-title">Experience</h2>
            <div class="row">
                <span class="year">{{ $work_year }}</span>
                <strong>{{ $job_title }}</strong><br>
                {{ $company }}
                <ul>
                    @foreach($responsibilities as $task)
                        <li>{{ $task }}</li>
                    @endforeach
                </ul>
            </div>

            <h2 class="section-title">Skills</h2>
            <ul>
                @foreach($skills as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </div>

    </div>

</body>

</html>