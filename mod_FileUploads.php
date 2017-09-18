<?php
class FileUpload{
  public $regrasVector,$errordata=array('code'=>0,"value"=>"OK.");
  function __construct($regrasArr){
    $this->regrasVector=$regrasArr;
  }

  function getErrorStatus(){
    return $this->errordata;
  }

  function upload($uploadFile){
  $sucesso=false;
  $extensao_arquivo = strtolower(pathinfo($uploadFile["name"],PATHINFO_EXTENSION)); //Extrai a extensão do arquivo em caixa baixa
  $nome_trajeto=basename($uploadFile["name"]); //Usa o nome original
  if($this->regrasVector['renbymd5_fname']){ //Se regra verdadeira, renomeia usando MD5
    $nome_trajeto=md5(basename($uploadFile["name"]).date("Y-m-d H:i:s").rand()).".".$extensao_arquivo;
  }
  $nome_trajeto=$this->regrasVector['prefix_name'].$nome_trajeto; //Insere prefixo no nome
  $arquivo_trajeto = $this->regrasVector['path_name'] . $nome_trajeto; //Cria variável com pasta e nome final
  $extensao_correta=true; //Começa como verdadeiro
  $fileStatus['fullname']=$arquivo_trajeto;
  $fileStatus['name_last']=$uploadFile["name"];
  $fileStatus['tmpname']=$uploadFile["tmp_name"];
  $fileStatus['name']=$nome_trajeto;
  $fileStatus['ext']=$extensao_arquivo;
  $fileStatus['type']=$uploadFile['type'];
  $fileStatus['size']=$uploadFile['size'];//Em Bytes. Dividir por 1024 para KBytes
  if(isset($this->regrasVector['extension'])) $extensao_correta=in_array($extensao_arquivo,$this->regrasVector['extension']);
  $pastaacessivel=is_writable($this->regrasVector['path_name']);
  //Se existir alguma extensão, verifica alguma bate com a atual
  if ($pastaacessivel && $extensao_correta && (!file_exists($arquivo_trajeto)) ) { //Se as extensões estiverem corretas, e o arquivo ainda não existe:
    if( move_uploaded_file($uploadFile['tmp_name'], $arquivo_trajeto) ){
      $sucesso=true;
    }else{$this->errordata=array('code'=>1,"value"=>"Não foi possível mover o arquivo. Verifique as permissões da pasta.");}
  } else {
    if($extensao_correta) $this->errordata=array('code'=>2,"value"=>"Não é possível salvar: Extensão não suportada");
    elseif(file_exists($arquivo_trajeto)) $this->errordata=array('code'=>3,"value"=>"Não é possível salvar: O arquivo já existe.");
    elseif($pastaacessivel) $this->errordata=array('code'=>5,"value"=>"Não é possível salvar: Pasta sem permissão.");
  }

  $fileStatus['moved']=$sucesso;
  return $fileStatus;
  }
}
?>
