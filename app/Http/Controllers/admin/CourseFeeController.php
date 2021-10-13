<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Authorizable;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseFeeController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function store(Request $request, CourseRepository $courseRepository)
    {
        $courseRepository->addFee($request->all());
        return response()->json(['message' => 'သင်တန်းကြေးထည့်ပီးပါပြီ။', 'status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $amount = $request->get('amount');
        if ($amount) {
            $status = DB::table('course_fee')
                ->where('id', $id)
                ->update(['amount' => $amount]);
            return response()->json(['message' => "သင်တန်းကြေးကို update လုပ်ပြီးပါပြီ။", 'status' => $status]);
        }else{
            return response()->json(['message' => "သင်တန်းကြေး ပမာဏ ဖြည့်ရန်လိုအပ်ပါသည်", 'status' => false]);
        }
    }

    public function destroy($id, CourseRepository $courseRepository)
    {
        $course_fee = $courseRepository->findCourseFee($id, ['fees.name as fee_name']);
        $fee_name = $course_fee->fee_name;
        $status = $courseRepository->destroyCourseFee($id);
        return response()->json(['message' => "$fee_name ကိုပယ်ဖျက်ပြီးပါပြီ။", 'status' => $status]);
    }
}
