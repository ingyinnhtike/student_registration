<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrollmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

//        $majors = get_config('form-setting.majors');
//        $majors = array_keys($majors);
//        $max_major = get_config('form_setting.major_limit', 1);
//        $max_dob = Carbon::now()->subYears(15);
//
//        $min_name_mm_length = 3;
//        $max_name_mm_length = 100;
//
//        $min_name_en_length = 3;
//        $max_name_en_length = 100;
//
//        $min_race_length = 2;
//        $max_race_length = 100;
//
//        $min_high_school_year = Carbon::now()->subYears(15);
//        $max_high_school_year = Carbon::now();
        return [
            'photo' => 'image|mimes:jpeg,png|max:2048',
//            'year' => 'required|string',
//            'major' => "required|array|in:$majors|min:1|max:$max_major",
//            'roll_no' => 'required|string',
//            'university_start_year' => 'required|string',
//
//            //student-detail
//            'name_mm' => "string|required|min:$min_name_mm_length|max:$max_name_mm_length",
//            'name_eng' => "string|required|min:$min_name_en_length|max:$max_name_en_length",
//            'gender' => ['required', Rule::in(['male', 'female'])],
//            'blood_type' => Rule::in(['A', 'B', 'AB', 'O']),
//            'race' => "required|string|min:$min_race_length|max:$max_race_length",
//            'religion' => 'required|string|min:3|max:100',
//            'township' => 'required|string|min:3|max:100',
//            'state' => 'required|digits_between:1,15',
//            'nrc' => 'required|string|min:13|max:30',
//            'dob' => "required|date|before_or_equal:$max_dob",
//            'email' => 'email',
//            'permanent_address' => 'required|string|min:10|max:255',
//            'permanent_phone' => 'required|max:15|min:7',
//
//            //father
//            'father_name_mm' => "required|string:$min_name_mm_length|max:$max_name_mm_length",
//            'father_name_eng' => "required|string:$min_name_en_length|max:$max_name_en_length",
//            'father_race' => "required|string|min:$min_race_length|max:$max_race_length",
//            'father_religion' => 'string|min:3|max:100',
//            'father_township' => 'string|min:3|max:100',
//            'father_state' => 'required|digits_between:1,15',
//            'father_nrc' => 'string|min:13|max:30',
//            'father_email' => 'email',
//            'father_availability' => 'required|digits_between:0,1',
//            'father_address' => 'required_if:availability,===,1|string|min:10|max:255',
//            'father_phone' => 'required_if:availability,===,1|max:15|min:7',
//            'father_is_guardian' => 'required|digits_between:0,1',
//
//            //mother
//            'mother_name_mm' => "required|string:$min_name_mm_length|max:$max_name_mm_length",
//            'mother_name_eng' => "required|string:$min_name_en_length|max:$max_name_en_length",
//            'mother_race' => "required|string|min:$min_race_length|max:$max_race_length",
//            'mother_religion' => 'string|min:3|max:100',
//            'mother_township' => 'string|min:3|max:100',
//            'mother_state' => 'required|digits_between:1,15',
//            'mother_nrc' => 'string|min:13|max:30',
//            'mother_email' => 'email',
//            'mother_availability' => 'required|digits_between:0,1',
//            'mother_address' => 'required_if:availability,===,1|string|min:10|max:255',
//            'mother_phone' => 'required_if:availability,===,1|max:15|min:7',
//            'mother_is_guardian' => 'required|digits_between:0,1',
//
//            //other guardian
//            'other_name_mm' => "string:$min_name_mm_length|max:$max_name_mm_length",
//            'other_name_eng' => "required_with:other_name_mm|string:$min_name_en_length|max:$max_name_en_length",
//            'other_race' => "required_with:other_race|string|min:$min_race_length|max:$max_race_length",
//            'other_religion' => 'string|min:3|max:100',
//            'other_township' => 'string|min:3|max:100',
//            'other_state' => 'required_with:other_race|digits_between:1,15',
//            'other_nrc' => 'string|min:13|max:30',
//            'other_email' => 'email',
//            'other_availability' => 'required_with:other_state|integer|size:1',
//            'other_address' => 'required_with:other_state|string|min:10|max:255',
//            'other_phone' => 'required_with:other_address|max:15|min:7',
//            'other_is_guardian' => 'required_with:other_phone|integer|size:1',
//
//            //high school
//            'high_school_roll_no' => 'string|min:3|max:10',
//            'high_school_year' => "required_with:high_school_roll_no|integer|min:$min_high_school_year|max:$max_high_school_year",
//            'high_school_exam_location' => 'required_with:high_school_year|string|min:5|max:30',
//            'high_school_mark' => 'array|size:6',
//            'high_school_total_mark' => 'required_with:high_school_exam_location|integer|min:240|max:570',
//            'high_school_distinctions' => 'string|min:3|max:255',
//
//
//            //fee
//            'stipend' => 'digits_between:0,1',
//
//            //scholar
//            'has_scholar' => 'digits_between:0,1',
//            'scholar_name' => 'required_if:has_scholar,===,1|string|min:3|max:100',
//            'scholar_organization' => 'required_if:has_scholar,===,1|string|min:3|max:100',
//            'scholar_amount' => 'required_if:has_scholar,===,1|integer|min:1000',
//
//            'current_address' => 'required|string|min:10|max:255',
//            'current_phone' => 'required|max:15|min:7',
//
//            //boudoir
//            'boudoir_no' => 'string|min:1|max:10',
//            'boudoir_room_no' => 'string|min:1|max:10',
//            'boudoir_name' => 'string|min:1|max:255'
//

        ];
    }

    public function messages()
    {
        return [
            'photo.max' => 'ဓာတ်ပုံအရွယ်အစားကို 2MB အောက်သာသုံးပေးပါ။',
        ];
    }
}
