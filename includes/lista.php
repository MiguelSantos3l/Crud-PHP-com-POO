<?php 
  
  $mensagem = '';
    
    if(isset($_GET['status'])){
    switch ($_GET['status']) {
      case 'success':
        $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
        break;

      case 'error':
        $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
        break;
    }
  }


  $resultados = '';


   foreach($usuario as $usuario){
    $resultados .= '<tr>
                      <td>'.$usuario->id.'</td>
                      <td>'.$usuario->nome.'</td>
                      <td>'.$usuario->email.'</td>
                      <td>'.$usuario->cpf.'</td>
                      <td>
                        <a href="editar.php?id='.$usuario->id.'">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="excluir.php?id='.$usuario->id.'">
                          <button type="button" class="btn btn-danger">Excluir</button>
                        </a>

                      </td>
                    </tr>';
  }

 


  $resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum usuário encontrado !
                                                       </td>
                                                    </tr>';

?>



<main>
	<?= $mensagem ?>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Cadastrar usuário</button>
        </a>
    	
    </section>

    <section>
    	
    	<table class="table bg-light mt-3">
    		
    		<thead>
    			<tr>
    				<th>ID</th>
    				<th>Nome</th>
    				<th>Email</th>
            <th>CPF</th>

    			</tr>
    		</thead>

    		<tbody>
    			<?=$resultados?>
    		</tbody>

    	</table>

    </section>



</main>