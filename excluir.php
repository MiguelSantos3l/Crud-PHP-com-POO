<?php 
    // Inclui o arquivo de carregamento automático de classes
    require __DIR__.'/vendor/autoload.php';

    // Usa a classe Cadastro do namespace App\Entity
    use \App\Entity\Cadastro;

    // Valida se existe um parâmetro 'id' na URL e se é um número válido
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        // Redireciona para a página principal com um status de erro se o 'id' não for válido
        header("location: index.php?status=error");
        exit;
    }

    // Consulta a Cadastro com o 'id' fornecido
    $obCadastro = Cadastro::getUser($_GET['id']);

    // Valida se a consulta retornou um objeto Cadastro válido
    if(!$obCadastro instanceof Cadastro){
        // Redireciona para a página principal com um status de erro se a Cadastro não for encontrada
        header('location: index.php?status=error');
        exit;
    }

    // Verifica se o formulário de confirmação de exclusão foi enviado
    if(isset($_POST['excluir'])){
        // Chama o método "excluir" para excluir a Cadastro do banco de dados
        $obCadastro->excluir();
        
        // Redireciona de volta para a página principal com um status de sucesso após a exclusão
        header ('location: index.php?status=success');
        exit;
    }

    // Inclui os arquivos de cabeçalho, formulário de confirmação de exclusão e rodapé para renderizar a página completa
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/confirmar-exclusao.php'; 
    include __DIR__.'/includes/footer.php';
?>
