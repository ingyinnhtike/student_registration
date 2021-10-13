<?php
return [
    'site' => env('SITE'),

    'reports' => [

        /**
         * title =>[
         * 'title for excel column'=>'key in data array'
         * ]
         */

        'သင်တန််း' => [
            'စာသင်နှစ်' => 'year',
            'အဓိကဘာသာ' => 'major',
            'ခုံနံပါတ်' => 'roll_no',
            'တက္ကသိုလ်ဝင်မှတ်ပုံတင်အမှတ်'=>'university_roll_no',
            'စစ်ဆေးပြီး/မပြီး' => 'approved_status',
            'ငွေသွင်းပြီး/မပြီး' => 'payment_status',
            'ပညာသင်ဆုလျှောက်ထားခြင်း' => 'stipend',
        ],
        'ကျောင်းသား' => [
            'ကျောင်းသားအမည်' => 'name_mm',
            'ကျောင်းသားအမည်(eng)' => 'name_eng',
            'ဓါတ်ပုံ' => 'photo',
            'သွေးအုပ်စု' => 'blood_type',
            'ကျောင်းသား Email' => 'email',
            'အမြဲတမ်းဖုန်း' => 'permanent_phone',
            'အမြဲတမ်းလိပ်စာ' => 'permanent_address',
            'ယခုဖုန်း' => 'current_phone',
            'ယခုလိပ်စာ' => 'current_address',
            'ကျောင်းသားမွေးနေ့' => 'dob',
            'ကျောင်းသားဇာတိမြို့နယ်' => 'township',
            'ကျောင်းသားဇာတိပြည်နယ်' => 'state',
            'ကျောင်းသားမှတ်ပုံတင်' => 'nrc',
            'ကျောင်းသာလူမျိုး' => 'race',
            'ကျောင်းသားဘာသာ' => 'religion',
            'ကျောင်းသားလိင်' => 'gender',
        ],
        'ဖခင်' => [
            'ဖခင် အမည်' => 'father_name_mm',
            'ဖခင် အမည်(Eng)' => 'father_name_eng',
            'ဖခင် ဇာတိမြို့နယ်' => 'father_township',
            'ဖခင် ဇာတိပြည်နယ်' => 'father_state',
            'ဖခင် မှတ်ပုံတင်' => 'father_nrc',
            'ဖခင် လူမျိုး' => 'father_race',
            'ဖခင် ဘာသာ' => 'father_religion',
            'ဖခင် သက်ရှိထင်ရှားရှိမရှိ' => 'father_availability',
            'ဖခင် အုပ်ထိန်းသူဖြစ်မဖြစ်' => 'father_is_guardian',
            'ဖခင် အလုပ်အကိုင်' => 'father_work',
            'ဖခင် Email' => 'father_email',
            'ဖခင် ဖုန်း' => 'father_phone',
            'ဖခင် လိပ်စာ' => 'father_address',
        ],
        'မိခင်' => [
            'မိခင် အမည်' => 'mother_name_mm',
            'မိခင် အမည်(Eng)' => 'mother_name_eng',
            'မိခင် ဇာတိမြို့နယ်' => 'mother_township',
            'မိခင် ဇာတိပြည်နယ်' => 'mother_state',
            'မိခင် မှတ်ပုံတင်' => 'mother_nrc',
            'မိခင် လူမျိုး' => 'mother_race',
            'မိခင် ဘာသာ' => 'mother_religion',
            'မိခင် သက်ရှိထင်ရှားရှိမရှိ' => 'mother_availability',
            'မိခင် အုပ်ထိန်းသူဖြစ်မဖြစ်' => 'mother_is_guardian',
            'မိခင် အလုပ်အကိုင်' => 'mother_work',
            'မိခင် Email' => 'mother_email',
            'မိခင် ဖုန်း' => 'mother_phone',
            'မိခင် လိပ်စာ' => 'mother_address',
        ],
        'အခြားအုပ်ထိန်းသူ' => [
            'အခြားအုပ်ထိန်းသူ အမည်' => 'other_name_mm',
            'အခြားအုပ်ထိန်းသူ အမည်(Eng)' => 'other_name_eng',
            'အခြားအုပ်ထိန်းသူ ဇာတိမြို့နယ်' => 'other_township',
            'အခြားအုပ်ထိန်းသူ ပြည်နယ်' => 'other_state',
            'အခြားအုပ်ထိန်းသူ မှတ်ပုံတင်' => 'other_nrc',
            'အခြားအုပ်ထိန်းသူ လူမျိုး' => 'other_race',
            'အခြားအုပ်ထိန်းသူ ဘာသာ' => 'other_religion',
            'အခြားအုပ်ထိန်းသူ တော်စပ်ပုံ' => 'other_relation_to_user',
            'အခြားအုပ်ထိန်းသူ အလုပ်အကိုင်' => 'other_work',
            'အခြားအုပ်ထိန်းသူ Email' => 'other_email',
            'အခြားအုပ်ထိန်းသူ ဖုန်း' => 'other_phone',
            'အခြားအုပ်ထိန်းသူ လိပ်စာ' => 'other_address',
        ],
        'တက္ကသိုလ်ဝင်တန်း' => [
            'တက္ကသိုလ်ဝင်တန်း ခုံနံပါတ်' => 'high_school_roll_no',
            'တက္ကသိုလ်ဝင်တန်း စာစစ်ဌာန' => 'high_school_exam_location',
            'တက္ကသိုလ်ဝင်တန်း အောင်သည့်ခုနှစ်' => 'high_school_year',
            'တက္ကသိုလ်ဝင်တန်း စုစုပေါင်းရမှတ်' => 'high_school_total_mark',
            'တက္ကသိုလ်ဝင်တန်း ဂုဏ်ထူး' => 'high_school_distinctions',
        ],
        'ပညာသင်ဆု' => [
            'ပညာသင်ဆု အမည်' => 'scholar_name',
            'ပညာသင်ဆု ချီးမြှင့်သည့် အဖွဲ့အစည်း' => 'scholar_organization',
            'ပညာသင်ဆု ပမာဏ' => 'scholar_amount',
        ]
    ],
];
