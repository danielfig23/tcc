# tccdaniel

Para executar o site, basta recriar o site utilizando o sql "comdata.sql" que se encontra na pasta "sql". A base deve ter o nome de mapstrack ou deve ser mudado para a desejada em "/common/conexao.php". Uma vez que a base for recriada e a conexão for feita, já é possível se conectar com a conta de administrador utilizando email: "adm@gmail.com" e a senha "admin".

A tabela "cidade" e a tabela "estado" já estão populadas. As imagens dos shoppings e das boxes podem ser encontradas na pasta /images.

A pasta uploads é responsável por receber todos os arquivos que foram cadastrados em cadastros, no entanto, como as imagens das box fornecidas nas pastas /images/ShoppingChapeo são maiores do que 2MB (padrão do PHP) é necessário alterar o php.ini e reiniciar o servidor para que seja possível carregar estas fotos.
