$(document).ready(function () {

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

    let TableUsers = $('#list').DataTable({
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
            { "data": null, "title": "Acciones", "orderable": false, "searchable": false },
        ],
        "columnDefs": [
            {
                "target": 5,
                "render": function (data, type, row, meta) {
                    return data === 'activo' ? '<span class="badge text-bg-success">Activo</span>' : '<span class="badge text-bg-danger">Desactivado</span>'
                }
            },
            {
                "target": 6,
                "render": function (data, type, row, meta) {
                    return '<button class="btn btn-sm btn-primary mx-2" type="button" onclick=\'edit(' + JSON.stringify(row) + ')\'>Editar</button>' +
                        '<button class="btn btn-sm btn-danger" type="button" onclick=\'deleteUser(' + JSON.stringify(row) + ')\'>Eliminar</button>'
                }
            }
        ]
    });

    window.edit = function (row) {
        $('#editUserModal').modal('show');
        $('#id_user').val(row.id_user);
        $('#firstname').val(row.firstname);
        $('#lastname').val(row.lastname);
        $('#gender').val(row.gender);
        $('#email').val(row.email);
        $('#phone').val(row.phone);
        $('#status').val(row.status);
        $('#id_address').val(row.id_address);
        $('#id_user_type').val(row.id_user_type);
        $('#username').val(row.username);
    };

    $('#editUserForm').on('submit', function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: `/edit-user/${$('#id_user').val()}`,
            method: 'PUT',
            data: formData,
            success: function (response) {
                TableUsers.ajax.reload();
                $('#editUserModal').modal('hide');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al enviar los datos:', textStatus, errorThrown);
            }
        });
    });

    window.deleteUser = function (row) {

        var formData = {
            id_user: row.id_user,
            firstname: row.firstname,
            lastname: row.lastname,
            gender: row.gender,
            email: row.email,
            phone: row.phone,
            status: row.status === 'activo' ? 'inactivo': 'activo',
            id_address: row.id_address,
            id_user_type: row.id_user_type,
            username: row.username,
        };

        $.ajax({
            url: `/edit-user/${row.id_user}`,
            method: 'PUT',
            data: formData,
            success: function (response) {
                TableUsers.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al enviar los datos:', textStatus, errorThrown);
            }
        });
    };
});