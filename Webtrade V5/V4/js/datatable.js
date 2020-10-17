$(document).ready(function() {
  var table = $('#myDatatable').DataTable({
    // searching: false,
    responsive: true,
    // ordering: true,
    // "lengthChange": false,
    // info: false,
    // colReorder: true,
    // responsive: true,
    // pagingType: "simple",

    // responsive: {
    // }

    // scrollY: '80vh',
    // scrollCollapse: true,

    // deferRender:    true,
        // scrollY:        '80vh',
        // scrollCollapse: true,
        // scroller:       true,

    //i = mostrando de 1 ate 4
    //p = page
    //l = filtro qtd de registro p/ pag
    //f = pesquisar
    //B = buttons
    //t = table visibiliy

    // dom: '<"row" <"col"f> <"col"> <"col"B> <"col"l> > rt <"row" <"col"i><"col"p> >',
    dom: '<"row dataTable-responsive" <"col line-lf"lf> <"col"B> > rt <"table-pagination table-responsive" <"col" i > <"col"p> >',
    buttons: [
      { 
        extend:    'copyHtml5',
        text:      '<i class="far fa-copy"></i>',
        titleAttr: 'Copiar',
        // attr:{
        //   title: 'Copiar',
        //   class: 'btn-databtable',
        // }
      },
      {
          extend:    'print',
          text:      '<i class="fas fa-print"></i>',
          titleAttr: 'Imprimir'
      },
      {
        extend:    'excelHtml5',
        text:      '<i class="far fa-file-excel"></i>',
        titleAttr: 'Excel'
      },
      {
        extend:    'pdfHtml5',
        text:      '<i class="far fa-file-pdf"></i>',
        titleAttr: 'PDF'
      },
      {
        extend:    'colvis',
        text:      '<i class="fas fa-file-alt"></i>',
        titleAttr: 'Ocultar Colunas'
      },
    ],
    language: {
      "sEmptyTable": "Nenhum registro encontrado",
      "sInfo": 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
      "sInfoEmpty": "Nenhum registro econtrado",
      "sInfoFiltered": "(Filtrados de _MAX_ registros)",
      "sInfoPostFix": "",
      "sInfoThousands": ".",
      "sLengthMenu": "_MENU_",
      "sLoadingRecords": "Carregando...",
      "sProcessing": "Processando...",
      "sZeroRecords": "Nenhum registro encontrado",
      "sSearch": "",
      "oPaginate": {
          "sNext": "Próximo",
          "sPrevious": "Anterior",
          "sFirst": "Primeiro",
          "sLast": "Último"
      },
      "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
      }
    },
    // columnDefs: [
      // { responsivePriority: 4, targets: 0 },
      // { responsivePriority: 0, targets: 1 },
      // { responsivePriority: 33, targets: 2 },
      // { responsivePriority: 44, targets: 3 },
      // { responsivePriority: 55, targets: 4 },
      // { responsivePriority: 66, targets: 5 },
      // { responsivePriority: 77, targets: 6 },
      // { responsivePriority: 88, targets: 7 },
      // { responsivePriority: 9, targets: 8 },
    // ],
    columnDefs: [ 
      { orderable: false, targets: 0 } 
    ],

  });

  // var table = $('#myDatatable').DataTable();
  // $('#myDatatable thead tr').clone(true).appendTo('#myDatatable thead');
  // $('#myDatatable thead tr:eq(1) th').each( function (i) {
  //   var title = $(this).text();
  //   $(this).html( '<input type="text" class="form-control form-control-sm" placeholder="Buscar '+title+'" />' );

  //   $( 'input', this ).on( 'keyup change', function () {
  //     if ( table.column(i).search() !== this.value ) {
  //       table
  //         .column(i)
  //         .search( this.value )
  //         .draw();
  //     }
  //   });
  // });

  $('.buttons-colvis').click(function(){
    $('.dt-button-collection').attr('style', '');
  });

  $('#myDatatable_filter > label > input').attr('placeholder', 'Buscar na tabela:');

  $('.dt-button').addClass('btn-databtable');
  $('.dt-button').attr('data-toggle','tooltip');
  $('[data-toggle="tooltip"]').tooltip();

  // $('[name=myDatatable_length]').attr('data-toggle','tooltip');
  // $('[name=myDatatable_length]').attr('title', 'Top registros');

  // stringInfo_pri = $('.stringInfo_pri > #myDatatable_info').html();
  // stringInfo_secun = $('.stringInfo_secun > .dataTables_info').html();
  // // stringLength = $('#myDatatable_length').html();
  
  // stringInfo_pri = stringInfo_pri.substring(18, -10);
  // stringInfo_secun = stringInfo_secun.substring(21);

  // console.log(stringInfo_secun);

  // $('.stringInfo_pri > #myDatatable_info').html(stringInfo_pri);
  // $('.stringInfo_secun > .dataTables_info').html(stringInfo_secun);

  // table.a();
  
  // $('#myDatatable').on('fnReloadAjax', function(){

  // });
    
  // }

  // a();

  // function a(){
    

  //   stringInfo_pri = $('.stringInfo_pri > #myDatatable_info').html();
  //   stringInfo_secun = $('.stringInfo_secun > .dataTables_info').html();
  //   // stringLength = $('#myDatatable_length').html();
    
  //   stringInfo_pri = stringInfo_pri.substring(18, -10);
  //   stringInfo_secun = stringInfo_secun.substring(21);

  //   console.log(stringInfo_secun);

  //   $('.stringInfo_pri > #myDatatable_info').html(stringInfo_pri);
  //   $('.stringInfo_secun > .dataTables_info').html(stringInfo_secun);
  
  
  // }


});