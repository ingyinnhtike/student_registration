    <fieldset class="fieldset-margin">
        <h2 class="fs-title">ဖြေဆိုခဲ့သည့် စာမေးပွဲများ</h2>

        {{--  first year--}}
        <div class="form-input">
            <label for="first_exam_year">သင်တန်းနှစ် *</label>
            <input id="first_exam_year" name="exam[]" type="text" value="ပထမနှစ်"  placeholder="ပထမနှစ်" disabled>
        </div>
        <div class="form-input">
            <label for="first_year_major">အဓိကဘာသာ</label>
            <input id="first_year_major" name="major[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ပထမနှစ်အဓိကဘာသာ ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="first_year_roll_no">ခုံအမှတ်</label>
            <input id="first_year_roll_no" name="roll_no" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ပထမနှစ်ခုံအမှတ် ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="first_year_year">ခုနှစ်</label>
            <input id="first_year_year" name="year[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ပထမနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input status">
            <div class="status">
                <label for="first_pass_status">အောင်</label>
                <input id="first_pass_status" type="radio" name="status[]" value="pass" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <div class="status">
                <label for="first_fail_status">ရှုံး</label>
                <input id="first_fail_status" type="radio" name="status[]" value="fail" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div id="first-add-more"></div>
        <hr>
        {{--  second year--}}
        <div class="form-input">
            <label for="second_exam_year">သင်တန်းနှစ် *</label>
            <input id="second_exam_year" name="exam[]" type="text" value="ဒုတိယနှစ်"  placeholder="ဒုတိယနှစ်" disabled>
        </div>
        <div class="form-input">
            <label for="second_year_major">အဓိကဘာသာ</label>
            <input id="second_year_major" name="major[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ဒုတိယနှစ််အဓိကဘာသာ ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="second_year_roll_no">ခုံအမှတ်</label>
            <input id="second_year_roll_no" name="roll_no" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ဒုတိယနှစ်််ခုံအမှတ် ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="second_year_year">ခုနှစ်</label>
            <input id="second_year_year" name="year[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ဒုတိယနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input status">
            <div class="status">
                <label for="second_pass_status">အောင်</label>
                <input id="second_pass_status" type="radio" name="status[]" value="pass" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <div class="status">
                <label for="second_fail_status">ရှုံး</label>
                <input id="second_fail_status" type="radio" name="status[]" value="fail" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div id="second-add-more"></div>
        <hr>
        {{--  third year--}}
        <div class="form-input">
            <label for="third_exam_year">သင်တန်းနှစ် *</label>
            <input id="third_exam_year" name="exam[]" type="text" value="တတိယနှစ်"  placeholder="တတိယနှစ်" disabled>
        </div>
        <div class="form-input">
            <label for="third_year_major">အဓိကဘာသာ</label>
            <input id="third_year_major" name="major[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="တတိယနှစ်အဓိကဘာသာ ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="third_year_roll_no">ခုံအမှတ်</label>
            <input id="third_year_roll_no" name="roll_no" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="တတိယနှစ်််ခုံအမှတ် ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="third_year_year">ခုနှစ်</label>
            <input id="third_year_year" name="year[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="တတိယနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input status">
            <div class="status">
                <label for="third_pass_status">အောင်</label>
                <input id="third_pass_status" type="radio" name="status[]" value="pass" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <div class="status">
                <label for="third_fail_status">ရှုံး</label>
                <input id="third_fail_status" type="radio" name="status[]" value="fail" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div id="third-add-more"></div>
        <hr>

        {{--  fourth year--}}
        <div class="form-input">
            <label for="fourth_exam_year">သင်တန်းနှစ် *</label>
            <input id="fourth_exam_year" name="exam[]" type="text" value="စတုတ္ထနှစ်"  placeholder="စတုတ္ထနှစ်" disabled>
        </div>
        <div class="form-input">
            <label for="fourth_year_major">အဓိကဘာသာ</label>
            <input id="fourth_year_major" name="major[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="စတုတ္ထနှစ််အဓိကဘာသာ ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="fourth_year_roll_no">ခုံအမှတ်</label>
            <input id="fourth_year_roll_no" name="roll_no" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="စတုတ္ထနှစ််််ခုံအမှတ် ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="fourth_year_year">ခုနှစ်</label>
            <input id="fourth_year_year" name="year[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="စတုတ္ထနှစ််ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input status">
            <div class="status">
                <label for="fourth_pass_status">အောင်</label>
                <input id="fourth_pass_status" type="radio" name="status[]" value="pass" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <div class="status">
                <label for="fourth_fail_status">ရှုံး</label>
                <input id="fourth_fail_status" type="radio" name="status[]" value="fail" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div id="fourth-add-more"></div>
        <hr>

        {{-- fifth year--}}
        <div class="form-input">
            <label for="fifth_exam_year">သင်တန်းနှစ် *</label>
            <input id="fifth_exam_year" name="exam[]" type="text" value="ပဉ္စမနှစ်"  placeholder="ပဉ္စမနှစ်" disabled>
        </div>
        <div class="form-input">
            <label for="fifth_year_major">အဓိကဘာသာ</label>
            <input id="fifth_year_major" name="major[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ပဉ္စမနှစ်််အဓိကဘာသာ ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="fifth_year_roll_no">ခုံအမှတ်</label>
            <input id="fifth_year_roll_no" name="roll_no" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ပဉ္စမနှစ်််််ခုံအမှတ် ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input">
            <label for="fifth_year_year">ခုနှစ်</label>
            <input id="fifth_year_year" name="year[]" @if(!$is_local) required="required" data-rule-required="true" data-msg-required="ပဉ္စမနှစ်််ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်" @endif type="text" value="" placeholder=""  >
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>
        <div class="form-input status">
            <div class="status">
                <label for="fifth_pass_status">အောင်</label>
                <input id="fifth_pass_status" type="radio" name="status[]" value="pass" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <div class="status">
                <label for="fifth_fail_status">ရှုံး</label>
                <input id="fifth_fail_status" type="radio" name="status[]" value="fail" @if(!$is_local) required="required"  data-rule-required="true" data-msg-required="အောင်/ရှုံး ရွေးချယ်ရန်" @endif>
            </div>
            <span class="error1" style="display: none;">
                <i class="error-log fa fa-exclamation-triangle"></i>
            </span>
        </div>

        <input type="button" data-page="2" name="previous" class="previous action-button" value="ရှေ့သို့ပြန်သွားရန်" />
        <input type="button" data-page="1" name="next" class="next action-button" value="နောက်သို့သွားရန်" />
    </fieldset>

    @push('after-scripts')
        <script>
            // first year
            $('#first_pass_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('pass');
                    $('#first-add').remove();
                } else {
                    $(this).val('false');
                }
            });
            $('#first_fail_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('fail');
                    $('#first-add-more').append( "<div id=\"first-add\"><div class=\"form-input\">\n<label for=\"first_year_major\">အဓိကဘာသာ</label>\n" +
                        "            <input id=\"first_year_major\" name=\"major[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"ပထမနှစ်အဓိကဘာသာ ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"first_year_roll_no\">ခုံအမှတ်</label>\n" +
                        "            <input id=\"first_year_roll_no\" name=\"roll_no[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"ပထမနှစ်ခုံအမှတ် ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"first_year_year\">ခုနှစ်</label>\n" +
                        "            <input id=\"first_year_year\" name=\"year[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"ပထမနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div></div>" );
                } else {
                    $(this).val('false');
                }
            });

            // second year
            $('#second_pass_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('pass');
                    $('#second-add').remove();
                } else {
                    $(this).val('false');
                }
            });
            $('#second_fail_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('fail');
                    $('#second-add-more').append( "<div id=\"second-add\"><div class=\"form-input\">\n<label for=\"second_year_major\">အဓိကဘာသာ</label>\n" +
                        "            <input id=\"second_year_major\" name=\"major[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"ဒုတိယနှစ်အဓိကဘာသာ ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"second_year_roll_no\">ခုံအမှတ်</label>\n" +
                        "            <input id=\"second_year_roll_no\" name=\"roll_no[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"ဒုတိယနှစ်ခုံအမှတ် ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"second_year_year\">ခုနှစ်</label>\n" +
                        "            <input id=\"second_year_year\" name=\"year[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"ဒုတိယနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div></div>" );
                } else {
                    $(this).val('false');
                }
            });

            // third year
            $('#third_pass_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('pass');
                    $('#third-add').remove();
                } else {
                    $(this).val('false');
                }
            });
            $('#third_fail_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('fail');
                    $('#third-add-more').append( "<div id=\"third-add\"><div class=\"form-input\">\n<label for=\"third_year_major\">အဓိကဘာသာ</label>\n" +
                        "            <input id=\"third_year_major\" name=\"major[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"တတိယနှစ်အဓိကဘာသာ ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"third_year_roll_no\">ခုံအမှတ်</label>\n" +
                        "            <input id=\"third_year_roll_no\" name=\"roll_no[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"တတိယနှစ်ခုံအမှတ် ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"third_year_year\">ခုနှစ်</label>\n" +
                        "            <input id=\"third_year_year\" name=\"year[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"တတိယနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div></div>" );
                } else {
                    $(this).val('false');
                }
            });

            // fourth year
            $('#fourth_pass_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('pass');
                    $('#fourth-add').remove();
                } else {
                    $(this).val('false');
                }
            });
            $('#fourth_fail_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('fail');
                    $('#fourth-add-more').append( "<div id=\"fourth-add\"><div class=\"form-input\">\n<label for=\"fourth_year_major\">အဓိကဘာသာ</label>\n" +
                        "            <input id=\"fourth_year_major\" name=\"major[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"စတုတ္ထနှစ်အဓိကဘာသာ ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"fourth_year_roll_no\">ခုံအမှတ်</label>\n" +
                        "            <input id=\"fourth_year_roll_no\" name=\"roll_no[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"စတုတ္ထနှစ်ခုံအမှတ် ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div>" +
                        "<div class=\"form-input\">\n" +
                        "            <label for=\"fourth_year_year\">ခုနှစ်</label>\n" +
                        "            <input id=\"fourth_year_year\" name=\"year[]\" @if(!$is_local) required=\"required\" data-rule-required=\"true\" data-msg-required=\"တတိယနှစ်ဖြေဆိုသည့်ခုနှစ်ထည့်ရန်\" @endif type=\"text\" value=\"\" placeholder=\"\"  >\n" +
                        "            <span class=\"error1\" style=\"display: none;\">\n" +
                        "                <i class=\"error-log fa fa-exclamation-triangle\"></i>\n" +
                        "            </span>\n" +
                        "        </div></div>" );
                } else {
                    $(this).val('false');
                }
            });

            // fifth year
            $('#fifth_pass_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('pass');
                } else {
                    $(this).val('false');
                }
            });
            $('#fifth_fail_status').click(function(){
                if($(this).is(':checked')){
                    $(this).val('fail');
                } else {
                    $(this).val('false');
                }
            });

        </script>
    @endpush
