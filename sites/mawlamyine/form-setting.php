<?php
return [
    'heading' => 'ကျောင်းသားများ ပညာဆက်လက်သင်ခွင့် လျှောက်လွှာ',
    'steps_width' => '',
    'progress_bar' => '',
    'roll_no' => 'ယခင်နှစ် ခုံအမှတ် (သို့မဟုတ်) ဝင်ခွင့်အမှတ်စဉ် *',
    'current_address' => 'ယခုဆက်သွယ်ရန်လိပ်စာ * (အဆောင်နေပါက အဆောင်အမည်နှင့်လိပ်စာ ထည့်ရန်)',
    'is_first_year' => false,
    'has_la_wa_ka' => false,
    'is_exam_required' => true,
    'is_high_school_required' => false,
    'is_siblings_required' => false,
    'has_district' => false,
    'has_mme' => true,
    'has_bloodtype' => false,
    'is_student_work_required' => false,
    'is_diploma'=>true,
    'year' => [
        'First Year',
        'Second Year',
        'Third Year',
        'Forth Year',
        'First Year Honors',
        'Second Year Honors',
        'Third Year Honors',
        'Master Qualification Course',
        'Master First Year',
        'Master Second Year'
    ],
    'years_to_seed' => [
        [
            'name_en' => 'First Year',
            'name' => 'ပထမနှစ်'
        ],
        [
            'name_en' => 'Second Year',
            'name' => 'ဒုတိယနှစ်'
        ],
        [
            'name_en' => 'Third Year',
            'name' => 'တတိယနှစ်'
        ],
        [
            'name_en' => 'Forth Year',
            'name' => 'စတုတ္ထနှစ်'
        ],
        [
            'name_en' => 'First Year Honors',
            'name' => 'ပထမနှစ်ဂုဏ်ထူးတန်း'
        ],
        [
            'name_en' => 'Second Year Honors',
            'name' => 'ဒုတိယနှစ်ဂုဏ်ထူးတန်း'
        ],
        [
            'name_en' => 'Third Year Honors',
            'name' => 'တတိယနှစ်ဂုဏ်ထူးတန်း'
        ],
        [
            'name_en' => 'Master Qualification Course',
            'name' => 'မဟာအရည်အချင်းစစ်တန်း'
        ],
        [
            'name_en' => 'Master First Year',
            'name' => 'မဟာတန်း ပထမနှစ်'
        ],
        [
            'name_en' => 'Master Second Year',
            'name' => 'မဟာတန်း ဒုတိယနှစ်'
        ],
    ],
    'majors' => [
        'mm' => 'မြန်မာစာ',
        'eng' => 'အင်္ဂလိပ်စာ',
        'geo' => 'ပထဝီဝင်',
        'histroy' => 'သမိုင်း',
        'datha' => 'ဒဿနိကဗေဒ',
        'psyscho' => 'စိတ်ပညာ',
        'law' => 'ဥပဒေပညာ',
        'chemistry' => 'ဓာတုဗေဒ',
        'physics' => 'ရူပဗေဒ',
        'math' => 'သင်္ချာ',
        'zoology' => 'သတ္တဗေဒ',
        'botany' => 'ရုက္ခဗေဒ',
        'earth' => 'ဘူမိဗေဒ',
        'ms' => 'အဏ္ဏဝါသိပ္ပံ',
        'bio-chem' => 'ဇီဝဓာတုဗေဒ',
        'mb' => 'အဏုဇီဝဗေဒ',
        'oriental' => 'အရှေ့တိုင်းပညာ'
    ],
    'majors_to_seed' => [
        ['name_en' => 'Myanmar', 'name' => 'မြန်မာစာ', 'key' => 'mm',],
        ['name_en' => 'English', 'name' => 'အင်္ဂလိပ်စာ', 'key' => 'eng',],
        ['name_en' => 'Geography', 'name' => 'ပထဝီဝင်', 'key' => 'geo',],
        ['name_en' => 'History', 'name' => 'သမိုင်း', 'key' => 'histroy',],
        ['name_en' => 'Philosophy', 'name' => 'ဒဿနိကဗေဒ', 'key' => 'datha',],
        ['name_en' => 'Psychology', 'name' => 'စိတ်ပညာ', 'key' => 'psyscho',],
        ['name_en' => 'Law', 'name' => 'ဥပဒေပညာ', 'key' => 'law',],
        ['name_en' => 'Chemistry', 'name' => 'ဓာတုဗေဒ', 'key' => 'chemistry',],
        ['name_en' => 'Physics', 'name' => 'ရူပဗေဒ', 'key' => 'physics'],
        ['name_en' => 'Mathematics', 'name' => 'သင်္ချာ', 'key' => 'math'],
        ['name_en' => 'Zoology', 'name' => 'သတ္တဗေဒ', 'key' => 'zoology'],
        ['name_en' => 'Botany', 'name' => 'ရုက္ခဗေဒ', 'key' => 'botany'],
        ['name_en' => 'Geology', 'name' => 'ဘူမိဗေဒ', 'key' => 'earth'],
        ['name_en' => 'Marine Science', 'name' => 'အဏ္ဏဝါသိပ္ပံ', 'key' => 'ms'],
        ['name_en' => 'Bio Chemistry', 'name' => 'ဇီဝဓာတုဗေဒ', 'key' => 'bio-chem'],
        ['name_en' => 'Microbiology', 'name' => 'အဏုဇီဝဗေဒ', 'key' => 'mb'],
        ['name_en' => 'Oriental Studies', 'name' => 'အရှေ့တိုင်းပညာ', 'key' => 'oriental'],
    ],
    'exam_subjects' => [
        'mm' => 'မြန်မာစာ',
        'eng' => 'အင်္ဂလိပ်စာ',
        'geo' => 'ပထဝီဝင်',
        'histroy' => 'သမိုင်း',
        'datha' => 'ဒဿနိကဗေဒ',
        'psyscho' => 'စိတ်ပညာ',
        'law' => 'ဥပဒေပညာ',
        'chemistry' => 'ဓာတုဗေဒ',
        'physics' => 'ရူပဗေဒ',
        'math' => 'သင်္ချာ',
        'zoology' => 'သတ္တဗေဒ',
        'botany' => 'ရုက္ခဗေဒ',
        'earth' => 'ဘူမိဗေဒ',
        'ms' => 'အဏ္ဏဝါသိပ္ပံ',
        'bio-chem' => 'ဇီဝဓာတုဗေဒ',
        'mb' => 'အဏုဇီဝဗေဒ',
        'oriental' => 'အရှေ့တိုင်းပညာ',
    ],
    'major_limit' => 1,
    'university_start_year' => [
        
        '2013-2014',
        '2014-2015',
        '2015-2016',
        '2016-2017',
        '2017-2018',
        '2019-2020',
        '2020-2021',
        '2021-2022',
        '2022-2023',
    ],
    'ude_university_start_year' => [
        '1990-1991',
        '1991-1992',
        '1992-1993',
        '1993-1994',
        '1994-1995',
        '1995-1996',
        '1996-1997',
        '1997-1998',
        '1998-1999',
        '1999-2000',
        '2000-2001',
        '2001-2002',
        '2002-2003',
        '2003-2004',
        '2004-2005',
        '2005-2006',
        '2006-2007',
        '2007-2008',
        '2008-2009',
        '2009-2010',
        '2010-2011',
        '2011-2012',
        '2013-2014',
        '2014-2015',
        '2015-2016',
        '2016-2017',
        '2017-2018',
        '2019-2020',
        '2020-2021',
        '2021-2022',
        '2022-2023',
    ],
    'exam_years' => [
        1 => 'ပထမနှစ်',
        2 => 'ဒုတိယနှစ်',
        3 => 'တတိယနှစ်',
        4 => 'စတုတ္ထနှစ်',
        5 => 'ပထမနှစ်ဂုဏ်ထူးတန်း',
        6 => 'ဒုတိယနှစ်ဂုဏ်ထူးတန်း',
        7 => 'တတိယနှစ်ဂုဏ်ထူးတန်း',
        8 => 'မဟာအရည်အချင်းစစ်တန်း',
        9 => 'Master-1',
        10 => 'Master-2'
    ],
    'has_boudoir' => true,
    'terms_and_conditions' => '
            <p>ကိုယ်တိုင်ဝန်ခံချက်</p>
            <ul>
                <ol>(၁)&nbsp;&nbsp;အထက်ဖော်ပြပါအချက်များအားလုံးမှန်ကန်ပါသည်။</ol>
                <ol>(၂)&nbsp;&nbsp;ဤသို့တက္ကသိုလ်၌ ဆက်လက်ပညာသင်ခွင့်တောင်းသည်ကို မိဘ(သို့မဟုတ်)အုပ်ထိန်းသူ က သဘောတူပြီးဖြစ်ပါသည််။</ol>                </ol>
                <ol>(၃)&nbsp;&nbsp;ကျောင်းလခများမှန်မှန်ပေးသွင်းရန် မိဘ(သို့မဟုတ်)အုပ်ထိန်းသူက သဘောတူပြီးဖြစ်ပါသည်။
                </ol>
                <ol>(၄)&nbsp;&nbsp;တက္ကသိုလ်ကျောင်းသားကောင်းတစ်ယောက်ပီသစွာ တက္ကသိုလ် က ချမှတ်သည့် စည်းမျဉ်း၊ စည်းကမ်းနှင့် အညီ လိုက်နာကျင့်ကြံနေထိုင်ပါမည်။။
                </ol>
            </ul>',
    'diploma_terms'=>'',
    'high_school_subjects' => '',
    'exam_history_years' => [
        '2010',
        '2011',
        '2012',
        '2013',
        '2014',
        '2015',
        '2016',
        '2017',
        '2018',
        '2019'
    ],
    'confirmation' => 'ဝန်ခံကတိပြုပါသည်',
    'info_modal' => '<ul class="help-info">
                            <li>ခုံအမှတ် <span>-</span> ခုံအမှတ် ထည့်ရန်</li>
                        </ul>',
    'student_modal' => '<ul class="help-info">
                    <li>အမည်(မြန်မာ) <span>-</span> (မောင်/ မ ထည့်မရိုက်ရန်)</li>
                    <li> အမည် (အင်္ဂလိပ်)<span>-</span>&nbsp(Mr, Ms ထည့်မရိုက်ရ)</li>
                    <li> လူမျိုး<span>-</span>(မြန်မာဘာသာဖြင့်ဖြည့်သွင်းရန်)</li>
                    <li> မွေးဖွားရာဇာတိမြို့နယ်<span>-</span>(မြန်မာဘာသာဖြင့်ဖြည့်သွင်းရန်)</li>
                    <li> မှတ်ပုံတင်အမှတ်<span>-</span>(၁၂/မရက(နိုင်)၁၂၃၄၅၆ ဟူ၍မြန်မာဘာသာဖြင့်ဖြည့်သွင်းရန်)</li>
                    <li> Email Address<span>-</span>မိမိအသုံးပြုသည့် Email Address အားဖော်ပြပေးရန်</li>
                    <li> အမြဲတမ်းနေထိုင်သည့်လိပ်စာ<span>-</span>(မြန်မာဘာသာဖြင့်ဖြည့်သွင်းရန်)</li>
                    <li> အမြဲတမ်းနေထိုင်သည့်လိပ်စာ<span>-</span>(မြန်မာဘာသာဖြင့်ဖြည့်သွင်းရန်)</li>
                </ul>',
    'father_modal' => '<ul class="help-info">
                    <li>အမည်(မြန်မာ) <span>-</span> (ဦးထည့်မရိုက်ရန်)</li>
                    <li>အမည် (အင်္ဂလိပ်)<span>-</span>(U, Mr ထည့်မရိုက်ရ)</li>
                    <li>ဖခင််၏ဖုန်းနံပါတ်<span>-</span>(ကျောင်းသားထည့်ထားသောဖုန်းနှင့် မတူရ)</li>
                </ul>',
    'form_sch_name' => 'MLM_UNI',

    'mlmu_majors' => [
        '1' => 'မြန်မာစာ',
        '2' => 'အင်္ဂလိပ်စာ',
        '3' => 'ပထဝီဝင်',
        '4' => 'သမိုင်း',
        '5' => 'ဒဿနိကဗေဒ',
        '6' => 'စိတ်ပညာ',
        '7' => 'ဥပဒေပညာ',
        '8' => 'ဓာတုဗေဒ',
        '9' => 'ရူပဗေဒ',
        '10' => 'သင်္ချာ',
        '11' => 'သတ္တဗေဒ',
        '12' => 'ရုက္ခဗေဒ',
        '13' => 'ဘူမိဗေဒ',
        '14' => 'အဏ္ဏဝါသိပ္ပံ',
        '15' => 'ဇီဝဓာတုဗေဒ',
        '16' => 'အဏုဇီဝဗေဒ',
        '17' => 'အရှေ့တိုင်းပညာ'
    ],

    'mlmu_years' => [
        '1' => 'ပထမနှစ်',
        '2' => 'ဒုတိယနှစ်',
        '3' => 'တတိယနှစ်',
        '4' => 'စတုတ္ထနှစ်',
        '5' => 'ပထမနှစ်ဂုဏ်ထူးတန်း',
        '6' => 'ဒုတိယနှစ်ဂုဏ်ထူးတန်း',
        '7' => 'တတိယနှစ်ဂုဏ်ထူးတန်း',
        '8' => 'မဟာအရည်အချင်းစစ်တန်း',
        '9' => 'မဟာတန်း ပထမနှစ်',
        '10' => 'မဟာတန်း ဒုတိယနှစ်'
    ]

   
];