



$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    // PERFIL
        $('#dropdownPerfil').on("click", function(e){
            $('#dropdownPerfiInfo').toggle();
            clickPerfil = 1;
        });
        $('section').on("click", function(){
            if(clickPerfil == 1){
                $('#dropdownPerfiInfo').hide();
                clickPerfil = 0;
            }
        });
        //VEND
        $('#dropdownVends').on("click", function(e){
            $('#dropdownVend').toggle();
        });          
        
        //CARTEIRA
        $('#dropdownCarteiras').on("click", function(e){
            $('#dropdownCarteira').toggle();
            // $('.btn-align').show();
            e.stopPropagation();
        });
        
        $('#dropdownFilials').on("click", function(e){
            $('#dropdownFilial').toggle();
            // $('.btn-align').show();
            e.stopPropagation();
        });
    //END PERFIL


    // config theme color
        //DEFAULT
        $('.thems-skin').addClass('theme-integral');
        
        // integral
        $('#theme-integral').click(function(){  
            $('.thems-skin').addClass('theme-integral');
            $('.thems-skin').removeClass('theme-dark');        
            $('.thems-skin').removeClass('theme-nutrify');
            $('.thems-skin').removeClass('theme-hopper');

            $('#quadrado-select-integral-active').show();
            $('#quadrado-select-integral').hide();

            $('#quadrado-select-dark-active').hide();
            $('#quadrado-select-dark').show();

            $('#quadrado-select-nutrify').show();
            $('#quadrado-select-nutrify-active').hide();
            
            $('#quadrado-select-hopper-active').hide();
            $('#quadrado-select-hopper').show();

        });
        
        // darK
        $('#theme-dark').click(function(){
            $('.thems-skin').addClass('theme-dark');
            $('.thems-skin').removeClass('theme-integral');
            $('.thems-skin').removeClass('theme-nutrify');
            $('.thems-skin').removeClass('theme-hopper');
            
            $('#quadrado-select-dark-active').show();
            $('#quadrado-select-dark').hide();

            $('#quadrado-select-integral-active').hide();
            $('#quadrado-select-integral').show();

            $('#quadrado-select-nutrify').show();
            $('#quadrado-select-nutrify-active').hide();
            
            $('#quadrado-select-hopper-active').hide();
            $('#quadrado-select-hopper').show();
            
        });
        
        // nutrify
        $('#theme-nutrify').click(function(){
            $('.thems-skin').addClass('theme-nutrify');
            $('.thems-skin').removeClass('theme-integral');
            $('.thems-skin').removeClass('theme-dark');
            $('.thems-skin').removeClass('theme-hopper');
            
            $('#quadrado-select-nutrify-active').show();
            $('#quadrado-select-nutrify').hide();

            $('#quadrado-select-dark-active').hide();
            $('#quadrado-select-dark').show();

            $('#quadrado-select-integral-active').hide();
            $('#quadrado-select-integral').show();
            
            $('#quadrado-select-hopper-active').hide();
            $('#quadrado-select-hopper').show();
            
        });

        // hopper
        $('#theme-hopper').click(function(){
            $('.thems-skin').addClass('theme-hopper');
            $('.thems-skin').removeClass('theme-integral');
            $('.thems-skin').removeClass('theme-dark');
            $('.thems-skin').removeClass('theme-nutrify');

            $('#quadrado-select-hopper-active').show();
            $('#quadrado-select-hopper').hide();
            
            $('#quadrado-select-nutrify-active').hide();
            $('#quadrado-select-nutrify').show();

            $('#quadrado-select-dark-active').hide();
            $('#quadrado-select-dark').show();

            $('#quadrado-select-integral-active').hide();
            $('#quadrado-select-integral').show();
            
        });



    // FILTRO INPUTS
    $("#filtro_show_hide").on('click', function(){
        $('#filtro').toggle();
    });

    //ALTER IMG
    $('#alter-img').on('click', function() {
        alter_img();
    })
    function alter_img(){
        $('#select-img').click();
    }

});