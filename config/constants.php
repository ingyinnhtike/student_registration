<?php
return [
    'states' => [
        1 => 'ဧရာဝတီတိုင်းဒေသကြီး',
        2 => 'ပဲခူးတိုင်းဒေသကြီး',
        3 => 'ချင်းပြည်နယ်',
        4 => 'ကချင်ပြည်နယ်',
        5 => 'ကယားပြည်နယ်',
        6 => 'ကရင်ပြည်နယ်',
        7 => 'မကွေးတိုင်းဒေသကြီး',
        8 => 'မန္တလေးတိုင်းဒေသကြီး',
        9 => 'မွန်ပြည်နယ်',
        10 => 'ရခိုင်ပြည်နယ်',
        11 => 'ရှမ်းပြည်နယ်',
        12 => 'စစ်ကိုင်းတိုင်းဒေသကြီး',
        13 => 'တနင်္သာရီတိုင်းဒေသကြီး',
        14 => 'ရန်ကုန်တိုင်းဒေသကြီး',
        15 => 'နေပြည်တော် ပြည်ထောင်စုနယ်မြေ',
    ],

    //-----for banning---------
    'max_time_to_look_in_minute' => 20,
    'interval' => 5,
    'wrong_code_per_interval' => 5,
    'min_ban_time_in_minute' => 5,
    'max_ban_time_in_minute' => 60 * 24 /* 24 hr */,

    'is_local' => env('APP_ENV') == 'local',

//    'exam_years' => [
//        1 => 'ပထမနှစ်',
//        2 => 'ဒုတိယနှစ်',
//        3 => 'တတိယနှစ်',
//        4 => 'စတုတ္ထနှစ်',
//        5 => 'ပဉ္စမနှစ်'
//    ],

    'min_high_school_year' => 2010,
    'max_high_school_year' => 2019,

    'blood_type' => [
        'A' => 'A',
        'B' => 'B',
        'O' => 'O',
        'AB' => 'AB'
    ],

    'start_date' => '2019-11-01 09:00:00',
    'end_date' => '2019-12-29 17:00:00',

    'myanmar_font_fields' => [
        'name_mm',
        'permanent_address',
        'current_address',
        'nrc',
        'race',
        'religion',

        'father_name_mm',
        'father_nrc',
        'father_nrc2',
        'father_race',
        'father_religion',
        'father_work',
        'father_address',


        'mother_name_mm',
        'mother_nrc',
        'mother_nrc2',
        'mother_race',
        'mother_religion',
        'mother_work',
        'mother_address',

        'other_name_mm',
        'other_nrc',
        'other_nrc2',
        'other_race',
        'other_religion',
        'other_work',
        'other_address',

        'high_school_exam_location',
        'high_school_distinctions',

        'scholar_name',
        'scholar_organization',


    ]
];
