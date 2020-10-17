



$(document).ready(function () {
    $('#btn-dadosCadastrais').click(function(){
        $('.dadosCadastrais').show();
        $('.dadosEnderecos').hide();
    });
    $('#btn-dadosEnderecos').click(function(){
        $('.dadosEnderecos').show();
        $('.dadosCadastrais').hide();
    })

});