$(document).ready(function () {
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

    let TableUserType = $('#TableUserType').DataTable({
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

    $('#form-usertype').on('submit', function (event) {
        event.preventDefault();
        var formData = $(this).serializeArray();
        $.ajax({
            url: `/storeUserType`,
            method: 'POST',
            data: formData,
            success: function (response) {
                TableUserType.ajax.reload();
                $('#form-usertype')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al enviar los datos:', textStatus, errorThrown);
            }
        });
    });
});