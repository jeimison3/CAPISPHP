<?php
//Exemplo básico de implementação do CAPISPHP
include('CAPISPHP.php');
//Reconhece URL atual e navega diretamente.
PageControl::navegar_para(URLPos::getURLObjects());

?>
