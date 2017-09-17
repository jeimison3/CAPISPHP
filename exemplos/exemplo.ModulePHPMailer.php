<?php
//Por hora, amplamente funcional apenas com SMTP

//Dados a seguir correspondem à configuração padrão do GMAIL
$MailerData=array('host'=>'smtp.gmail.com', //Endereço do host
'porta'=>587,'SMTPSec'=>'tls', //Porta e segurança SMTP que o servidor usa
'email'=>'seuemail@gmail.com', //Seu email
'passwd'=>'', //Sua senha
'use_html'=>true //Para TRUE o e-mail será enviado como HTML, para FALSE será 'plain text'
);

$msend = new ModulePHPMailer($MailerData);
$msend->SetAssunto('Teste Mailer');
//$msend->AddAnexo('exemplos/upload/1.bmp'); //Este arquivo não existe! Que tal usar o módulo de upload?
$msend->SetNomeOrigem('Sistema');
$msend->addDestino($_POST['email'],$_POST['name']);
$msend->addDestino('destino2@gmail.com','Nome do Destino');
$msend->addDestino('semnome@algumdominio.com.br');

$msend->SetMensagem('<p>Segue em anexo um arquivo em teste.</p>');

$msend->enviar();

if($msend->getError()['code']==0){echo "Enviado!";}else{
echo("Código de erro: ".$msend->getError()['code']."<br/>
Mensagem: ".$msend->getError()['value']);
}

?>
