


$(document).ready(function() {


    $('#daterangepicker').daterangepicker({
        showDropdowns: true,
        minYear: 2011,
        maxYear: 2021,
        // singleDatePicker: true,
        ranges: {
            'Hoje': [moment(), moment()],
            'Ultimos 15 Dias': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
            'Ultimos 45 Dias': [moment().subtract(29, 'days'), moment()],
        },
        locale: {
            format: "DD/MM/YYYY",
            separator: " - ",
            applyLabel: "Pronto",
            cancelLabel: "Cancelar",
            customRangeLabel: "Personalizar",
            daysOfWeek: [
                "Dom","Seg","Ter","Qua","Qui","Sex","Sáb"
            ],
            monthNames: [
                "Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"
            ],
        }
    });
    $('#daterangepicker').on('cancel.daterangepicker',function(selecionador){
        $(this).val('');
    });
    // $('#daterangepicker').on('apply.daterangepicker',function(selecionador){
        
    // });



});