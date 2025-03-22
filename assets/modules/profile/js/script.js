$(document).ready(() => {
    salesDatatables();
});


function salesDatatables() {
    $('#salesTable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "responsive": true,
        "destroy": true,
        "order": [
            [0, 'asc']
        ], //Initial no order.
        "columns": [
            { "data": "sales_rep_name", "width": "25%" },
            {
                "data": "sales_rep_com_per",
                "width": "25%",
                "render": function (data, type, row) {
                    // Check if data exists and is not null
                    if (data != null) {
                        return data + ' %'; // Append percentage sign
                    } else {
                        return ''; // Return empty string if data is null
                    }
                }
            },
            {
                "data": "sales_rep_tax_rate", "width": "25%",
                "render": function (data, type, row) {
                    // Check if data exists and is not null
                    if (data != null) {
                        return data + ' %'; // Append percentage sign
                    } else {
                        return ''; // Return empty string if data is null
                    }
                }
            },
            {
                "data": "sales_rep_bonuses", "width": "25%",
                "render": function (data, type, row) {
                    // Check if data exists and is not null
                    if (data != null) {
                        return '$' + data; // Append percentage sign
                    } else {
                        return ''; // Return empty string if data is null
                    }
                }
            },

        ],
        "language": {
            "search": '',
            "searchPlaceholder": "Search keyword...",
            "infoFiltered": ""
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": dis.base_url + 'profile/salesAccount',
            "type": "POST",

        },
    });
}