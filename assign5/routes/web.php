<?php

use Illuminate\Support\Facades\Route;

Route::get('/evaluation', function () {
  
    $name = 'Tristan Garin';
    $prelim = 92;
    $midterm = 88;
    $final = 94;

    $average = ($prelim + $midterm + $final) / 3;

    return view('evaluation', [
        'name' => $name,
        'prelim' => $prelim,
        'midterm' => $midterm,
        'final' => $final,
        'average' => $average
    ]);
});