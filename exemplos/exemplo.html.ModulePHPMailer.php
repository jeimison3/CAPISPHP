<html>
<body>
<form method="post" enctype="multipart/form-data" action="<?php echo URLPos::getURLDirRoot(); ?>index.php/php_mailsend">
<input type="text" name="name" placeholder="Seu nome (opcional)"><br/>
<input type="email" name="email" placeholder="email@provider.com"><br/>
<input type="submit" value="Enviar">
</form>
</body>
</html>
