<?php
return [
    'heading' => 'ကျောင်းသားများ ပညာဆက်လက်သင်ခွင့် လျှောက်လွှာ',
    'steps_width' => 'yuoe-steps',
    'progress_bar' => 'yuoe-progressbar',
    'roll_no' => 'ခုံအမှတ် *',
    'current_address' => 'ယခုဆက်သွယ်ရန်လိပ်စာ * (အဆောင်နေပါက အဆောင်အမည်နှင့်လိပ်စာ ထည့်ရန်)',
    'is_first_year' => true,
    'has_la_wa_ka' => false,
    'is_exam_required' => true,
    'is_high_school_required' => true,
    'is_siblings_required' => false,
    'has_district' => false,
    'is_student_work_required' => false,
    'is_diploma'=>false,
    'year' => [
        'First Year' => 'First Year',
        'Second Year' => 'Second Year',
        'Third Year' => 'Third Year',
        'Fourth Year' => 'Fourth Year',
        'Fifth Year' => 'Fifth Year'
    ],

    'years_to_seed' => [
        ['name_en' => 'First Year', 'name' => 'ပထမနှစ်',],
        ['name_en' => 'Second Year', 'name' => 'ဒုတိယနှစ်',],
        ['name_en' => 'Third Year', 'name' => 'တတိယနှစ်',],
        ['name_en' => 'Fourth Year', 'name' => 'စတုတ္ထနှစ်',],
        ['name_en' => 'Fifth Year', 'name' => 'ပဉ္စမနှစ်'],

    ],
    'majors' => [
        'Myan' => 'Myanmar',
        'Eng(ELT/ELP)' => 'English',
        'Math' => 'Math',
        'chemistry' => 'Chemistry',
        'physics' => 'Physics',
        'bio' => 'Biology',
        'geology' => 'Geology',
        'history' => 'History',
        'ecology' => 'Economics',
        'PE' => 'PE'
    ],
    'majors_to_seed' => [

        //first year and second year
        //1
        ['name_en' => 'History, Ecology', 'name' => 'သမိုင်း၊ ဘောဂဗေဒ', 'key' => 'history, ecology'],
        //2
        ['name_en' => 'Geography, Ecology', 'name' => 'ပထဝီဝင်၊ ဘောဂဗေဒ', 'key' => 'geology, ecology'],
        //3
        ['name_en' => 'Geography, History', 'name' => 'ပထဝီဝင်၊ သမိုင်း', 'key' => 'geology, history'],
        //4
        ['name_en' => 'Physics, Ecology', 'name' => 'ရူပဗေဒ၊ ဘောဂဗေဒ', 'key' => 'physics, ecology'],
        //5
        ['name_en' => 'Chemistry, Ecology', 'name' => 'ဓာတုဗေဒ၊ ဘောဂဗေဒ', 'key' => 'chemistry, ecology'],
        //6
        ['name_en' => 'Physics, Chemistry', 'name' => 'ရူပဗေဒ၊ ဓာတုဗေဒ', 'key' => 'physics, chemistry'],
        //7
        ['name_en' => 'Physics, Biology', 'name' => 'ရူပဗေဒ၊ ဇီဝဗေဒ', 'key' => 'physics, bio'],
        //8
        ['name_en' => 'Chemistry, Biology', 'name' => 'ဓာတုဗေဒ၊ ဇီဝဗေဒ', 'key' => 'chemistry, bio'],

        //Third year to final year

        //Myanmar
        //1
        ['name_en' => 'Myanmar, History, Ecology', 'name' => 'မြန်မာစာ၊ သမိုင်း၊ ဘောဂဗေဒ', 'key' => 'Myan, history, ecology'],
        //2
        ['name_en' => 'Myanmar, Geography, Ecology', 'name' => 'မြန်မာစာ၊ ပထဝီဝင်၊ ဘောဂဗေဒ', 'key' => 'Myan, geology, ecology'],
        //3
        ['name_en' => 'Myanmar, Geography, History', 'name' => 'မြန်မာစာ၊ ပထဝီဝင်၊ သမိုင်း', 'key' => 'Myan, geology, history'],
        //4
        ['name_en' => 'Myanmar, Physics, Ecology', 'name' => 'မြန်မာစာ၊ ရူပဗေဒ၊ ဘောဂဗေဒ', 'key' => 'Myan, physics, ecology'],
        //5
        ['name_en' => 'Myanmar, Chemistry, Ecology', 'name' => 'မြန်မာစာ၊ ဓာတုဗေဒ၊ ဘောဂဗေဒ', 'key' => 'Myan, chemistry, ecology'],
        //6
        ['name_en' => 'Myanmar, Physics, Chemistry', 'name' => 'မြန်မာစာ၊ ရူပဗေဒ၊ ဓာတုဗေဒ', 'key' => 'Myan, physics, chemistry'],
        //7
        ['name_en' => 'Myanmar, Physics, Biology', 'name' => 'မြန်မာစာ၊ ရူပဗေဒ၊ ဇီဝဗေဒ', 'key' => 'Myan, physics, bio'],
        //8
        ['name_en' => 'Myanmar, Chemistry, Biology', 'name' => 'မြန်မာစာ၊ ဓာတုဗေဒ၊ ဇီဝဗေဒ', 'key' => 'Myan, chemistry, bio'],


        //English
        //1
        ['name_en' => 'English, History, Ecology', 'name' => 'အင်္ဂလိပ်စာ၊ သမိုင်း၊ ဘောဂဗေဒ', 'key' => 'Eng(ELT/ELP), history, ecology'],
        //2
        ['name_en' => 'English, Geography, Ecology', 'name' => 'အင်္ဂလိပ်စာ၊ ပထဝီဝင်၊ ဘောဂဗေဒ', 'key' => 'Eng(ELT/ELP), geology, ecology'],
        //3
        ['name_en' => 'English, Geography, History', 'name' => 'အင်္ဂလိပ်စာ၊ ပထဝီဝင်၊ သမိုင်း', 'key' => 'Eng(ELT/ELP), geology, history'],
        //4
        ['name_en' => 'English, Physics, Ecology', 'name' => 'အင်္ဂလိပ်စာ၊ ရူပဗေဒ၊ ဘောဂဗေဒ', 'key' => 'Eng(ELT/ELP), physics, ecology'],
        //5
        ['name_en' => 'English, Chemistry, Ecology', 'name' => 'အင်္ဂလိပ်စာ၊ ဓာတုဗေဒ၊ ဘောဂဗေဒ', 'key' => 'Eng(ELT/ELP), chemistry, ecology'],
        //6
        ['name_en' => 'English, Physics, Chemistry', 'name' => 'အင်္ဂလိပ်စာ၊ ရူပဗေဒ၊ ဓာတုဗေဒ', 'key' => 'Eng(ELT/ELP), physics, chemistry'],
        //7
        ['name_en' => 'English, Physics, Biology', 'name' => 'အင်္ဂလိပ်စာ၊ ရူပဗေဒ၊ ဇီဝဗေဒ', 'key' => 'Eng(ELT/ELP), physics, bio'],
        //8
        ['name_en' => 'English, Chemistry, Biology', 'name' => 'အင်္ဂလိပ်စာ၊ ဓာတုဗေဒ၊ ဇီဝဗေဒ', 'key' => 'Eng(ELT/ELP), chemistry, bio'],


        //Math
        //1
        ['name_en' => 'Mathematics, History, Ecology', 'name' => 'သင်္ချာ၊ သမိုင်း၊ ဘောဂဗေဒ', 'key' => 'Math, history, ecology'],
        //2
        ['name_en' => 'Mathematics, Geography, Ecology', 'name' => 'သင်္ချာ၊ ပထဝီဝင်၊ ဘောဂဗေဒ', 'key' => 'Math, geology, ecology'],
        //3
        ['name_en' => 'Mathematics, Geography, History', 'name' => 'သင်္ချာ၊ ပထဝီဝင်၊ သမိုင်း', 'key' => 'Math, geology, history'],
        //4
        ['name_en' => 'Mathematics, Physics, Ecology', 'name' => 'သင်္ချာ၊ ရူပဗေဒ၊ ဘောဂဗေဒ', 'key' => 'Math, physics, ecology'],
        //5
        ['name_en' => 'Mathematics, Chemistry, Ecology', 'name' => 'သင်္ချာ၊ ဓာတုဗေဒ၊ ဘောဂဗေဒ', 'key' => 'Math, chemistry, ecology'],
        //6
        ['name_en' => 'Mathematics, Physics, Chemistry', 'name' => 'သင်္ချာ၊ ရူပဗေဒ၊ ဓာတုဗေဒ', 'key' => 'Math, physics, chemistry'],
        //7
        ['name_en' => 'Mathematics, Physics, Biology', 'name' => 'သင်္ချာ၊ ရူပဗေဒ၊ ဇီဝဗေဒ', 'key' => 'Math, physics, bio'],
        //8
        ['name_en' => 'Mathematics, Chemistry, Biology', 'name' => 'သင်္ချာ၊ ဓာတုဗေဒ၊ ဇီဝဗေဒ', 'key' => 'Math, chemistry, bio'],


        //PE
        //1
        ['name_en' => 'PE, History, Ecology', 'name' => 'ကာယ၊ သမိုင်း၊ ဘောဂဗေဒ', 'key' => 'PE, history, ecology'],
        //2
        ['name_en' => 'PE, Geography, Ecology', 'name' => 'ကာယ၊ ပထဝီဝင်၊ ဘောဂဗေဒ', 'key' => 'PE, geology, ecology'],
        //3
        ['name_en' => 'PE, Geography, History', 'name' => 'ကာယ၊ ပထဝီဝင်၊ သမိုင်း', 'key' => 'PE, geology, history'],
        //4
        ['name_en' => 'PE, Physics, Ecology', 'name' => 'ကာယ၊ ရူပဗေဒ၊ ဘောဂဗေဒ', 'key' => 'PE, physics, ecology'],
        //5
        ['name_en' => 'PE, Chemistry, Ecology', 'name' => 'ကာယ၊ ဓာတုဗေဒ၊ ဘောဂဗေဒ', 'key' => 'PE, chemistry, ecology'],
        //6
        ['name_en' => 'PE, Physics, Chemistry', 'name' => 'ကာယ၊ ရူပဗေဒ၊ ဓာတုဗေဒ', 'key' => 'PE, physics, chemistry'],
        //7
        ['name_en' => 'PE, Physics, Biology', 'name' => 'ကာယ၊ ရူပဗေဒ၊ ဇီဝဗေဒ', 'key' => 'PE, physics, bio'],
        //8
        ['name_en' => 'PE, Chemistry, Biology', 'name' => 'ကာယ၊ ဓာတုဗေဒ၊ ဇီဝဗေဒ', 'key' => 'PE, chemistry, bio'],

    ],
    'major_limit' => 3,
    'university_start_year' => [
        '12/2010',
        '12/2011',
        '12/2012',
        '12/2013',
        '12/2014',
        '12/2015',
        '12/2016',
        '12/2017',
        '12/2018',
        '12/2019'
    ],
    'exam_years' => [
        1 => 'ပထမနှစ်',
        2 => 'ဒုတိယနှစ်',
        3 => 'တတိယနှစ်',
        4 => 'စတုတ္ထနှစ်',
        5 => 'ပဉ္စမနှစ်'
    ],
    'exam_subjects' => [
        'Ethe' => 'Ethe',
        'Epsy' => 'Epsy',
        'Meth' => 'Meth',
        'Myan' => 'Myan',
        'Eng(ELT/ELP)' => 'Eng(ELT/ELP)',
        'Math' => 'Math',
        'Chem' => 'Chem',
        'Phy' => 'Phy',
        'Bio' => 'Bio',
        'Geo' => 'Geo',
        'Hist' => 'Hist',
        'Eco' => 'Eco',
        'PE' => 'PE'
    ],
    'has_boudoir' => false,
    'terms_and_conditions' => '<p>
                <strong>ရန်ကုန်ပညာရေးတက္ကသိုလ် ဝန်ခံကတိပြုချက်။။</strong>
            </p>
            <br>
            <p>ကိုယ်တိုင်ဝန်ခံချက်</p>
            <br>
            <ul>
                <ol>(၁)&nbsp;&nbsp;အထက်ဖော်ပြပါအချက်များအားလုံးမှန်ကန်ပါသည်။</ol>
                <ol>(၂)&nbsp;&nbsp;ဤသို့တက္ကသိုလ်၌ ပညာဆက်လက်သင်ခွင့်တောင်းသည်ကို မိဘ (သို့မဟုတ်) အုပ်ထိန်းသူ က သဘောတူပြီး ဖြစ်ပါသည်။
                </ol>
                <ol>(၃)&nbsp;&nbsp;ကျောင်းလခများမှန်မှန်ပေးသွင်းရန် မိဘ (သို့မဟုတ်) အုပ်ထိန်းသူကသဘောတူပြီးဖြစ်ပါသည်။
                </ol>
                <ol>(၄)&nbsp;&nbsp;တက္ကသိုလ်ကျောင်းသားကောင်းတစ်ယောက်ပီသစွာ တက္ကသိုလ် က ချမှတ်သည့် စည်းမျဉ်း၊ စည်းကမ်းနှင့် အညီ လိုက်နာကျင့်ကြံနေထိုင်ပါမည်။။
                </ol>
            </ul>
            <br>
            <strong>*အထက်ပါတက္ကသိုလ်ဝင်ခွင့်လျှောက်လွှာကို ကျွန်တော်/ကျွန်မ၏<br> သဘောတူညီချက်ဖြင့်တင်သွင်းလျောက်ထားခြင်းဖြစ်ပါသည်။</strong><br>',
    'diploma_terms'=>'',
    'high_school_sub_required' => true,
    'high_school_subjects' => ['Myanmar', 'English', 'Math', 'History', 'Geology', 'Eco', 'Physics', 'Chemistry', 'Biology'],
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
                            <li>ဘာသာ <span>-</span> ၃ ဘာသာ ရွေးချယ်ရန်</li>
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
];
