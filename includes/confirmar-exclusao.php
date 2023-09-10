<main class="text-center">

    <section>

    
    </section>

    <h2 class="mt-3">Excluir Usuário</h2>

    <form method="POST">

        <div class="form-group">
           <p>Você deseja realmente excluir este usuário <strong><?= $obCadastro->nome ?> ?</strong></p>
        </div>

    <div class="form-group">
        <a href="index.php">
            <button type="button" class="btn btn-success">Cancelar</button>
        </a>


      <button type="submit" name="excluir" class="btn btn-danger">Enviar</button>
    </div>


    </form>


</main>