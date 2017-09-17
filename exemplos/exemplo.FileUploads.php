<?php
if(isset($_FILES["anexo"]["name"])){
$regras_upload=array(
  'path_name'=>'exemplos/uploads/', //Diretório para salvar arquivos
  'extension'=>array('bmp','png','jpg','jpeg','pdf'), //Extensões suportadas
  'renbymd5_fname'=>true, //Renomear arquivo com algoritmo MD5
  'prefix_name'=>'curric_', //Adicionar prefixo ao nome do arquivo
);

$uploader=new FileUpload($regras_upload); //Cria classe com as regras

if( $instancia = $uploader->upload($_FILES["anexo"]) ){ //Faz upload de arquivo
  echo("<p>Nome: ".$instancia["name"]."</p>".
       "<p>Nome original: ".$instancia["name_last"]."</p>".
       "<p>Endereço: ".$instancia["fullname"]."</p>".
       "<p>Extensão: ".$instancia["ext"]."</p>".
       "<p>Tipo: ".$instancia["type"]."</p>".
       "<p>Tamanho: ".(floatval($instancia["size"])/1024)." KB</p>"
     );
}else{ //Caso retorne FALSO, trata erro:
  echo("<p>Código: ".$uploader->getErrorStatus()['code']."</p>".
       "<p>Mensagem: ".$uploader->getErrorStatus()['value']."</p>"
     );
}


}else{echo('Nenhum arquivo foi recebido.');}
?>
