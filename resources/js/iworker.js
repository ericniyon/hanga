let loadDistricts = function (provinceId, selectedValue, element = $('#district_id')) {
    if (!provinceId) return;
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

let loadSector = function (districtId, selectedValue, element = $('#sector_id')) {
    if (!districtId) return;
    $.getJSON('/sectors/' + districtId, function (data) {
        element.empty();
        element.append('<option value="">CHOOSE</option>');
        $.each(data, function (index, value) {
            element.append('<option value="' + value.id + '">' + value.name + '</option>');
        });

        element.val(selectedValue);
    });

};
let loadCells = function (districtId, selectedValue, element = $('#cell_id')) {
    if (!districtId) return;
    $.getJSON('/cells/' + districtId, function (data) {
        element.empty();
        element.append('<option value="">CHOOSE</option>');
        $.each(data, function (index, value) {
            element.append('<option value="' + value.id + '">' + value.name + '</option>');
        });

        element.val(selectedValue);
    });

};
let loadVillages = function (districtId, selectedValue, element = $('#village_id')) {
    if (!districtId) return;
    $.getJSON('/villages/' + districtId, function (data) {
        element.empty();
        element.append('<option value="">CHOOSE</option>');
        $.each(data, function (index, value) {
            element.append('<option value="' + value.id + '">' + value.name + '</option>');
        });

        element.val(selectedValue);
    });

};


window.getFieldOfStudies = function (level, selected = '', element = $('#field_of_study_id')) {

    element.empty();
    element.append('<option value=""></option>');

    $.ajax({
        url: '/field-of-study/' + level + '/get',
        method: 'GET',
        success: function (response) {
            response.forEach(function (item, index) {
                element.append('<option value="' + item.id + '">' + item.name + '</option>');
            });
            element.val(selected);
        }
    })
}

$(function () {

    let makeAjaxRequest = function (form, formData) {
        let btn = form.find(':submit');
        btn.addClass('spinner spinner-right spinner-white')
            .prop('disabled', true);
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
                btn.removeClass('spinner spinner-right spinner-white')
                    .prop('disabled', false);
            }
        });
    }
    let trainings = function () {
        $('#addTrainingButton').on('click', function () {
            $('#trainingId').val(0);
            $('#addTrainingModal').modal();
        });

        $('.js-edit-training').on('click', function () {
            $('#trainingId').val($(this).data('id'));
            $('#training_name').val($(this).data('name'));
            $('#issuer').val($(this).data('issuer'));
            $('#issuance_date').val($(this).data('issuance_date'));

            $('#addTrainingModal').modal();
        });


        $('#formSaveTraining').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = form.find(':submit');
            if (!form.valid()) return;

            btn.addClass('spinner spinner-right spinner-white')
                .prop('disabled', true);

            const formData = new FormData(this);
            formData.append('iworker_registration_id', $('#id').val());

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
                    btn.removeClass('spinner spinner-right spinner-white')
                        .prop('disabled', false);
                }
            })


        });
    }
    let experience = function () {
        $('#addExperienceButton').on('click', function () {
            $('#experienceId').val(0);
            $('#addExperienceModal').modal();
        });

        $('.js-edit-experience').on('click', function () {
            $('#experienceId').val($(this).data('id'));
            $('#service_offered').val($(this).data('service_offered'));
            $('#experience_client').val($(this).data('client'));
            $('#experience_description').val($(this).data('description'));
            $('#year_of_completion').val($(this).data('year_of_completion'));

            $('#addExperienceModal').modal();
        });


        $('#formSaveExperience').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = form.find(':submit');
            if (!form.valid()) return;

            btn.addClass('spinner spinner-right spinner-white')
                .prop('disabled', true);

            const formData = new FormData(this);
            formData.append('iworker_registration_id', $('#id').val());

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
                    btn.removeClass('spinner spinner-right spinner-white')
                        .prop('disabled', false);
                }
            })


        });
    }

    let affiliation = function () {

        $('#employer_id').select2({
            placeholder: "Select your employer",
            minimumInputLength: 2,
            minimumResultsForSearch: 20,
            ajax: {
                url: '/search-employers',
                delay: 250,
                dataType: "json",
                type: "GET",
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });

        $('#addAffiliationButton').on('click', function () {
            $('#affiliationId').val(0);
            $('#addAffiliationModal').modal();
        });

        $('.js-edit-affiliation').on('click', function () {
            $('#affiliationId').val($(this).data('id'));
            $('#employer_id').val($(this).data('employer_id'));
            $('#position').val($(this).data('position'));
            $('#description').val($(this).data('description'));

            $('#addAffiliationModal').modal();
        });


        $('#formSaveAffiliation').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = form.find(':submit');
            if (!form.valid()) return;

            btn.addClass('spinner spinner-right spinner-white')
                .prop('disabled', true);

            const formData = new FormData(this);
            // formData.append('iworker_registration_id', $('#id').val());

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
            })


        });
    }

    let branch = function () {
        $('#addBranchButton').on('click', function () {
            $('#branchId').val(0);
            $('#addBranchModal').modal();
        });

        $('.js-edit-branch').on('click', function () {
            let $branchProvinceId = $('#branch_province_id');
            let $branchDistrictId = $('#branch_district_id');
            let districtId = $(this).data('district');
            let $branchSectorId = $('#branch_sector_id');
            let provinceId = $(this).data('province');
            let $branchCellId = $('#branch_cell_id');
            let $branchVillageId = $('#branch_village_id');
            let sectorId = $(this).data('sector');
            let cellId = $(this).data('cell');
            let villageId = $(this).data('village');

            $('#branchId').val($(this).data('id'));
            $('#branch_name').val($(this).data('name'));
            $branchProvinceId.val(provinceId);
            $branchDistrictId.val(districtId);
            $branchSectorId.val(sectorId);
            $branchCellId.val(cellId);
            $branchVillageId.val(villageId);

            loadDistricts(provinceId, districtId, $branchDistrictId);
            loadSector(districtId, sectorId, $branchSectorId);
            loadCells(sectorId, cellId, $branchCellId);
            loadVillages(cellId, villageId, $branchVillageId);

            $('#addBranchModal').modal();
        });


        $('#formSaveBranch').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);
            let btn = form.find(':submit');
            if (!form.valid()) return;

            btn.addClass('spinner spinner-right spinner-white')
                .prop('disabled', true);

            const formData = new FormData(this);
            formData.append('application_id', $('#application_id').val());

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
                    btn.removeClass('spinner spinner-right spinner-white')
                        .prop('disabled', false);
                }
            })


        });

        $('#branch_province_id').on('change', function () {
            loadDistricts($(this).val(), 0, $('#branch_district_id'));
        });
        $('#branch_district_id').on('change', function () {
            loadSector($(this).val(), 0, $('#branch_sector_id'));
        });
        $('#branch_sector_id').on('change', function () {
            loadCells($(this).val(), 0, $('#branch_cell_id'));
        });

        $('#branch_cell_id').on('change', function () {
            loadVillages($(this).val(), 0, $('#branch_village_id'));
        });
    }
    let employee = function () {
        $('#addEmployeeButton').on('click', function () {
            $('#employeeId').val(0);
            $('#addEmployeeModal').modal();
        });

        $('.js-edit-employee').on('click', function () {
            $('#employeeId').val($(this).data('id'));
            $('#employee_name').val($(this).data('name'));
            $('#employee_position').val($(this).data('position'));
            $('#employee_recruitment_date').val($(this).data('recruitment_date'));

            let levelOfStudy = $(this).data('level_of_study_id');
            $('#employee_level_of_study_id').val(levelOfStudy);

            getFieldOfStudies(levelOfStudy, $(this).data('field_of_study'), $('#employee_field_of_study'));

            $('#addEmployeeModal').modal();
        });


        $('#formSaveEmployee').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);

            if (!form.valid()) return;

            const formData = new FormData(this);
            formData.append('iworker_registration_id', $('#id').val());

            makeAjaxRequest(form, formData);
        });

    }


    let $iworkerType = $('#iworker_type');
    $iworkerType.on('change', function () {
        if ($(this).val() === "Individual") {
            $('.individual').removeClass('hide');
        } else {
            $('.individual').addClass('hide');
        }
        if ($(this).val() === "Company") {
            $('.company').removeClass('hide');
        } else {
            $('.company').addClass('hide');
        }

    });

    $iworkerType.trigger('change');


    trainings();
    experience();
    branch();
    employee();

    affiliation();


    $('#level_of_study_id').on('change', function () {
        if (!$(this).val())
            return;

        getFieldOfStudies($(this).val());
    });

    $('#employee_level_of_study_id').on('change', function () {
        if (!$(this).val())
            return;

        getFieldOfStudies($(this).val(), '', $('#employee_field_of_study'));
    });

});
