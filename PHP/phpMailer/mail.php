<?php

if (isset($_POST['mail'])) {
	
	$email = $_POST['mail'];
	print $email."<br>";
	
	require 'PHPMailerAutoload.php';

	$mail = new PHPMailer;                              

	$mail->CharSet = 'UTF-8';
	$mail->IsSMTP();
	
	// $mail->Host = 'smtp.gmail.com'; //gmail                                
	$mail->Host = 'smtp.office365.com'; //Hotmail
	// $mail->Host = '10.0.0.135';

	//Usar autenticação SMTP
	$mail->SMTPAuth = true;                            
	// $mail->SMTPAuth = false;                           
                      
	// $mail->Username = 'robertoenrico_@hotmail.com';                                
	$mail->Username = 'roberto.nicolo@integralmedica.com.br';              
	$mail->Password = '@!_15385waWA';                       
	
	// $mail->SMTPSecure = 'STARTTLS'; //office365                         
	$mail->SMTPSecure = 'tls'; //hotmail                         
	// $mail->SMTPSecure = 'ssl'; //google                          

	// $mail->Port = 25;
	$mail->Port = 587; //hotmail
	// $mail->Port = 465; //google
	
	$mail->SMTPDebug = 0; //Desativa a depuração, sendo a opção padrão.
	// $mail->SMTPDebug = 1; //Exibe mensagens retornadas pelo cliente
	// $mail->SMTPDebug = 2; //Exibe mensagens do cliente e servidor
	// $mail->SMTPDebug = 4; //Exibe todas as mensagens, incluindo detalhes da comunicação

	// $mail->setFrom('roberto.nicolo@integralmedica.com.br', 'Sistema do Beto'); //Remetente
	$mail->setFrom('robertoenrico_@hotmail.com', 'Sistema do Beto'); //Remetente

	$mail->AddAddress($email); //Destinatarios

	$mail->isHTML(true); //Define que o e-mail será enviado como HTML

	// if ($_SERVER['SCRIPT_FILENAME'] == "C:/xampp/htdocs/bla/email.php") {

		$html = '
			<html>
			<head>
			<title>Confirmação de Cadastro</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			</head>
		
			<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		
			<table id="Tabela_01" width="600" height="922" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<img src="https://hospedagemimagem.000webhostapp.com/img/header.png" width="600" height="115" alt="Baixar imagens" style="display:block;">
					</td>
				</tr>
				<tr>
					<td>
						<img src="https://hospedagemimagem.000webhostapp.com/img/section2.png" width="600" height="300" alt="Baixar imagens" style="display:block;">
					</td>
				</tr>
				<tr>
					<! -- <td width="600" height="320" style="font-size: 18px; background: linear-gradient(to right, #e3e3e3, white, white, white, white, white, #e3e3e3);"> -->
					<td width="600" height="320" style="font-size: 18px; background-color: #e3e3e3;">
						<br>
						<p style="text-align: center;">Caro Lojista.</p>
						<p style="margin-left:5%;">Recebemos seu contato pelo nosso site manifestando interesse em ter os <b>suplementos Darkness</b> em sua loja.<br>
						<b>Você está no caminho certo! Afinal, é a linha mais hardcore do Brasil.</b><br>
						Vamos dar andamento à sua solicitação, para isso basta<br>
						seguir os próximos passos:
						<li style="margin-left:5%;">Clique no link abaixo e confirme seu cadastro.</li>
						<li style="margin-left:5%;">Aguarde o e-mail de efetivação.</li>
						<li style="margin-left:5%;">Após a efetivação, você receberá o retorno de um representante em <br>até 5 dias úteis.</li>
						</p>
						<p style="text-align: center;">Até breve!</p>
						<a href="#"><center><img src="https://hospedagemimagem.000webhostapp.com/img/btn.png" style="display:block;"></center></a><br>
					</td>
				</tr>
				<tr>
					<td>
						<img src="https://hospedagemimagem.000webhostapp.com/img/footer.png" width="600" alt="Baixar imagens" style="display:block;">
					</td>
				</tr>
			</table>
		
			</body>
			</html>
		';
	
	// }

	$mail->Subject = 'Titulo - ' . $email;
	$mail->Body    = $html;
	// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if($mail->send()) {
		print "<br>Email Enviado";
	} else {
		print '<br>Erro ao enviar o e-mail: <br>';
		print 'Mailer Error: ' . $mail->ErrorInfo;
	}
}
