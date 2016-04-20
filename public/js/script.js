function formatRepo(repo) {
    if (repo.loading) return repo.name;
        var markup = '<div class="clearfix">' +
                '<div clas="col-sm-10">' +
                '<div class="clearfix">' +
                '<div class="col-sm-6">' + repo.name + '</div>' +
                '</div>';
        if (repo.name) {
            markup += '<div>' + repo.name + '</div>';
        }
        markup += '</div></div>';
        return markup;
}

function formatRepoSelection(repo) {
    return (repo.name);
}

$("#Buscar").click(function(){
    
    $('html,body').animate({
      scrollTop: $("#timelinediv").offset().top},
     'slow');
});


$('.js-example-basic-multiple').select2({
    placeholder: "Tema de Interes",
    multiple: true,
    ajax: {
            url: "tago",
            type: 'GET',
            dataType: 'json',
            delay: 250,
            jsonp: false,
            data: function(params){
                return {q: params.term};
                },

            processResults: function (data, params) {
                    console.log(data);
                    params.page = params.page || 1;
                    return {
                        results: data,
                        pagination: {
                        more: (params.page * 30) < data.total_count
                            }
                    };
                },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
        

});

