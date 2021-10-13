$(document).ready(function () {
    /***  For Information Blade Major Select With Limit ***/
    $('.major-select2').select2({
            placeholder:"ဦးစားပေးဘာသာရပ် ရွေးချယ်ရန်",
            maximumSelectionLength:config.form_data.major_limit,
            language: {
                maximumSelected: function (e) {
                    var t = "ဦးစားပေးဘာသာရပ် " + e.maximum + " ခု ကို သာ ရွေးချယ်ရန်";
                    return t;
                }
            }
    });
    $(".major-select2").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);

        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });
    /***  For Student/Father/Mother/Other Blade State Select ***/
    $('.state-select-2').select2({
        placeholder:"တိုင်း/ပြည်နယ် ရွေးချယ်ရန်",
    });
    /***  Father Blade  ***/
    $('#father_is_available').hide();
    /***  Mother Blade  ***/
    $('#mother_is_available').hide();
});

/***  Validate Required With year ***/
$('.year-select2').on('change', function() {
    var universityRollNo = $('input[name="university_roll_no"]');
    var rollNo = $('input[name="high_school_roll_no"]');
    var highSchoolYear = $('input[name="high_school_year"]');
    var highSchoolExamLocation = $('input[name="high_school_exam_location"]');
    var marks = $('.high-school-mark');
    var subjects = $('.high-school-subjects');
    var highSchoolTotalMark = $('input[name="high_school_total_mark"]');
    var highSchoolDistinctions = $('input[name="high_school_distinctions"]');
    if(this.value != 'First Year'){
        universityRollNo.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"တက္ကသိုလ်မှတ်ပုံတင်အမှတ် ထည့်ရန်"});
        rollNo.removeAttr("required data-rule-required data-msg-required aria-required");
        highSchoolYear.removeAttr("required data-rule-required data-msg-required aria-required");
        highSchoolExamLocation.removeAttr("required data-rule-required data-msg-required aria-required");
        marks.removeAttr("required data-rule-required data-msg-required aria-required");
        subjects.removeAttr("required data-rule-required data-msg-required aria-required");
        highSchoolTotalMark.removeAttr("required data-rule-required data-msg-required aria-required");
        highSchoolDistinctions.removeAttr("required data-rule-required data-msg-required aria-required");
    }
    else{
        universityRollNo.removeAttr("required data-rule-required data-msg-required aria-required");
        rollNo.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"ခုံအမှတ် ထည့်ရန်"});
        highSchoolYear.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"အခြေခံပညာအထက်တန်းစာမေးပွဲအောင်မြင်သည့် ခုနှစ် ထည့်ရန်"});
        highSchoolExamLocation.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"စာစစ်ဌာန ထည့်ရန်"});
        marks.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"ရမှတ် ထည့်ရန်"});
        subjects.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"ဘာသာ ထည့်ရန်"});
        highSchoolTotalMark.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"ရမှတ်စုစုပေါင်း ထည့်ရန်"});
        highSchoolDistinctions.attr({'required':true,"aria-required":"true",'data-rule-required':"true",'data-msg-required':"ဂုဏ်ထူးရသည့်ဘာသာ ထည့်ရန်"});
    }
});

/*** Male/Female Checkbox ***/
$('#male').click(function () {
    if ($(this).is(':checked')) {
        $(this).val('male');
    } else {
        $(this).val('false');
    }
});
$('#female').click(function () {
    if ($(this).is(':checked')) {
        $(this).val('female');
    } else {
        $(this).val('false');
    }
});
/*** Add Other name field ***/
$('#has_other_name').click(function () {
    if ($(this).is(':checked')) {
        $('#other-name').append("<div id=\"student-other-name\">\n" +
            "            <div class=\"form-input\">\n" +
            "                <label for=\"\">အခြားအမည် (မြန်မာ)</label>\n" +
            "                <input id=\"\" name=\"other_name_mm\"  type=\"text\" value="+config.form_data.student_other_name_mm+" >\n" +
            "            </div>\n" +
            "            <div class=\"form-input\">\n" +
            "                <label for=\"\">အခြားအမည် (အင်္ဂလိပ်)</label>\n" +
            "                <input id=\"\" name=\"other_name_eng\" type=\"text\" value="+config.form_data.student_other_name_eng+">\n" +
            "            </div>\n" +
            "        </div>");
    } else {
        $('#student-other-name').remove();
    }
});

/*** Father ***/
$('#father_availability').click(function () {
    if ($(this).is(':checked')) {
        $('#father_is_available').show();
        $('#father_death_date').hide();
    } else {
        $('#father_is_available').hide();
        $('#father_death_date').show();
    }
});
$('#father_is_the_same').click(function () {
    if ($(this).is(':checked')) {
        $("textarea#father_address").val($('#permanent_address').val());
    } else {
        $("textarea#father_address").val('');
    }
});

/*** Mother ***/
$('#mother_availability').click(function () {
    if ($(this).is(':checked')) {
        $('#mother_is_available').show();
        $('#mother_death_date').hide();
    } else {
        $('#mother_is_available').hide();
        $('#mother_death_date').show();
    }
});
$('#mother_is_the_same').click(function () {
    if ($(this).is(':checked')) {
        $("textarea#mother_address").val($('#permanent_address').val());
    } else {
        $("textarea#mother_address").val('');
    }
});

/*** Other Gurdian ***/
$('#other_is_the_same').click(function () {
    if ($(this).is(':checked')) {
        $("textarea#other_address").val($('#permanent_address').val());
    } else {
        $("textarea#other_address").val('');
        console.log($(this).val());
    }
});

/***  Add Birth Place Select2 with Ajax ***/
$('.birth-place-select-2').select2({
    ajax: {
        url: config.routes.township_search,
        dataType: 'json',
        delay:250,
        data: function (params) {
            return {
                q: params.term
            };
        },
        processResults: function (data,params) {
            params.page = params.page || 1;

            return {
                results: data,
            };
        },
        cache: true
    },
    minimumInputLength:1,
    placeholder:'test',
    language: { inputTooShort: function () { return 'စာလုံး ၁ လုံး အနည်းဆုံး ရိုက်ထည့်ရန်'; } },
    templateResult: formatRepo,
    templateSelection: formatRepoSelection,
});

function formatRepo (birth_place) {
    if (birth_place.loading) {
        return 'loading...';
    }

    var $container = $(
        "<div class='birth-place-select-2 clearfix'>" +
        "<div class='birth-place-select-2__title'></div>" +
        "</div>"
    );

    $container.find(".birth-place-select-2__title").text(birth_place.name+'မြို့နယ် ၊ '+birth_place.district+'ခရိုင် ၊ '+birth_place.state);

    return $container;
}
function formatRepoSelection (birth_place) {
    if(birth_place.id != ''){
        return birth_place.name+'မြို့နယ် ၊ '+birth_place.district+'ခရိုင် ၊ '+birth_place.state;
    }
    else{
        return 'မွေးဖွားရာဇာတိ မြို့နယ် ရွေးချယ်ရန်';
    }
}

/***  Add Course for (year+major) ***/
$('.course-select-2').select2({
    ajax: {
        url: config.routes.course_search,
        dataType: 'json',
        delay:250,
        data: function (params) {
            return {
                q: params.term
            };
        },
        processResults: function (data) {
            return {
                results: data,
            };
        },
        cache: true
    },
    minimumInputLength:1,
    language: { inputTooShort: function () { return 'စာလုံး ၁ လုံး အနည်းဆုံး ရိုက်ထည့်ရန်'; } },
    templateResult: formatRepoCourse,
    templateSelection: formatRepoCourseSelection,
});

function formatRepoCourse (course) {
    console.log(course);
    if (course.loading) {
        return 'loading...';
    }

    var $container_course = $(
        "<div class='course-select-2 clearfix'>" +
        "<div class='course-select-2__title'></div>" +
        "</div>"
    );


    $container_course.find(".course-select-2__title").html('<strong>'+course.year.name+'</strong><br><strong>'+course.major.name+'</strong>');

    return $container_course;
}
function formatRepoCourseSelection (course) {
    if(course.id != ''){
        return course.year.name+' ၊ '+course.major.name;
    }
    else{
        return 'သင်တန်းရွေးချယ်ရန်';
    }
}

$('.course-select-2').select2('data', {id:4, text:'ENABLED_FROM_JS'});

/*** Fee Blade ***/
// current address
$('#current_is_the_same').click(function () {
    if ($(this).is(':checked')) {
        $("#current_address").val($('#permanent_address').val());
    } else {
        $("#current_address").val('');
    }
});

// scholarship
$('#has_scholar').click(function () {
    if ($(this).is(':checked')) {
        $('#add-scholar').show();
    } else {
        $('#add-scholar').hide();
        $('#add-scholar').find('input').val('');
    }
});
// boudoir
$('#has_boudoir').click(function () {
    if ($(this).is(':checked')) {
        $('#add-boudoir').show();
    } else {
        $('#add-boudoir').hide();
        $('#add-boudoir').find('input').val('');
    }
});
//confirmation
$('#is_confirm').click(function () {
    if ($(this).is(':checked')) {
        $('#submit').attr("disabled", false);
        $('#submit').css({"opacity": 1});
    } else {
        $('#submit').attr("disabled", true);
        $('#submit').css({"opacity": 0.5});
    }
});
//     $(window).on("keydown", function (t) {
//     return 123 != t.keyCode && (!t.ctrlKey || !t.shiftKey || 73 != t.keyCode) && (!t.ctrlKey || 73 != t.keyCode) && void 0
// }), $(document).on("contextmenu", function (t) {
//     t.preventDefault()
// });


