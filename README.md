# CAPISPHP
### Tenha uma pequena e poderosa livraria de comandos para desenvolver seu site usando:
- Links simplificados. (www.exemplo.com/post/how-to... ou www.exemplo.com/index.php/post/how-to...)
- CURL com mais configurações e menos linhas.
- Suporte *padrão* (e não obrigatório) a Bootstrap.
- Configuração automática de meta tags para **incorporação de links** em redes sociais. (Facebook, Whatsapp, LinkedIn, etc.)

## Configurando novas páginas:
No arquivo `mod_PageControl.php` deve existir a seguinte estrutura:
```php
private static $indexes=array(
'inicio.php'=>'inicio');
private static $DEFAULT='inicio';

private static $ERRORS=array(
404 => 'erro404.php');
```
Nessa configuração, quando acessado `/index.php/inicio` ou `/index.php` (e até `/`), o arquivo anteriormente referido será incluído.

## Funções de cada arquivo:
| Arquivo | Função |
| --- | --- |
| `mod_PageControl.php` | Configuração de redirecionamentos e páginas de erro. |
| `inicio.php` | Dependendo da configuração do arquivo acima, este deve conter a página inicial. |

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
