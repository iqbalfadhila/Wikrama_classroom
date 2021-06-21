<?php

use App\Student;
use App\Teacher;
use Illuminate\Support\Facades\Auth;

function getAuthRombel()
{
    return Student::select('id', 'user_id', 'rombel_id')->where('user_id', Auth::user()->id)
        ->with('rombel')->get();
}

function getProfileImg()
{
    return Teacher::select('id', 'user_id', 'photo')
        ->where('user_id', Auth::user()->id)->first()->photo;
}

function getProfile()
{
    return Student::select('id', 'user_id', 'photo')
        ->where('user_id', Auth::user()->id)->first()->photo;
}
