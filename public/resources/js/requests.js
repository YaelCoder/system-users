$(document).ready(function() {
    window.login = function() {
        var formData = $('#form').serializeArray();
        $.ajax({
            url: '/login',
            method: 'POST',
            data: formData,
            success: function(response) {
                localStorage.setItem('userData', JSON.stringify(response.data));
                window.location.href = "/dashboard"
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(errorThrown)
            }
        });
    };

    window.logut = function() {

        
        $.ajax({
            url: '/logout',
            method: 'POST',
            data: formData,
            success: function(response) {
                window.location.href = "/"
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(errorThrown)
            }
        });
    };
});
