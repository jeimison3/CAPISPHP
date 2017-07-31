<?php
include_once('./mod_PageControl.php'); //Controle de redirecionamentos [MODIFIQUE]
include_once('./mod_URLPos.php'); //Funções para redirecionamentos

//Regras para estrutura HTML da página:
class CAPISPHP_Structure{

  //Dados padrão:
  public static $autor="Jeimison Moreno";
  public static $HTML_lang="pt";
  public static $COPYRIGHT="Copyright (c) 2017 Jeimison Moreno";
  public static $descricao="Ferramenta de exemplo";
  public static $titulo="Início";
  public static $corTema="#000000";
  public static $keywrds="";

  public static $METAPROP_SiteName="Site Exemplo";
  public static $METAPROP_Language="pt-br";
  public static $METAPROP_Locale="pt_BR";
  public static $METAPROP_IMG="img/sla.jpg";
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


//Reconhece URL atual e navega diretamente.
PageControl::navegar_para(URLPos::getURLObjects());

class MainView{
public static $conteudo="";
public static $headStrct="";
//Função para adicionar conteúdo ao <body>
public static function EchoView($dataAdd){self::$conteudo.=$dataAdd;}
public static function AddHead($dataAdd){self::$headStrct.="\t\t$dataAdd\n";}
public static function AddRawMeta($contnt){self::AddHead("<meta ".$contnt.">");}
public static function AddMeta($name,$contnt){self::AddRawMeta("name='".$name."' content='".$contnt."'");}
public static function AddScript($dataAdd){self::AddHead("<script src='".URLPos::getURLDirRoot().$dataAdd."'></script>");}
public static function AddStyle($dataAdd){self::AddHead("<link href='".URLPos::getURLDirRoot().$dataAdd."' rel='stylesheet' type='text/css'>");}

//Função final para exibir conteúdo
public static function makeview(){
self::AddRawMeta('charset="utf-8"');
self::AddRawMeta('http-equiv="X-UA-Compatible" content="IE=edge"');

self::AddMeta('viewport','width=device-width, initial-scale=1, maximum-scale=1');
self::AddMeta('description',CAPISPHP_Structure::$descricao);
self::AddMeta('author',CAPISPHP_Structure::$autor);
self::AddMeta('keywords',CAPISPHP_Structure::$keywrds);
self::AddMeta('theme-color',CAPISPHP_Structure::$corTema);
self::AddMeta('language',CAPISPHP_Structure::$METAPROP_Language);
self::AddMeta('COPYRIGHT',CAPISPHP_Structure::$COPYRIGHT);

self::AddMeta('RATING','GENERAL');
self::AddMeta('DISTRIBUTION','GLOBAL');
self::AddMeta('RESOURCE-TYPE','DOCUMENT');
self::AddMeta('Robots','INDEX,FOLLOW');

self::AddRawMeta('property="og:locale" content="'.CAPISPHP_Structure::$METAPROP_Locale.'"');
self::AddRawMeta('property="og:description" content="'.PageStruct::$descricao.'"');
self::AddRawMeta('property="og:site_name" content="'.CAPISPHP_Structure::$METAPROP_SiteName.'"');
self::AddRawMeta('property="og:image" itemprop="image" content="'.CAPISPHP_Structure::host_link().CAPISPHP_Structure::$METAPROP_IMG.'"');
self::AddRawMeta('property="og:url" content="'.CAPISPHP_Structure::endereco_link().'"');
self::AddRawMeta('property="og:type" content="article"');
self::AddRawMeta('property="og:title" content="'.CAPISPHP_Structure::$titulo.' - '.CAPISPHP_Structure::$METAPROP_SiteName.'"');

self::AddHead('<title>'.CAPISPHP_Structure::$titulo.' - '.CAPISPHP_Structure::$METAPROP_SiteName.'</title>');
//self::AddHead('');

echo('<!DOCTYPE html>
<html lang="'.CAPISPHP_Structure::$HTML_lang.'">
<head>
    '.self::$headStrct.'
    <link href="'.URLPos::getURLDirRoot().'css/clean-blog.min.css" rel="stylesheet">
    <link href="'.URLPos::getURLDirRoot().'vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <script src="'.URLPos::getURLDirRoot().'vendor/jquery/jquery.min.js"></script>
    <script src="'.URLPos::getURLDirRoot().'vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="'.URLPos::getURLDirRoot().'js/jqBootstrapValidation.js"></script>
    <script src="'.URLPos::getURLDirRoot().'js/contact_me.js"></script>
    <script src="'.URLPos::getURLDirRoot().'js/clean-blog.min.js"></script>

</head>
<body>'.self::$conteudo.'</body>
	</html>');
}
}
MainView::makeview();

?>
