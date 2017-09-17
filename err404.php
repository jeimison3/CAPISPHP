<?php
header("HTTP/1.0 404 Not Found");
$mvw = new MainView();
CAPISPHP_Structure::setTitl("Erro 404");
echo("<html>
<head>
".$mvw->head()."
</head><body>
<center><h2>Ops... A página que tentou acessar não existe :/</h2></center>
</body></html>");
echo "";
?>
