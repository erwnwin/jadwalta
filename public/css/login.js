$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        $('#btnLogin').prop('disabled', true).html('Login ....');
        
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            url: 'login/proses_login', // Endpoint AJAX
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            dataType: 'json',
            success: function(response) {
                $('#btnLogin').prop('disabled', false).html('Login');
                
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });

                if (response.status === 'success') {
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });

                    // Kosongkan form setelah berhasil
                    $('#username').val('');
                    $('#password').val('');

                    // Redirect setelah 2 detik
                    setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 2000);
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                $('#btnLogin').prop('disabled', false).html('Login');
                console.error(xhr.responseText);

                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong. Please try again.'
                });
            }
        });
    });
});
