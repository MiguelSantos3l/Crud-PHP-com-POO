<?php 
    // Inclui o arquivo de carregamento automático de classes
    require __DIR__.'/vendor/autoload.php';

    // Define uma constante para o título da página
    define('TITLE', 'CADASTRAR NOVO USUÁRIO');

    // Usa a classe Cadastro do namespace App\Entity
    use \App\Entity\Cadastro;

    // Verifica se os campos do formulário foram enviados via POST
    if(isset($_POST['nome'],$_POST['email'],$_POST['cpf'])){
        // Cria uma nova instância da classe Cadastro
        $obCadastro = New Cadastro;

        // Define os atributos da Cadastro com os valores enviados via POST
        $obCadastro->nome = $_POST['nome'];
        $obCadastro->email = $_POST['email'];
        $obCadastro->cpf = $_POST['cpf'];

        // Chama o método "cadastrar" para inserir a Cadastro no banco de dados
        $obCadastro->cadastrar();

        // Redireciona de volta para a página principal com um status de sucesso
        header('location: index.php?status=success');
        exit;
    }

    // Inclui os arquivos de cabeçalho, formulário e rodapé
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/adduser.php';
    include __DIR__.'/includes/footer.php';
?>
