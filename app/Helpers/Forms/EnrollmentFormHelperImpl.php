<?php


namespace App\Helpers\Forms;


use App\Helpers\Forms\Contracts\BaseFormHelper;
use App\Helpers\Forms\Contracts\EnrollmentFormHelper;
use App\Helpers\Forms\Contracts\PayableForm;
use App\Models\Form;
use App\Repositories\Contracts\AppliedCourseRepository;
use App\Repositories\Contracts\EnrollmentRepository;
use App\Repositories\Contracts\ExamHistoryRepository;
use App\Repositories\Contracts\FormRepository;
use App\Repositories\Contracts\HighSchoolRepository;
use App\Repositories\Contracts\InvoiceRepository;
use App\Repositories\Contracts\ParentDetailRepository;
use App\Repositories\Contracts\ScholarshipRepository;
use App\Repositories\Contracts\SiblingRepository;
use App\Repositories\Contracts\StudentDetailRepository;
use App\Repositories\Contracts\SupporterRepository;
use App\Repositories\Contracts\UserRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EnrollmentFormHelperImpl implements EnrollmentFormHelper, PayableForm
{


    private $studentDetailRepository;
    private $highSchoolRepository;
    private $parentDetailRepository;
    private $enrollmentRepository;
    private $appliedCourseRepository;
    private $supporterRepository;
    private $examHistoryRepository;
    private $scholarshipRepository;
    private $formRepository;
    private $invoiceRepository;
    private $siblingRepository;

    public function __construct(StudentDetailRepository $studentDetailRepository, HighSchoolRepository $highSchoolRepository,
                                ParentDetailRepository $parentDetailRepository, EnrollmentRepository $enrollmentRepository,
                                SupporterRepository $supporterRepository, ExamHistoryRepository $examHistoryRepository,
                                ScholarshipRepository $scholarshipRepository, FormRepository $formRepository,
                                InvoiceRepository $invoiceRepository, SiblingRepository $siblingRepository,
                                AppliedCourseRepository $appliedCourseRepository)
    {
        $this->studentDetailRepository = $studentDetailRepository;
        $this->highSchoolRepository = $highSchoolRepository;
        $this->parentDetailRepository = $parentDetailRepository;
        $this->enrollmentRepository = $enrollmentRepository;
        $this->supporterRepository = $supporterRepository;
        $this->examHistoryRepository = $examHistoryRepository;
        $this->scholarshipRepository = $scholarshipRepository;
        $this->formRepository = $formRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->siblingRepository = $siblingRepository;
        $this->appliedCourseRepository = $appliedCourseRepository;
    }

    function populate(array $data, Model $user = null)
    {
        $applied_course = $this->appliedCourseRepository->updateOrCreate($data, $user);
        $student_detail = $this->studentDetailRepository->updateOrCreate($data, $user);
        if (get_config('form-setting.is_high_school_required', true)) {
            $highSchool = $this->highSchoolRepository->updateOrCreate($data, $user);
        }

        if (get_config('form-setting.is_exam_required', true)) {
            $exams = $this->examHistoryRepository->updateOrCreate($data, $user);
        }

        if (get_config('form-setting.is_siblings_required', true)) {
            $siblings = $this->siblingRepository->updateOrCreate($data, $user);
        }
        $parents_details = $this->parentDetailRepository->updateOrCreate($data, $user);


        /*$supporter = $supporterRepository->create($data, $user);*/

        $enrollment = $this->enrollmentRepository->updateOrCreate($data, $user);
        $scholar = $this->scholarshipRepository->updateOrCreate($data, $user);
    }

    function hydrate(array $data)
    {
        $userRepository = app()->make(UserRepository::class);
        
        $enrollment = $this->enrollmentRepository->hydrate($data);
        
        $applied_course = $this->appliedCourseRepository->hydrate($data);;
        $student = $userRepository->hydrate($data);

        $studentDetail = $this->studentDetailRepository->hydrate($data);
        $parentDetails = $this->parentDetailRepository->hydrate($data);
        $supporter = $this->supporterRepository->hydrate($data);
        $highSchool = $this->highSchoolRepository->hydrate($data);
        $scholar = $this->scholarshipRepository->hydrate($data);
        $exams = $this->examHistoryRepository->hydrate($data);
        
        if (get_config('form-setting.is_siblings_required', true)) {
            $siblings = $this->siblingRepository->hydrate($data);
            $student->siblings = $siblings;
        }


        $student->studentDetails = $studentDetail;
        $student->parentDetails = $parentDetails;
        $student->supporters = $supporter;
        $student->highSchool = $highSchool;
        $student->scholarships = $scholar;
        $student->examRecords = $exams;
        $student->appliedCourses = $applied_course;
        
        $enrollment->student = $student;
       
        return $enrollment;
    }

    public function saveInvoice($form, $status, $message = null, $payment_received_user = null, $payment_received_at = null)
    {
        if ($payment_received_user === null) {
            $payment_received_user = auth()->user();
        } elseif (is_numeric($payment_received_user)) {
            $payment_received_user = User::findOrfail($payment_received_user);
        }

        if (is_numeric($form)) {
            $form = $this->formRepository->findOrFail($form);
        }

        if ($payment_received_at === null) {
            $payment_received_at = Carbon::now();
        }

        $data = [
            'form_id' => $form->id,
            'payment_received_at' => $payment_received_at,
            'payment_received_status' => $status,
            'payment_received_message' => $message,
        ];

        if ($status == 0) {
            //pending and should do noting;
            return;

        } elseif ($status == 1) {
            //accept and prepare invoice data
            $data['data'] = $this->getInvoiceData($form);

        } elseif ($status == 2) {
            //denied
        }

        return $this->invoiceRepository->create($data, $payment_received_user);
    }

    private function getInvoiceData(Form $form)
    {
        $applied_user = $form->appliedUser;
        $fines = $applied_user->fines;
        $fees = $form->appliedUser->appliedCourses->last()->course->fees;
        $total = 0;
        $data = [];
        foreach ($fines as $fine) {
            $amount = $fine->pivot->amount;
            $total += $amount;
            $data['fine'][$fine->name] = [
                'name' => $fine->name,
                'name_en' => $fine->name_en,
                'description' => $fine->description,
                'amount' => $amount,
                'remark' => $fine->pivot->remark
            ];
        }

        foreach ($fees as $fee) {
            $amount = $fee->pivot->amount;
            $total += $amount;
            $data['fee'][$fee->name] = [
                'name' => $fee->name,
                'name_en' => $fee->name_en,
                'description' => $fee->description,
                'amount' => $amount,
                'remark' => $fee->pivot->remark
            ];
        }

        $data['total'] = $total;
        return $data;
    }

}
