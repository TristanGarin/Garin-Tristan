<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Evaluation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }

        .data-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f9f9f9;
        }

        .data-row strong {
            color: #555;
        }

        .grade-value {
            font-weight: bold;
            color: #333;
        }

        .section-title {
            color: #0056b3;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 18px;
        }


        .pass {
            color: green;
            font-weight: bold;
        }

        .fail {
            color: red;
            font-weight: bold;
        }

        .neutral {
            color: #555;
        }

        .gold {
            color: #d4af37;
        }

        .silver {
            color: #c0c0c0;
        }

        .bronze {
            color: #cd7f32;
        }

        .error-msg {
            color: red;
            background-color: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid #ffcccc;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="header">
            <h2>Student Evaluation</h2>
        </div>

        @php
            $isValid = ($prelim >= 0 && $prelim <= 100) &&
                ($midterm >= 0 && $midterm <= 100) &&
                ($final >= 0 && $final <= 100);
        @endphp

        @if(!$isValid)
            <div class="error-msg">
                <strong>Error:</strong> Grades must be between 0 and 100.
            </div>
            <div class="data-row">
                <span>Student Name:</span>
                <strong>{{ $name }}</strong>
            </div>
        @else
            <h3 class="section-title">Student Details</h3>

            <div class="data-row">
                <span>Student Name:</span>
                <span>{{ $name }}</span>
            </div>
            <div class="data-row">
                <span>Prelim Grade:</span>
                <span class="grade-value">{{ $prelim }}</span>
            </div>
            <div class="data-row">
                <span>Midterm Grade:</span>
                <span class="grade-value">{{ $midterm }}</span>
            </div>
            <div class="data-row">
                <span>Final Grade:</span>
                <span class="grade-value">{{ $final }}</span>
            </div>

            <h3 class="section-title">Results</h3>

            <div class="data-row">
                <strong>Average:</strong>
                <span>{{ number_format($average, 2) }}</span>
            </div>

            <div class="data-row">
                <strong>Letter Grade:</strong>
                @if ($average >= 90)
                    <span class="pass">A</span>
                @elseif ($average >= 80)
                    <span class="pass">B</span>
                @elseif ($average >= 70)
                    <span class="neutral">C</span>
                @elseif ($average >= 60)
                    <span class="fail">D</span>
                @else
                    <span class="fail">F</span>
                @endif
            </div>

            <div class="data-row">
                <strong>Remarks:</strong>
                @if ($average >= 75)
                    <span class="pass">Passed</span>
                @else
                    <span class="fail">Failed</span>
                @endif
            </div>

            <div class="data-row">
                <strong>Award:</strong>
                @if ($average >= 98)
                    <span class="gold">With Highest Honors</span>
                @elseif ($average >= 95)
                    <span class="silver">With High Honors</span>
                @elseif ($average >= 90)
                    <span class="bronze">With Honors</span>
                @else
                    <span class="neutral">No Award</span>
                @endif
            </div>
        @endif
    </div>

</body>

</html>