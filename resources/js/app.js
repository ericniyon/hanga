require('./bootstrap');
/*import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();*/

// import AOS from 'aos';
// AOS.init();
window.select2 = require("select2");

window.select2 = require('select2/dist/js/select2');
window.flatpickr = require('flatpickr');


import PerfectScrollbar from 'perfect-scrollbar';

window.PerfectScrollbar = PerfectScrollbar;

const container = document.querySelector('.scroll');
if (container) {
    new PerfectScrollbar(container);
}

const scrollDetails = document.querySelector('#scrollDetails');
if (scrollDetails) {
    new PerfectScrollbar(scrollDetails);
}

// or just with selector string
// const ps = new PerfectScrollbar('#container');

let displayErrors = function (response) {
    // isSubmitting = false;
    let errors = response.responseJSON.errors;
    let error = response.responseJSON.error;
    if (errors) {
        for (const $key in errors) {
            if (errors.hasOwnProperty($key)) {
                Swal.fire("Error", errors[$key][0], "error");
                break;
            }
        }

    } else if (error) {
        Swal.fire("Error", error, "error");
    } else {
        Swal.fire({
            title: "Error try again later",
            icon: "warning",
        });
    }

};


let loading = false;


document.addEventListener('DOMContentLoaded', function () {

    $('.datepicker').flatpickr({
        allowInput: true,
        dateFormat: 'Y-m-d'
    });

    $(".yearpicker").yearpicker({
        endYear: new Date().getFullYear(),
    });

    $(document).on('click', '.js-delete', function (e) {
        e.preventDefault();
        if (loading === true)
            return;

        let button = $(this);
        let url = button.attr('href');

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this record? you won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                button.addClass('spinner spinner-white spinner-right');
                loading = true;
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function () {
                        location.reload();
                        Swal.fire(
                            'Deleted!',
                            'Your record has been deleted.',
                            'success'
                        );
                    },
                    error: function () {
                        button.removeClass('spinner spinner-white spinner-right');
                        loading = false;
                        Swal.fire({
                            title: 'Error!',
                            text: 'Unable to delete this record, try again',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        })
                    },
                });
            }
        })

        return false;
    });


    $('.submit-form').on('submit', function (e) {
        e.preventDefault();
        if (loading === true)
            return;

        let form = $(this);

        if (!form.valid()) return;

        let btn = form.find(':submit');
        btn.addClass('spinner spinner-right spinner-white')
            .prop('disabled', true);

        const formData = new FormData(this);
        loading = true;
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
                displayErrors(response);
                btn.removeClass('spinner spinner-right spinner-white')
                    .prop('disabled', false);
                loading = false;
            }
        });
    });



});





