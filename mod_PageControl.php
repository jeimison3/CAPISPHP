<?php
class PageControl{
private static $indexes=array(
'inicio.php'=>'',
'inicio.php'=>'inicio');

private static $ERRORS=array(
404 => 'erro404.php');

public static function navegar_para($navEnter){
  if(!isset($navEnter[1])) $navEnter[1]='inicio';
  elseif(strlen($navEnter[1])==0) $navEnter[1]='inicio';

  $key_found=array_search($navEnter[1],self::$indexes);
  if($key_found) include_once($key_found);
  else include_once(self::$ERRORS[404]);
}
}
?>
