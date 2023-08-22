$(function () {
    $('#solution_type').on('change', function () {
        if ($(this).val() === "Product") {
            $('#has-api-div').removeClass('hide').slideDown();
        } else {
            $('#has-api-div').addClass('hide').slideUp();
        }
    });

    $('input[name="has_api"]').on('change', function () {

        if ($(this).val() === '1') {
            $('#api-description').removeClass('hide').slideDown();
        } else {
            $('#api-description').addClass('hide').slideUp();
        }
    });

    $('#addProjectButton').on('click', function () {
        $('#projectId').val(0);
        $('#addAddProjectModal').modal();
    });

    $('.js-edit').on('click', function () {
        $('#projectId').val($(this).data('id'));
        $('#project_name').val($(this).data('name'));
        $('#client_name').val($(this).data('client_name'));
        $('#project_description').val($(this).data('description'));
        $('#start_date').val($(this).data('start_date'));
        $('#end_date').val($(this).data('end_date'));

        $('#addAddProjectModal').modal();
    });

    $('#addSolutionButton').on('click', function () {
        $('#solutionId').val(0);
        $('#addAddSolutionModal').modal();
    });

    $('.js-edit-solution').on('click', function () {
        $('#solutionId').val($(this).data('id'));
        let $solutionType = $('#solution_type');
        $solutionType.val($(this).data('type'));
        $('#solution_name').val($(this).data('name'));
        $('#solution_description').val($(this).data('description'));
        $('#api_name').val($(this).data('api_name'));
        $('#api_link').val($(this).data('api_link'));
        $('#api_description').val($(this).data('api_description'));
        $('#cp_name').val($(this).data('cp_name'));
        $('#cp_email').val($(this).data('cp_email'));
        $('#cp_phone').val($(this).data('cp_phone'));

      /*  let platforms = JSON.parse(JSON.stringify($(this).data('platforms')));
        let elements = $("input[name='platforms[]']");
        $.each(elements, function (index, element) {
            $(element).val(platforms[index]);
        });*/

        let hasApi = $(this).data('has_api');

        let $radio = $(":radio[name='has_api']");
        $.each($radio, function (index, element) {

            if (parseInt($(element).val()) === parseInt(hasApi)) {
                $(element).prop('checked', true);
            }
        });


        if (hasApi === 1) {
            $('#api-description').removeClass('hide').slideDown();
        } else {
            $('#api-description').addClass('hide').slideUp();
        }

        $('#addAddSolutionModal').modal();
        $solutionType.trigger('change');
    });

    let formSaveProject = $('#formSaveProject');

    formSaveProject.on('submit', function (e) {
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
        })


    });

    let formSaveSolution = $('#formSaveSolution');
    formSaveSolution.validate();

    formSaveSolution.on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let btn = form.find(':submit');
        if (!form.valid()) return;

        btn.addClass('spinner spinner-right spinner-white')
            .prop('disabled', true);

        const formData = new FormData(this);
        formData.append('application_id', $('#application_id').val());

        // console.log(formData);

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: formData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            completed: function (response) {

            }, success: function (response) {
                location.reload();
            }, error: function (response) {
                showErrors(response);
                btn.removeClass('spinner spinner-right spinner-white')
                    .prop('disabled', false);
            }
        });


    });


    let loadDistricts = function (provinceId, selectedValue) {
        if (!provinceId) return;
        let element = $('#district_id');
        element.empty();
        element.append("<option value=''>CHOOSE</option>");
        $.getJSON('/districts/' + provinceId)
            .done(function (response) {
                response.forEach(function (item) {
                    element.append("<option value='" + item.id + "' >" + item.name + "</option>");
                });
                element.val(selectedValue);
            });
    };

    let loadSector = function (districtId, selectedValue) {
        if (!districtId) return;
        let element = $('#sector_id');
        element.empty();
        element.append('<option value="">CHOOSE</option>');
        $.getJSON('/sectors/' + districtId, function (data) {
            $.each(data, function (index, value) {
                element.append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            element.val(selectedValue);
        });

    };
    let loadCells = function (districtId, selectedValue) {
        if (!districtId) return;
        $.getJSON('/cells/' + districtId, function (data) {
            let element = $('#cell_id');
            element.empty();
            element.append('<option value="">CHOOSE</option>');
            $.each(data, function (index, value) {
                element.append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            element.val(selectedValue);
        });

    };
    let loadVillages = function (districtId, selectedValue) {
        if (!districtId) return;
        $.getJSON('/villages/' + districtId, function (data) {
            let element = $('#village_id');
            element.empty();
            element.append('<option value="">CHOOSE</option>');
            $.each(data, function (index, value) {
                element.append('<option value="' + value.id + '">' + value.name + '</option>');
            });

            element.val(selectedValue);
        });

    };


    $('#province_id').on('change', function () {

        if (!$(this).val()) return;
        loadDistricts($(this).val(), null);
    });


    $('#district_id').on('change', function () {

        if (!$(this).val()) return;
        loadSector($(this).val(), null);
    });
    $('#sector_id').on('change', function () {

        if (!$(this).val()) return;
        loadCells($(this).val(), null);
    });


    $('#cell_id').on('change', function () {

        if (!$(this).val()) return;
        loadVillages($(this).val(), null);
    });

});
