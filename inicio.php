<html>
<head>
<?php
$mvw = new MainView();
CAPISPHP_Structure::setTitl("Exemplos");
echo($mvw->head());
$rootdir=URLPos::getURLDirRoot(); //Criada variável para reduzir linhas ocupadas pela função.
?>
<style>
p{font-size: 34px;}
tr td{font-style: italic;}
</style>
</head><body>
<center>
  <p>Página de exemplos</p>
  <h4>Perceba que esta página também é um exemplo do módulo '<i>mod_PageControl.php</i>'
    <br/><a href="<?php echo($rootdir); ?>index.php">Clique aqui</a> ou <a href="<?php echo($rootdir); ?>index.php/inicio">aqui</a> para abrir a mesma página com link reduzido.</h4>
<table style="width:40%;">
<tbody>
<tr><th colspan="2">Exemplos dos módulos (<i>note seus links</i>)</th></tr>
<tr><td>mod_FileUploads.php</td><th><a target="_blank" href="<?php echo($rootdir); ?>index.php/html_fileupload">Abrir exemplo</a></th></tr>
<tr><td>mod_PHPMailer.php</td><th><a target="_blank" href="<?php echo($rootdir); ?>index.php/html_mailsend">Abrir exemplo</a> (necessário modificar)</th></tr>


</tbody>
</table>
</p>
</center></body></html>
