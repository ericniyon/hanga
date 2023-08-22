$('.js-edit').on('click', function () {
    $('#solutionId').val($(this).data('id'));
    $('#solution_name').val($(this).data('name'));
    $('#solution_type').val($(this).data('type'));
    $('#solution_description').val($(this).data('description'));

    $('#addAddSolutionModal').modal();
});


$('#addSolutionButton').on('click', function () {
    $('#solutionId').val(0);
    $('#addAddSolutionModal').modal();
});

$('.js-edit-solution').on('click', function () {
    $('#solutionId').val($(this).data('id'));

    $('#addAddSolutionModal').modal();
});

$('#formSaveSolution').on('submit', function (e) {
    e.preventDefault();
    let form = $(this);
    let btn = form.find(':submit');
    if (!form.valid()) return;

    btn.addClass('spinner spinner-right spinner-white')
        .prop('disabled', true);

    let data = form.serializeArray();
    data.push({name: 'application_id', value: $('#application_id').val()});


    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: data,
        completed: function (response) {

        }, success: function (response) {
            location.reload();
        }, error: function (response) {
            btn.removeClass('spinner spinner-right spinner-white')
                .prop('disabled', false);
        }
    });


});

$('#province_id').on('change', function () {

    if (!$(this).val()) return;

    let $districtId = $('#district_id');
    $districtId.empty();
    $districtId.append("<option value=''>CHOOSE</option>");
    $.getJSON('/districts/' + $(this).val())
        .done(function (reponse) {
            reponse.forEach(function (item) {
                $districtId.append("<option value='" + item.id + "'>" + item.name + "</option>");
            });

        });
});

$('#district_id').on('change', function () {

    if (!$(this).val()) return;

    let $districtId = $('#sector_id');
    $districtId.empty();
    $districtId.append("<option value=''>CHOOSE</option>");
    $.getJSON('/sectors/' + $(this).val())
        .done(function (reponse) {
            reponse.forEach(function (item) {
                $districtId.append("<option value='" + item.id + "'>" + item.name + "</option>");
            });

        });
});
$('#sector_id').on('change', function () {

    if (!$(this).val()) return;

    let $districtId = $('#cell_id');
    $districtId.empty();
    $districtId.append("<option value=''>CHOOSE</option>");
    $.getJSON('/cells/' + $(this).val())
        .done(function (reponse) {
            reponse.forEach(function (item) {
                $districtId.append("<option value='" + item.id + "'>" + item.name + "</option>");
            });

        });
});


$('#cell_id').on('change', function () {

    if (!$(this).val()) return;

    let village = $('#village_id');
    village.empty();
    village.append("<option value=''>CHOOSE</option>");
    $.getJSON('/villages/' + $(this).val())
        .done(function (response) {
            response.forEach(function (item) {
                village.append("<option value='" + item.id + "'>" + item.name + "</option>");
            });
        });
});
