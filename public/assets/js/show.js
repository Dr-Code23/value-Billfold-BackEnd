$(document).ready(function() {
    $('#toggle-password').click(function() {
        var passwordInput = $('#password');
        var passwordFieldType = passwordInput.attr('type');
        if (passwordFieldType == 'password') {
            passwordInput.attr('type', 'text');
            $(this).html('<i class="fa fa-eye-slash"></i>');
        } else {
            passwordInput.attr('type', 'password');
            $(this).html('<i class="fa fa-eye"></i>');
        }
    });
});
