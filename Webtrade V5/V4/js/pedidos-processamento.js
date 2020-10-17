

$(document).ready(function () {

  jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function () {
      $(".sidebar-submenu").slideUp(200);

      if ($(this).parent().hasClass("active")) {
        $(".sidebar-dropdown").removeClass("active");
        $(this).parent().removeClass("active");

        $(this).find('#icon-seta').removeClass("fas fa-angle-up");
        $(this).find('#icon-seta').addClass("fas fa-angle-down");

      } else {
        
        $(this).find('#icon-seta').addClass("fas fa-angle-up");

        $(".sidebar-dropdown").removeClass("active");
        $(this).next(".sidebar-submenu").slideDown(200);
        $(this).parent().addClass("active");
      }

    });
    
    // ICON
    var hide = 0;
    $("#show-sidebar").on('click', function () {
      $(".page-wrapper").addClass("toggled");
      hide = 1;
    });

    $("#hide-sidebar").on('click', function () {
      $(".page-wrapper").removeClass("toggled");
    });
    
    // $("a#hide-sidebar").click(function () {
    //   if($('a#show-sidebar').hasClass('hide-sidebar')){
    //     $(".page-wrapper").removeClass("toggled");
    //   }
    // });

    $(".hide-menu").click(function () {
      if (hide == 1) {
        $(".page-wrapper").removeClass("toggled");
      }
    });




  });


  // PERFIL
    //VEND
    $('#dropdownVends-responsive').on("click", function (e) {
      $('#dropdownVend-responsive').toggle();
      $('#btn-atualizar').show();
    });

    //CARTEIRA
    $('#dropdownCarteiras-responsive').on("click", function (e) {
      $('#dropdownCarteira-responsive').toggle();
      $('#btn-atualizar').show();
    });
    //FILIAL
    $('#dropdownFilials-responsive').on("click", function (e) {
      $('#dropdownFilial-responsive').toggle();
      $('#btn-atualizar').show();
    });
  //END PERFIL


  // TROCAR MODULO  
  $('#dropdownMenu-modulo-webtrade').on('click', function(){
    $('#dropdownMenu-modulo-active b').html('Sales');
    $('#modulo-procurement').hide();
    $('#modulo-tax').hide();
    $('#modulo-webtrade').show();
  });
  $('#dropdownMenu-modulo-procurement').on('click', function(){
    $('#dropdownMenu-modulo-active b').html('Procurement');
    $('#modulo-webtrade').hide();
    $('#modulo-tax').hide();
    $('#modulo-procurement').show();
  });
  $('#dropdownMenu-modulo-tax').on('click', function(){
    $('#dropdownMenu-modulo-active b').html('Tax & Accounting');
    $('#modulo-webtrade').hide();
    $('#modulo-procurement').hide();
    $('#modulo-tax').show();
  });


  $('.carousel').carousel('pause');


});