<?php
// Inclui o arquivo de carregamento automático de classes
require __DIR__.'/vendor/autoload.php';

define('TITLE', 'EDITAR USUÁRIO');
// Usa a classe Cadastro do namespace App\Entity
use \App\Entity\Cadastro;

    // Valida se existe um parâmetro 'id' na URL e se é um número válido
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        // Redireciona para a página principal com um status de erro se o 'id' não for válido
        header("location: index.php?status=error");
        exit;
    }


// Obtém todas os usuários do banco de dados
    $obCadastro = Cadastro::getUser($_GET['id']);

    // Valida se a consulta retornou um objeto usuario válido
    if(!$obCadastro instanceof Cadastro){
        // Redireciona para a página principal com um status de erro se o usuário não for encontrada
        header('location: index.php?status=error');
        exit;
    }

        // Verifica se os campos do formulário ('titulo', 'descricao', 'ativo') foram enviados via POST
    if(isset($_POST['nome'],$_POST['email'],$_POST['cpf'])){
        // Atualiza os atributos do usuario com os valores enviados via POST
        $obCadastro->nome = $_POST['nome'];
        $obCadastro->email = $_POST['email'];
        $obCadastro->cpf = $_POST['cpf'];

        // Chama o método "atualizar" para atualizar os dados do usuario no banco de dados
        $obCadastro->atualizar();
        
        // Redireciona de volta para a página principal com um status de sucesso após a atualização
        header ('location: index.php?status=success');
        exit;
    }



// Inclui os arquivos de cabeçalho, listagem de usuarios e rodapé para renderizar a página completa
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/adduser.php';
include __DIR__.'/includes/footer.php';
?>
