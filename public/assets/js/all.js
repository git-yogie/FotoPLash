toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
var pop = document.querySelector('#pop');
var pop_error = document.querySelector('#pop_error');
if (pop != null) {
    var message = pop.getAttribute('data-message');
    toastr['success'](message);
}
if (pop_error != null) {
    var message = pop.getAttribute('data-message');
    toastr['error'](message);
}


var LoginError = document.getElementById('LoginError');
const SignInModal = new bootstrap.Modal(document.getElementById('modalSignin'), { keyboard: true })
if (LoginError != null) {
    SignInModal.show()
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#show_image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#foto").change(function() {
    readURL(this);
});

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))