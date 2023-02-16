$(document).ready(function () {
    var table = $('.sensor-table').DataTable({
        // Ordem decrescente
        order: [[0, 'desc']],
        // Traduzir para PT
        language: {
            sProcessing: 'A processar...',
            sLengthMenu: 'Mostrar _MENU_ registros',
            sZeroRecords: 'Nenhum resultado encontrado',
            sEmptyTable: 'Nenhum resultado encontrado',
            sInfo: 'A mostrar registos de _START_ a _END_  de um total de _TOTAL_ registros',
            sInfoEmpty: 'A mostrar 0 ',
            sInfoFiltered: 'num total de _MAX_ registros',
            sInfoPostFix: '',
            sSearch: 'Procurar: ',
            sUrl: '',
            sInfoThousands: ',',
            sLoadingRecords: 'A carregar...',
            oPaginate: {
                sFirst: 'Primeiro',
                sLast: 'Último',
                sNext: 'Seguinte',
                sPrevious: 'Anterior',
            },
            oAria: {
                sSortAscending: ': Ativar para ordenar a coluna de maneira ascendente',
                sSortDescending: ': Ativar para ordenar a coluna de maneira descendente',
            },
        },
    });

    var data = table.data();
});
