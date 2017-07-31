# CAPISPHP
### Tenha uma pequena e poderosa livraria de comandos para desenvolver seu site usando:
- Links simplificados. (www.exemplo.com/post/how-to... ou www.exemplo.com/index.php/post/how-to...)
- CURL com mais configurações e menos linhas.
- **Suporte** padrão (e não obrigatório) a Bootstrap.
- Configuração automática de meta tags para **incorporação de links** em redes sociais. (Facebook, Whatsapp, LinkedIn, etc.)



## Configurando novas páginas:
No arquivo `mod_PageControl.php` deve existir a seguinte estrutura:
```php
private static $indexes=array(
'inicio.php'=>'inicio');

private static $DEFAULT='inicio';

private static $ERRORS=array(
404 => 'err404.php');
```
Nessa configuração, quando acessado `/index.php/inicio` ou `/index.php` (e até `/`), o arquivo anteriormente referido será incluído.



## Funções de cada arquivo:
| Arquivo | Função |
| --- | --- |
| `mod_PageControl.php` | Configuração de redirecionamentos e páginas de erro. |
| `inicio.php` | Dependendo da configuração do arquivo acima, este deve conter a página inicial. |
| `err404.php` | Página de erro 404 personalizada. |


# Estrutura básica de uma View:
O arquivo em questão é o `inicio.php`.
```php
<?php
class WebView{
  public static function html(){
    return "<form>
    Email: <input type='email' name='email' placeholder='exemplo@provedor.com'>
    <input type='submit' value='Enviar'>
    </form>";
  }
}
?>
```


### Se preferir, modifique o título da página atual
A modificação pode ser feita simplesmente incluindo `CAPISPHP_Structure::setTitl("Título");` antes do `return` (da estrutura acima).



#### Outras funções são:
| Função | Utilidade |
| --- | --- |
| `CAPISPHP_Structure::setTitl("");` | Alterar título da página atual. |
| `CAPISPHP_Structure::setKeywords("");` | Alterar Keywords (chaves de busca) da página. |
| `CAPISPHP_Structure::setDescr("");` | Alterar descrição da página. Visível na incorporação de link em redes sociais. |





# Alterando dados estáticos do site
No arquivo `CAPISPHP.php`, dentro da classe `CAPISPHP_Structure` existem as seguintes linhas:
```php
//Dados padrão:
public static $METAPROP_SiteName="Site Exemplo";
public static $autor="Nome Autor";
public static $HTML_lang="pt";
public static $COPYRIGHT="GNU GENERAL PUBLIC LICENSE v3";
public static $descricao="Ferramenta de exemplo sem fins lucrativos e diversas funcionalidades";
public static $titulo="Início";
public static $corTema="#ffffff";
public static $keywrds="";
```
## Estes dados devem ser modificados.
