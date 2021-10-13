<?php


namespace App\Helpers;


use App\Helpers\Forms\Contracts\EnrollmentFormHelper;
use App\Model\Supporter;
use App\Models\Acceptance;
use App\Models\AppliedCourse;
use App\Models\Enrollment;
use App\Models\ExamRecord;
use App\Models\Form;
use App\Models\HighSchool;
use App\Models\Invoice;
use App\Models\ParentDetail;
use App\Models\Scholarship;
use App\Models\StudentDetail;
use App\Repositories\Contracts\AppliedCourseRepository;
use App\Repositories\Contracts\EnrollmentRepository;
use App\Repositories\Contracts\FormRepository;
use App\Sibling;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class FixDatabase
{
    use \CommandOutput;

    public function populateFromApprovedForm($form_id)
    {
        $form = Form::findOrFail($form_id);
        if ($form->isApproved()) {
            $user = $form->appliedUser;
            $formHelper = app()->make(EnrollmentFormHelper::class);
            return $formHelper->populate($form->data, $user);
        } else {
            return 'Form is not Approved';
        }
    }

    public function deleteAllRecords()
    {
        $models = [
            AppliedCourse::class,
            StudentDetail::class,
            HighSchool::class,
            ExamRecord::class,
            Sibling::class,
            ParentDetail::class,
            Supporter::class,
            Enrollment::class,
            Scholarship::class,
            Invoice::class,
        ];

        foreach ($models as $model) {
            $model::query()->truncate();
            echo "Table for $model truncated.\n";
        }

        return 'All detail tables are truncated.';
    }

    public function migrateNuacMajors()
    {
        $forms = Form::all();
        $majors_with_english_keys = config('form-setting.majors');
        $majors_with_myanmar_keys = array_flip($majors_with_english_keys);
        foreach ($forms as $form) {
            $data = $form->data;
            $major = extract_value_from_array('major', $data);
            if ($major) {
                if (is_array($major)) {
                    $major = $major[0];
                }
                if ($major) {
                    $major_name = extract_value_from_array($major, $majors_with_myanmar_keys);
                    if ($major_name) {
                        $data['major'] = [$major_name];
                        $form->data = $data;
                        $form->save();
                    }
                }
            }
        }
    }

    public function addCourseIdInForms($default_major = null, $default_year = null)
    {
        $forms = Form::query()->get();
        $appliedCourseRepository = app()->make(AppliedCourseRepository::class);

        $this->showFeedback("Total Forms: {$forms->count()}");

        foreach ($forms as $index => $form) {
            $data = $form->data;
            $course_id = extract_value_from_array('course_id', $data);

            if (!$course_id) {
                $major = '';
                $major_in_data = extract_value_from_array('major', $data);

                if ($major_in_data === null) {
                    $data['major'] = [$default_major];
                } elseif (!is_array($major_in_data)) {
                    $data['major'] = [$major_in_data];
                }

                foreach ($data['major'] as $major_name) {
                    $major = $major === '' ? $major_name : $major . ', ' . $major_name;
                }

                $course = $appliedCourseRepository->findAppliedCourse($major, $data['year'], 'en');
                if ($course) {
                    $course_id = $course->id;
                } else {
                    $course_id = null;
                    echo "Course cannot find in database for form_id $form->id\n\n";
                }
                $data['course_id'] = $course_id;
                $form->data = $data;
                $form->save();
                $index++;
                $this->showFeedback("$index Form populated. \r", false);
            }

        }
        return "All ({$forms->count()}) have been updated.";
    }

    public function populateFromAllApprovedForms()
    {
        $forms = Form::where('approved_status', 1)->get();
        $formHelper = app()->make(EnrollmentFormHelper::class);
        $fontHelper = app()->make(FontHelper::class);
        $appliedCourseRepository = app()->make(AppliedCourseRepository::class);

        $myanmar_font_fields = config('constants.myanmar_font_fields');
        $majors = config('form-setting.majors');


        activity()->disableLogging();
        echo "Total Forms: {$forms->count()}\n";
        foreach ($forms as $index => $form) {
            $user = $form->appliedUser;
            $data = $form->data;
            $major = extract_value_from_array('major', $data);

            if (is_string($major)) {
                $key = array_search($major, $majors);
                $data['major'] = [$key];
            }

            $name_mm = extract_value_from_array('name_mm', $data);
            if ($name_mm) {
                if ($fontHelper->isZawgyi($name_mm)) {

                    foreach ($myanmar_font_fields as $myanmar_font_field) {
                        $value = extract_value_from_array($myanmar_font_field, $data);
                        if ($value) {
                            $value = $fontHelper->convertToUnicode($value);
                            $data[$myanmar_font_field] = $value;
                        }
                    }
                }
            }
            $address = extract_value_from_array('address', $data);
            if ($address) {
                unset($data['address']);
                $data['mother_address'] = $address;
            }
            $form->data = $data;
            $data['approved_at'] = $form->approved_at;
            if (!extract_value_from_array('course_id', $data)) {
                $course_id = $appliedCourseRepository->findAppliedCourse($data['major'][0], $data['year'], 'en')->id;
                $data['course_id'] = $course_id;
            }
            $form->save();
            $formHelper->populate($data, $user);
            $index++;
            echo "$index Form populated. \r";
        }
        echo "\n";
        activity()->enableLogging();
        return 'All forms are populated without error.';
    }

    public function populateMissingData($approved_status = 1, $payment_received_status = 1)
    {
        $columns = [
            'forms.id as form_id',
            'forms.applied_user_id as user_id',
            'enrollments.id as enrollment_id',
        ];

        $data = DB::table('forms')
            ->where('approved_status', $approved_status)
            ->where('payment_receive_status', $payment_received_status)
            ->leftJoin('enrollments', 'forms.applied_user_id', '=', 'enrollments.user_id')
            ->select($columns)
            ->get();

        print_r($data);

        $data->each(function ($value) use ($columns) {

            foreach ($columns as $column) {
                $attribute = Str::after($column, 'as ');
                if ($value->$attribute === null && $attribute !== 'scholarship_id') {
                    echo "\n$attribute is missing in User id ($value->user_id)";
                    echo $this->populateFromApprovedForm($value->form_id);
                }
            }
        });
    }

    public function changeUserId(string $table_name, array $data, $old_user_id = 0)
    {
        foreach ($data as $id => $user_id) {
            DB::table($table_name)
                ->where('id', $id)
                ->when($old_user_id > 0, function ($query) use ($old_user_id) {
                    return $query->where('user_id', $old_user_id);
                })
                ->update(['user_id' => $user_id]);
        }

        return DB::table($table_name)->whereIn('id', array_keys($data))->get();
    }

    public function findApprovedForms(string $table)
    {
        $data = DB::table('forms')
            ->where('forms.approved_status', '1')
            ->leftJoin($table, "$table.user_id", '=', 'forms.applied_user_id')
            ->select('forms.id as form_id', 'forms.applied_user_id', 'forms.approved_status', "$table.id as $table" . '_id')
            ->get();
        return $data;
    }

    public function createEnrollmentFromApprovedForm($form_id)
    {
        $formRepo = app()->make(FormRepository::class);
        $enrollmentRepo = app()->make(EnrollmentRepository::class);

        $form = $formRepo->findorfail($form_id);
        if ($form->approved_status === 1) {
            $form_data = $form->data;
            $user = $form->appliedUser;
            $approved_at = $form->approved_at;

            $enrollment = $enrollmentRepo->hydrate($form_data);
            $enrollment->created_at = $approved_at;
            $enrollment->updated_at = $approved_at;
            $enrollment = $user->enrollments()->save($enrollment);
            return $enrollment;
        }
    }


    public function migrateInvoices()
    {
        $forms = Form::where('approved_status', '<>', '2')
            ->where('payment_receive_status', 1)->orderBy('payment_received_at')->get();
        $formHelper = app()->make(EnrollmentFormHelper::class);
        echo "Total Forms: {$forms->count()}\n";
        foreach ($forms as $index => $form) {
            echo "Invoice for $form->id is calculating. \r";
            $status = $form->payment_receive_status;
            $message = $form->payment_receive_message;
            $payment_received_at = $form->payment_received_at;
            $payment_received_user = $form->payment_receive_user_id;

            $formHelper->saveInvoice($form, $status, $message, $payment_received_user, $payment_received_at);
            $index++;
            echo "$index invoices are issued. \r";

        }

        echo "\n";
        return 'Invoices for all forms are issued.';
    }
}
