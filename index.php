<?php
// Inclui o arquivo de carregamento automático de classes
require __DIR__.'/vendor/autoload.php';

// Usa a classe Vaga do namespace App\Entity
use \App\Entity\Cadastro;

// Obtém todas as vagas do banco de dados
$usuario = Cadastro::getUsers();

// Inclui os arquivos de cabeçalho, listagem de vagas e rodapé para renderizar a página completa
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/lista.php';
include __DIR__.'/includes/footer.php';
?>
