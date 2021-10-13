<?php

namespace App\Http\Controllers\user;

use App\Helpers\Authorizable;
use App\Helpers\FontHelper;
use App\Helpers\Forms\Contracts\EnrollmentFormHelper;
use App\Helpers\PhotoSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\NrcStateNumber;
use App\Repositories\Contracts\AppliedCourseRepository;
use App\Repositories\Contracts\FormRepository;
use App\Repositories\Contracts\TownshipRepository;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EnrollmentController extends Controller
{
    use Authorizable;
    protected $formType = 1;
    

    public function index()
    {
        $student = auth()->user();
        return view('user.enrollment.index', compact('student'));
    }

    public function create()
    {
        $student = auth()->user();

        if ($student->appliedForms()->where('form_type_id', $this->formType)->get()->count() > 0) {
            return redirect()->route('student.dashboard');
        }

         $nrc_data = NrcStateNumber::with('townships')->get()->all();
       
        return view('user.enrollment.create', compact('nrc_data'));

    }

    public function store(EnrollmentRequest $request, PhotoSaver $photoSaver, FormRepository $formRepository
        , TownshipRepository $townshipRepository, FontHelper $fontHelper, AppliedCourseRepository $appliedCourseRepository)
    {
       
        $student = auth()->user();
        if ($student->appliedForms()->where('form_type_id', $this->formType)->get()->count() > 0) {
            return redirect()->route('student.dashboard');
        }
       
        $photo = $photoSaver->savePhoto($request);
        if ($photo === null) {
            $photo = 'default.jpg';
        }
       
        $data = $request->except(['_token', 'method']);
        
        $name_mm = extract_value_from_array('name_mm', $data);
        $data['nrc'] = $this->changeNrcFormat($request);
        $data['father_nrc'] = $this->fatherchangeNrcFormat($request);
        $data['mother_nrc'] = $this->motherchangeNrcFormat($request);
        $data['other_nrc'] = $this->otherchangeNrcFormat($request);
        
        $data['nrc2'] = $this->changeNrc2Format($request);
        $data['father_nrc2'] = $this->changefatherNrc2Format($request);
        $data['mother_nrc2'] = $this->changemotherNrc2Format($request);
        $data['other_nrc2'] = $this->changeotherNrc2Format($request);
        
        if ($name_mm) {
            if ($fontHelper->isZawgyi($name_mm)) {
                $myanmar_font_fields = config('constants.myanmar_font_fields');
                foreach ($myanmar_font_fields as $myanmar_font_field) {
                    $value = extract_value_from_array($myanmar_font_field, $data);
                    if ($value) {
                        $value = $fontHelper->convertToUnicode($value);
                        $data[$myanmar_font_field] = $value;
                    }
                }
            }
        }

        
        $data['nrc'] = $this->changeNrcFormat($request);
        $data['father_nrc'] = $this->fatherchangeNrcFormat($request);
        $data['mother_nrc'] = $this->motherchangeNrcFormat($request);


        if($data['university_start_year'] == null)
        {
            $university_year = $data['ude_university_start_year'];
            $data['university_start_year'] = $university_year;
            
        }
        
        if($data['university_status'] == '0')
        {
            $major = $data['major'];
            
            $year = $data['year'];
            
            $course = Course::with('major','year')
                            ->where('major_id', $major)
                            ->where('year_id', $year)
                            ->first();
            
        $data['nrc'] = $this->changeNrcFormat($request);
        $data['father_nrc'] = $this->fatherchangeNrcFormat($request);
        $data['mother_nrc'] = $this->motherchangeNrcFormat($request);

            $data['course_id'] =$course->id;
            $course = Course::with('major', 'year')->find($data['course_id']);
            $data['major'] = $course->major->name_en;
            $data['year'] = $course->year->name_en;    

        }
        else
        {
            if (!extract_value_from_array('course_id', $data)) 
            {
                $course_id = $appliedCourseRepository->findAppliedCourse($data['major'][0], $data['year'], 'en')->id;
                $data['course_id'] = $course_id;
                        
            }
                
        }
        
        
        $data['photo'] = $photo;

        $data['form_type_id'] = $this->formType;

        $data = $townshipRepository->transformData($data);
        
        $user = auth()->user();

        $form = $formRepository->create($data, $user);
        
        return redirect()->route('student.dashboard');
    }

    public function edit($id, FormRepository $formRepository, EnrollmentFormHelper $formHelper)
    {
        
        $form = $formRepository->findOrFail($id);
        
        if ($form->isApproved() && config('site-setting.can_edit_after_approved', false)) {
            return abort('403', 'Form has already been approved');
        }

        if ($form->isRejected()) {
            return abort('403', 'Form has already been rejected.');
        }
        
        $data = $form->data;
       
        $student_state = State::find($data['state']);
        $father_state = State::find($data['father_state']);
        $mother_state = State::find($data['mother_state']);
        $other_state = State::find($data['other_state']);
        
        $enrollment = $formHelper->hydrate($data);
        $parents = $enrollment->student->parentDetails ?? null;
        
        $other = $parents->where('relation_to_user',"!=",'father')
        ->where('relation_to_user','!=','mother')->where('relation_to_user', '!=', '')->first();
        //dd($enrollment->student->studentDetails->state);
        $nrc_data = NrcStateNumber::with('townships')->get()->all();
        return view('user.enrollment.edit', compact('enrollment', 'student_state', 'other_state' , 'father_state', 'mother_state', 'form', 'nrc_data', 'data'));
    }

    public function update(Request $request, PhotoSaver $photoSaver,
                           FormRepository $formRepository, EnrollmentFormHelper $formHelper,
                           TownshipRepository $townshipRepository, AppliedCourseRepository $appliedCourseRepository,
                           $id)
    {
        
        $data = $request->except(['_token', 'method']);
        $data = $townshipRepository->transformData($data);
        $data['nrc2'] = "";
        
        $form = $formRepository->findOrFail($id);
        
        if ($form->isApproved() && config('site-setting.can_edit_after_approved', false)) {
            return abort('403', 'Form has already been approved');
        }

        if ($form->isRejected()) {
            return abort('403', 'Form has already been rejected.');
        }

        
        $photo = $photoSaver->savePhoto($request);
        if ($photo === null) {
            $photo = $form->data['photo'] ?? 'default.jpg';
        }
        
        $major = extract_value_from_array('major', $data);
        
        $year = extract_value_from_array('year', $data);
        
        if ($major === null || $year === null) {
            $course = Course::with('major', 'year')->find($data['course_id']);
            $data['major'] = $course->major->name_en;
            $data['year'] = $course->year->name_en;
           
        }else{
            $course = Course::with('major','year')
                            ->where('major_id', $data['major'])
                            ->where('year_id', $data['year'])
                            ->first();
            $data['major'] =$course->major->name_en;
            $data['year'] =$course->year->name_en;
            
            $data['course_id'] = $course->id;
        }
        
        // $new_course_id = extract_value_from_array('course_id', $data);
        $new_course_id = $data['course_id'];
        
        if ($new_course_id === null) {
            $course_id = $appliedCourseRepository->findAppliedCourse($data['major'][0], $data['year'], 'en')->id;
            $data['course_id'] = $course_id;
            
        }
        $data['photo'] = $photo;
        
        $update_status = $formRepository->update($data, $form);
        
        $approve_status = $request->get('is_approve', false);
        
        if ($update_status && $approve_status) {

            $form = $formRepository->findOrFail($id);
            $user = $form->appliedUser;
            $formRepository->approve($form, $approve_status);

            $data = $form->data;

            $formHelper->populate($data, $user);
        }

        
        return redirect()->route('admin.acceptance.index', ['accept_type' => 'approve', 'status' => 0]);
    }

    public function show($id, FormRepository $formRepository,
                         EnrollmentFormHelper $formHelper)
    {
        $form = $formRepository->findOrFail($id);
        
//        if($form->approved_status === 1){
//            $result =  $form->appliedUser()->with('appliedCourses.course.major','parentDetails','studentDetails','scholarships','siblings','examRecords','enrollments')->first();
//        }
        $data = $form->data;
        
        $enrollment = $formHelper->hydrate($data);
        //        dd($result);
        
        return view('user.enrollment.show', compact('enrollment', 'form'));
    }

    private function changeNrcFormat($request)
    {
        //combine nrc format
        return $request->get('nrc_state').'/'.$request->get('nrc_township').$request->get('nrc_citizenship').$request->get('nrc_number');
    }
    private function fatherchangeNrcFormat($request)
    {
        //combine nrc format
        return $request->get('father_nrc_state').'/'.$request->get('father_nrc_township').$request->get('father_nrc_citizenship').$request->get('father_nrc_number');
        
    }
    private function motherchangeNrcFormat($request)
    {
        //combine nrc format
        return $request->get('mother_nrc_state').'/'.$request->get('mother_nrc_township').$request->get('mother_nrc_citizenship').$request->get('mother_nrc_number');
        
    }
    private function otherchangeNrcFormat($request)
    {
        //combine nrc format
        return $request->get('other_nrc_state').'/'.$request->get('other_nrc_township').$request->get('other_nrc_citizenship').$request->get('other_nrc_number');
    }
    private function changeNrc2Format($request)
    {
        //combine nrc format
        return $request->get('nrc2_citizenship').$request->get('nrc2_number');
    }
    private function changefatherNrc2Format($request)
    {
        //combine nrc format
        return $request->get('father_nrc2_citizenship').$request->get('father_nrc2_number');
    }
    private function changemotherNrc2Format($request)
    {
        //combine nrc format
        return $request->get('mother_nrc2_citizenship').$request->get('mother_nrc2_number');
    }
    private function changeotherNrc2Format($request)
    {
        //combine nrc format
        return $request->get('other_nrc2_citizenship').$request->get('other_nrc2_number');
    }



}
