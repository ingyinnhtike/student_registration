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
        return birth_place.name;
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

