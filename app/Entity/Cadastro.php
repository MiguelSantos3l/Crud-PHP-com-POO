<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Cadastro {
	// Identificador de usuario
	public $id;

	public $nome;

	public $email;

	public $cpf;
	

	// Método responsável por cadastrar um novo usuario
	public function cadastrar(){

		// Criar uma instância da classe Database
		$obDatabase = new Database('usuarios');

		// Inserir os dados da vaga no banco de dados
		$this->id = $obDatabase->insert([
			'nome' => $this->nome,
			'email' => $this->email,
			'cpf' => $this->cpf,

		]);

		return true;
	}

	//Consulta usuários cadastrados
	public static function getUsers($where = null, $order = null, $limit = null){
		// Usar a classe Database para consultar as vagas no banco de dados
		return (new Database('usuarios'))->select($where, $order, $limit)
									  ->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	// Consultar usuário pelo ID
	public static function getUser($id){
		// Usar a classe Database para consultar uma vaga específica por ID
		return (new Database('usuarios'))->select('id = '.$id)
									  ->fetchObject(self::class);
	}

	// Atualizar um usuario
	public function atualizar(){
		// Usar a classe Database para atualizar os dados do usuario no banco de dados
		return (new Database('usuarios'))->update('id = '.$this->id, [
			'nome' => $this->nome,
			'email' => $this->email,
			'cpf' => $this->cpf,
		]);
	}

	// Excluir umusuario
	public function excluir(){
		// Usar a classe Database para excluir uma vaga do banco de dados
		return (new Database('usuarios'))->delete('id = '.$this->id);
	}


	
}

?>
