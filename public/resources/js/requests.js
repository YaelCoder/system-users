$(document).ready(function () {

    $.ajax({
        url: '/getAddress',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            var select = $('#id_address');
            select.empty();
            select.append('<option value="" selected disabled>Seleccione una dirección</option>');
            $.each(data, function (index, address) {
                select.append('<option value="' + address.id_address + '">' + address.colony + '</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener las direcciones:', textStatus, errorThrown);
        }
    });

    $.ajax({
        url: '/getUserType',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            var select = $('#id_user_type');
            select.empty();
            select.append('<option value="" selected disabled>Seleccione un tipo de usuario</option>');
            $.each(data, function (index, type) {
                select.append('<option value="' + type.id_user_type + '">' + type.user_type + '</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener los tipos de usuarios:', textStatus, errorThrown);
        }
    });

    $('#addUser').on('submit', function (event) {
        event.preventDefault();

        var data = $(this).serializeArray();
        $.ajax({
            url: '/store-users',
            method: 'POST',
            data: data,
            success: function (response) {
                window.location.href = "/users-list"
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al enviar los datos:', textStatus, errorThrown);
            }
        });
    });

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
        // Obtener el objeto almacenado en localStorage
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

    $('#list').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        "language": {
            "url": '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json',
        },
        "ajax": {
            "url": "/get-users",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            { "data": "firstname", "title": "Nombre" },
            { "data": "lastname", "title": "Apellido" },
            { "data": "email", "title": "Email" },
            { "data": "phone", "title": "Teléfono" },
            { "data": "user_type", "title": "Tipo de usuario" },
            { "data": "status", "title": "Estatus", "class": "text-center", "orderable": false },
        ],
        "columnDefs": [
            {
                "target": -1,
                "render": function (data, type, row, meta) {
                    return data === 'activo' ? '<span class="badge text-bg-success">Activo</span>' : '<span class="badge text-bg-danger">Desactivado</span>'
                }
            }
        ]
    });

    $('#TableAddress').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        "language": {
            "url": '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json',
        },
        "ajax": {
            "url": "/getAddress",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_address", "title": "ID"},
            { "data": "zip_code", "title": "Codigo Postal"},
            { "data": "colony", "title": "Colonia"},
            { "data": "delegation", "title": "Delegacion"},
            { "data": "state", "title": "Estado"}
        ]
    });

    $('#TableUserType').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                text: 'Exportar a Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        "language": {
            "url": '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-MX.json',
        },
        "ajax": {
            "url": "/getUserType",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_user_type", "title": "ID"},
            { "data": "user_type", "title": "Tipo de usuario"}
        ]
    });
});
