<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Repositories\Contracts\CourseRepository;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function search(Request $request, CourseRepository $courseRepository)
    {
        $q = $request->get('q');
        $courses =  new CourseCollection($courseRepository->search($q));

        return response()->json($courses);

    }
}
