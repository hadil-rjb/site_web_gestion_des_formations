$(document).ready(function () {
    // Masquer la table des employés initialement
    $("#employees-table").hide();

    // Gérer le clic sur le bouton "Les Directeurs"
    $("#directors-button").click(function () {
        // Afficher la table des directeurs et masquer la table des employés
        $("#directors-table").show();
        $("#employees-table").hide();
    });

    // Gérer le clic sur le bouton "Les employés"
    $("#employees-button").click(function () {
        // Afficher la table des employés et masquer la table des directeurs
        $("#employees-table").show();
        $("#directors-table").hide();
    });
});

$(document).ready(function () {
    var commonOptions = {
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Tout"]
        ],
        "ordering": true,
        "language": {
            "lengthMenu": "Afficher _MENU_ éléments",
            "zeroRecords": "Aucun résultat trouvé",
            "search": "Recherche :",
            "info": "Affichage des éléments _START_ à _END_ sur _TOTAL_",
            "infoEmpty": "Affichage 0 à 0 de 0 entrées",
            "infoFiltered": "(filtré à partir de _MAX_ entrées au total)",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            }
        },
        "initComplete": function (settings, json) {
            $(this.api().table().container()).find('.dataTables_length select').addClass('w-24');
        },
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                className: 'rounded-l-lg border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700',
                text: 'Excel',
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'pdf',
                className: 'border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'rounded-r-md border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700',
                text: 'Imprimer',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    };




    // Appliquer DataTables à vos tables avec les options communes
    var table1 = $('#example').DataTable($.extend({}, commonOptions));

    // Appliquer DataTables à votre deuxième table avec les options communes
    var table2 = $('#example2').DataTable($.extend({}, commonOptions));

    // Ajouter des classes CSS spécifiques à votre deuxième table générée par DataTables
    $('#example2_wrapper').addClass('w-full');


});

$(document).ready(function () {
    var commonOptions = {
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Tout"]
        ],
        "ordering": true,
        "language": {
            "lengthMenu": "Afficher _MENU_ éléments",
            "zeroRecords": "Aucun résultat trouvé",
            "search": "Recherche :",
            "info": "Affichage des éléments _START_ à _END_ sur _TOTAL_",
            "infoEmpty": "Affichage 0 à 0 de 0 entrées",
            "infoFiltered": "(filtré à partir de _MAX_ entrées au total)",
            "paginate": {
                "first": "Premier",
                "last": "Dernier",
                "next": "Suivant",
                "previous": "Précédent"
            }
        },
        "initComplete": function (settings, json) {
            $(this.api().table().container()).find('.dataTables_length select').addClass('w-24');
        },
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excelHtml5',
                className: 'rounded-l-lg border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700',
                text: 'Excel',
                exportOptions: {
                    columns: ':visible',
                }
            },
            {
                extend: 'pdf',
                className: 'border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'rounded-r-md border border-gray-200 bg-white text-sm font-medium px-4 py-2 text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700',
                text: 'Imprimer',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    };

    // Fonction de filtrage personnalisée
    function customFiltering1(settings, data, dataIndex) {
        var minDate1 = $('#min-date-filter').val();
        var maxDate1 = $('#max-date-filter').val();
        var currentDate1 = data[8]; // Colonne contenant les dates dans votre tableau

        if ((minDate1 === '' && maxDate1 === '') || (currentDate1 >= minDate1 && currentDate1 <= maxDate1)) {
            return true;
        }

        return false;
    }

    function customFiltering2(settings, data, dataIndex) {
        var minDate2 = $('#min-date-filter2').val();
        var maxDate2 = $('#max-date-filter2').val();
        var currentDate2 = data[7]; // Colonne contenant les dates dans votre tableau

        if ((minDate2 === '' && maxDate2 === '') || (currentDate2 >= minDate2 && currentDate2 <= maxDate2)) {
            return true;
        }

        return false;
    }


    // Appliquer DataTables à vos tables avec les options communes
    var table = $('#example1').DataTable($.extend({}, commonOptions));

    // Appliquer DataTables à votre deuxième table avec les options communes
    var table3 = $('#example3').DataTable($.extend({}, commonOptions));

    // Ajouter des classes CSS spécifiques à votre deuxième table générée par DataTables
    $('#example2_wrapper').addClass('w-full');

    // Filtrer par domaine
    $('#domain-filter').on('keyup', function () {
        table.column(2).search($(this).val()).draw();
    });

    $('#domain-filter2').on('keyup', function () {
        table3.column(2).search($(this).val()).draw();
    });

    // Filtrer par priorité
    $('#priority-filter').on('change', function () {
        var selectedPriority1 = $(this).val();
        table.column(6).search(selectedPriority1).draw();
    });

    $('#priority-filter2').on('change', function () {
        var selectedPriority2 = $(this).val();
        table3.column(6).search(selectedPriority2).draw();
    });

    // Filtrer par plage de dates
table.on('draw', function () {
    $.fn.dataTable.ext.search.push(customFiltering1);
    }).draw();
    // Filtrer par plage de dates
table.on('draw', function () {
    $.fn.dataTable.ext.search.push(customFiltering2);
    }).draw();


    $('#min-date-filter, #max-date-filter').on('change', function () {
        table.draw();
    });

    $('#min-date-filter2, #max-date-filter2').on('change', function () {
        table3.draw();
    });

});















$(document).ready(function () {
    $('#employees').select2();
});

$(document).ready(function () {
    $('#cabinet').select2({
        multiple: true
    });
});


document.addEventListener("alpine:init", () => {
    Alpine.data("layout", () => ({
        asideOpen: true,
    }));
});

// Dans votre fichier JavaScript (app.js par exemple)
document.addEventListener('DOMContentLoaded', function () {
    var loader = document.getElementById('loading');
    setTimeout(function () {
        loader.style.display = 'none';
    }, 500);
});
