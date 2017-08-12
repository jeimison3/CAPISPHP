<?php
class DBCon{
public static $DB=array('db' => 'sistema',
'user' => 'root',
'pass' => '',
'addr' => 'localhost',
'encoding' => 'utf8',
'timezone' => 'America/Fortaleza');

public static function getDB(){
  $con = new mysqli(self::$DB['addr'],self::$DB['user'],self::$DB['pass'],self::$DB['db']);
  $con->set_charset(self::$DB['encoding']);
  date_default_timezone_set(self::$DB['timezone']);
  if (mysqli_connect_errno()){
      printf("Conexao falhou: %s\n", mysqli_connect_error());
      exit();
  }
  return $con;
}
public static function dbQuery($sql){
  return self::getDB()->query($sql);
}
}
?>
