<?php

use Illuminate\Support\Facades\Route;

Route::get('/student/{id}/{name}', function ($id, $name) {
    return view('student', ['id' => $id, 'name' => $name]);
});

Route::get('/course/{course}/{year?}', function ($course, $year = 3) {
    return view('course', ['course' => $course, 'year' => $year]);
});

Route::get('/ojt/{company}/{city}/{allowance?}', function ($company, $city, $allowance = 'No') {
    return view('ojt', ['company' => $company, 'city' => $city, 'allowance' => $allowance]);
});

Route::get('/event/{event_name}/{participant_name}/{year}', function ($event_name, $participant_name, $year) {
    return view('event', [
        'event_name' => $event_name,
        'participant' => $participant_name,
        'year' => $year
    ]);
});