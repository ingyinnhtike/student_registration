<?php


namespace App\Helpers;


use App\Models\Form;
use App\Models\StudentDetail;
use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckDatabase
{


    public static function checkDatabase()
    {
        $relations = [
            'studentDetails',
            'highSchools',
            'enrollments',
            'appliedCourses',
            'scholarships',
            'parentDetails',
            'siblings',
            'examRecords',
        ];

        foreach ($relations as $relation) {
            $users = User::doesnthave($relation)->whereNull('email')
                ->join('forms', 'users.id', '=', 'forms.applied_user_id')
                ->where('forms.approved_status', 1)->get();
            if ($users->count() > 0) {
                echo "Users missing $relation : total is {$users->count()}\n";
                echo $users->pluck('id') . "\n\n";
            }
        }

        return 'Database checking finished.';

    }
}
