$(document).ready(function () {
    window.login = function () {
        var formData = $('#form').serializeArray();
        $.ajax({
            url: '/login',
            method: 'POST',
            data: formData,
            success: function (response) {
                localStorage.setItem('userData', JSON.stringify(response.data));
                window.location.href = "/dashboard"
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(errorThrown)
            }
        });
    };

    window.logout = function () {
        var userData = localStorage.getItem('userData');
        if (userData) {
            userData = JSON.parse(userData);
        }

        $.ajax({
            url: '/logout',
            method: 'POST',
            headers: {
                'User-Data': JSON.stringify(userData)
            },
            success: function (response) {
                localStorage.removeItem('userData');
                window.location.href = "/";
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(errorThrown)
            }
        });
    };
});