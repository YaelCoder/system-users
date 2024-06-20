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

    let TableAddress = $('#TableAddress').DataTable({
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

    $('#zip_code').on('blur', function() {
        var zipCode = $(this).val();
        if (zipCode) {
            $.ajax({
                url: `https://api.copomex.com/query/info_cp/${zipCode}?token=pruebas`,
                method: 'GET',
                success: function(response) {
                    if (response[0].error === false) {
                        var data = response[0].response;
                        $('#colony').val(data.asentamiento);
                        $('#delegation').val(data.municipio);
                        $('#state').val(data.estado);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error al consultar la API:', textStatus, errorThrown);
                    alert('Error al consultar la API. Verifica el código postal e intenta nuevamente.');
                }
            });
        }
    });

    $('#form-address').on('submit', function (event) {
        event.preventDefault();
        var formData = $(this).serializeArray();
        $.ajax({
            url: `/storeAddress`,
            method: 'POST',
            data: formData,
            success: function (response) {
                TableAddress.ajax.reload();
                $('#form-address')[0].reset();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al enviar los datos:', textStatus, errorThrown);
            }
        });
    });
});