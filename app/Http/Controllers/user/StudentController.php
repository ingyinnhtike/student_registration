<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user();
        $form = $student->appliedForms()
//                        ->with('appliedUser.appliedCourses.course.fees')
                        ->first();
        
//        $fees = $form->appliedUser->appliedCourses->course->fees?? null;
//        $fees = null;
        $fees = Course::first()->fees;//todo update


        return view('user.dashboard', compact('student','form','fees'));
    }
}
