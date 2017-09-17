# CAPISPHP
### Tenha uma pequena e poderosa livraria de comandos para desenvolver seu site usando:
- Links **simplificados**. (www.exemplo.com/post/how-to... ou www.exemplo.com/index.php/post/how-to...)
- Suporte padrão (e não obrigatório) à **Bootstrap**.
- Módulo para livraria **PHPMailer v5.2** (last stable)
- **Módulo Uploader** para reduzir configurações e melhorar na depuração de erros
- **CURL** com mais configurações e menos linhas (em progresso)
- Configuração automática de meta tags para **incorporação de links** em redes sociais. (Facebook, Whatsapp, LinkedIn, etc.)
### A ajuda de outros módulos está contida nos seus exemplos.

## Configurando novas páginas:
No arquivo `mod_PageControl.php` deve existir a seguinte estrutura:
```php
private static $indexes=array(
'inicio.php'=>'inicio');

private static $DEFAULT='inicio';

private static $ERRORS=array(
404 => 'err404.php');
```
Nessa configuração, quando acessado `/index.php/inicio`, o arquivo referenciado será acessado. Se `/index.php` ou `/` for acessado, será redirecionado para o `$DEFAULT`.


## Funções dos módulos:
| Módulo] | Função |
| --- | --- |
| `mod_BDCon.php` | Funções diversas para acesso a banco de dados. Configurações presentes no arquivo. |
| `mod_Bootstrap.php` | Scripts e configurações básicas de carregamento do Bootstrap. |
| `mod_FileUploads.php` | Módulo auxiliar para upload de arquivos. |
| `mod_PageControl.php` | Configuração de redirecionamentos e páginas de erro. |
| `mod_PHPMailer.php` | Módulo interpretador de funções da livraria PHPMailer. |


## Funções de arquivos diversos:
| Arquivo | Função |
| --- | --- |
| `inicio.php` | Por padrão, no arquivo `mod_PageControl.php`, deve conter a página inicial. |
| `err404.php` | Página de Erro 404 personalizada. |


# Alterando dados estáticos do site (presentes nos cabeçalhos)
## Estes dados devem ser modificados.
No arquivo `CAPISPHP.php`, dentro da classe `CAPISPHP_Structure` existem as seguintes linhas:
```php
//Dados padrão:
public static $METAPROP_SiteName="Site Exemplo";
public static $autor="Nome do Autor";
public static $HTML_lang="pt";
public static $COPYRIGHT="GNU GENERAL PUBLIC LICENSE v3";
public static $descricao="Ferramenta de exemplo sem fins lucrativos e diversas funcionalidades";
public static $titulo="Início";
public static $corTema="#ffffff";
public static $keywrds="site,inicio,exemplo";
```


# Estrutura básica de uma View:
O arquivo em questão é o `inicio.php`.
```php
<?php $mvw = new MainView();
CAPISPHP_Structure::setTitl("View Exemplo");
?>
<html>
  <head>
<?php echo $mvw->head(); ?>
  </head>
  <body>
  </body>
</html>
```


### Se preferir, modifique o título da página atual
A modificação pode ser feita simplesmente incluindo `CAPISPHP_Structure::setTitl("Título");`.



#### Outras funções são:
| Função | Utilidade |
| --- | --- |
| `CAPISPHP_Structure::setTitl("");` | Alterar título da página atual. |
| `CAPISPHP_Structure::setKeywords("");` | Alterar Keywords (chaves de busca) da página. |
| `CAPISPHP_Structure::setDescr("");` | Alterar descrição da página. Visível na incorporação de link em redes sociais. |
