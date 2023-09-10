<?php 
 ?>

<main class="text-center">

    <section>
        <a href="index.php">
            <button class="btn btn-warning">Voltar</button>
        </a>
    
    </section>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="POST">

        <div class="form-group">
            <label>Nome Completo</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome" value="<?= !empty($obCadastro->nome) ? $obCadastro->nome : '' ?>">

        </div>

        <div class="form-group">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail" value="<?= !empty($obCadastro->email) ? $obCadastro->email : '' ?>">

        </div>
 

    <div class="form-group">
      <label>CPF</label>
      <input type="text" class="form-control" name="cpf" id="cpf" placeholder="Digite seu CPF" maxlength="13" oninput="formatarCPF(this)" value="<?= !empty($obCadastro->cpf) ? $obCadastro->cpf : '' ?>">

    </div>


    <div class="form-group">
      <button type="submit" style="width: 200px;height: 60px;" class="btn btn-success mt-3">Enviar</button>
    </div>



    </form>

<script>
function formatarCPF(campo) {
    campo.value = campo.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
    campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
    campo.value = campo.value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
    campo.value = campo.value.replace(/(\d{3})(\d{2})$/, '$1-$2'); // Adiciona o traço
}
</script>




</main>


