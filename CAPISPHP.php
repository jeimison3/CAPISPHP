<?php
/**
 * @author Jeimison M. Lima
 * @version 1.0.000
 * @since 2018-08-03
 */
// http://jeimison.me.pn | https://github.com/jeimison3/CAPISPHP/
function getURLDirRoot_NANO(){if(isset($_SERVER["PATH_INFO"])) $pinfo=$_SERVER["PATH_INFO"];else $pinfo= str_replace($_SERVER['REQUEST_URI'],"",$_SERVER['SCRIPT_NAME']);$num_ocur_extras = substr_count($pinfo, '/');$str_sum="";for ($i=0;$i<$num_ocur_extras;$i++) $str_sum.="../"; return $str_sum;}

include_once('mod_PageControl.php'); //Controle de redirecionamentos [MODIFIQUE]
include_once('mod_URLPos.php'); //Funções para redirecionamentos
include_once('mod_Bootstrap.php'); //Livraria de funções para Bootstrap
include_once('mod_BDCon.php'); //Funções para BD
include_once('mod_FileUploads.php'); //Ferramenta de apoio para uploads.
include_once('mod_PHPMailer.php');
//Regras para estrutura HTML da página:


class CAPISPHP_Structure{

  //Dados padrão:
  public static $METAPROP_SiteName="CAPISPHP Exemplo";
  public static $autor="Jemison M. Lima";
  public static $HTML_lang="pt";
  public static $COPYRIGHT="GNU GENERAL PUBLIC LICENSE v3";
  public static $descricao="Ferramenta de exemplo sem fins lucrativos e diversas funcionalidades";
  public static $titulo="Início";
  public static $corTema="#ffffff";
  public static $keywrds="";

  public static $UsarMetaProp=false;
  public static $METAPROP_Language="pt-br";
  public static $METAPROP_Locale="pt_BR";
  public static $METAPROP_IMG="";
  //( Alterações exigem uso das funções abaixo )
  //Definir título da página atual
  public static function setTitl($entrada){self::$titulo=$entrada;}
  //Definir Keywords
  public static function setKeywords($entrada){self::$keywrds=$entrada;}
  //Definir descrição da página atual.
  public static function setDescr($entrada){self::$descricao=$entrada;}
  //Retornar link completo da pasta raiz
  public static function endereco_link(){
	   $requri=$_SERVER['REQUEST_URI'];
	   return 'http://'.$host.URLPos::getURLPos();
  }
  //Retornar link do site
  public static function host_link(){return 'http://'.$_SERVER['HTTP_HOST'].'/';}
}


class MainView{
public $headStrct;

function AddHead($dataAdd){$this->headStrct.="\t\t$dataAdd\n";}
function AddRawMeta($contnt){self::AddHead("<meta ".$contnt.">");}
function AddMeta($name,$contnt){self::AddRawMeta("name='".$name."' content='".$contnt."'");}
function AddScript($dataAdd){self::AddHead("<script src='".URLPos::getURLDirRoot().$dataAdd."'></script>");}
function AddStyle($dataAdd){self::AddHead("<link href='".URLPos::getURLDirRoot().$dataAdd."' rel='stylesheet' type='text/css'>");}

//Função final para exibir conteúdo
function head(){
$this->AddRawMeta('charset="utf-8"');
$this->AddRawMeta('http-equiv="X-UA-Compatible" content="IE=edge"');

$this->AddMeta('viewport','width=device-width, initial-scale=1, maximum-scale=1');
$this->AddMeta('description',CAPISPHP_Structure::$descricao);
$this->AddMeta('author',CAPISPHP_Structure::$autor);
$this->AddMeta('keywords',CAPISPHP_Structure::$keywrds);
$this->AddMeta('theme-color',CAPISPHP_Structure::$corTema);
$this->AddMeta('language',CAPISPHP_Structure::$METAPROP_Language);
$this->AddMeta('COPYRIGHT',CAPISPHP_Structure::$COPYRIGHT);

$this->AddMeta('RATING','GENERAL');
$this->AddMeta('DISTRIBUTION','GLOBAL');
$this->AddMeta('RESOURCE-TYPE','DOCUMENT');
$this->AddMeta('Robots','INDEX,FOLLOW');

if(CAPISPHP_Structure::$UsarMetaProp){
$this->AddRawMeta('property="og:locale" content="'.CAPISPHP_Structure::$METAPROP_Locale.'"');
$this->AddRawMeta('property="og:description" content="'.PageStruct::$descricao.'"');
$this->AddRawMeta('property="og:site_name" content="'.CAPISPHP_Structure::$METAPROP_SiteName.'"');
$this->AddRawMeta('property="og:image" itemprop="image" content="'.CAPISPHP_Structure::host_link().CAPISPHP_Structure::$METAPROP_IMG.'"');
$this->AddRawMeta('property="og:url" content="'.CAPISPHP_Structure::endereco_link().'"');
$this->AddRawMeta('property="og:type" content="article"');
$this->AddRawMeta('property="og:title" content="'.CAPISPHP_Structure::$titulo.' - '.CAPISPHP_Structure::$METAPROP_SiteName.'"');
}

$this->AddHead('<title>'.CAPISPHP_Structure::$titulo.' - '.CAPISPHP_Structure::$METAPROP_SiteName.'</title>');
return $this->headStrct;
}
}



?>
