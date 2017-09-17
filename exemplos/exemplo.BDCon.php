<?php
if(isset($_POST["nome"])){

  //Retorna Query do banco pré-configurado no próprio 'mod_BDCon.php'
  $result_query=DBCon::dbQuery("SELECT * FROM paginas WHERE link like '%".$_POST["nome"]."%';");

  //Utilize DBCon::getDB() para funções além de 'Query'.

  if($result_query->num_rows>0){
  while($resultado = $result_query->fetch_array(MYSQLI_BOTH)){
    echo("<p>Domínio principal: ".$resultado["domain"]."</p>".
         "<p>Link: ".$resultado["link"]."</p>".
         "<p>Nome do site: ".$resultado["sitename"]."</p>".
         "<p>IPv4: ".$resultado["ipaddr"]."</p>");
}

}else{echo('Não foram encontrados resultados.');}
}else{echo('Nenhum valor foi recebido.');}
?>
