<?php

if(isset($_POST['cnpj'])){
    $content 	= file_get_contents('http://www.receitaws.com.br/v1/cnpj/' . $_POST['cnpj']);
    $content 	= @json_decode($content);

    if(!$content) {
        echo json_encode(
            array(
                'success'	=> false,
                'message'	=> 'Erro ao recuperar informações do CNPJ.',
            )
        );
        return false;
    }else{
        echo json_encode(
            array(
                'success'	=> true,
                'info'		=> $content,
            )
        );
    }
    return false;
}
