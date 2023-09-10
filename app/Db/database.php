<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database{

  // Host de conexão com o banco de dados
  const HOST = 'localhost';

  // Nome do banco de dados
  const NAME = 'cadastro';

  // Usuário do banco
  const USER = 'root';

  // Senha de acesso ao banco de dados
  const PASS = '';

  // Nome da tabela a ser manipulada
  private $table;

  // Instância de conexão com o banco de dados
  private $connection;

  // Define a tabela e instancia a conexão
  public function __construct($table = null){
    $this->table = $table;
    $this->setConnection();
  }

  // Método responsável por criar uma conexão com o banco de dados
  private function setConnection(){
    try{
      $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }


 // Responsável por inserir dados no banco no formato: campo => valor
  public function insert($values){
    // Dados da query, transforma os campos e valores em dinâmicos
    $fields = array_keys($values);
    // A função informa que precisa de tantas posições, se não tiver será criada
    $binds = array_pad([], count($fields), '?');

    // Monta a query
    $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

    // Executa o insert
    $this->execute($query, array_values($values));

    // Retorna o ID
    return $this->connection->lastInsertId();
  }


  // Método que executa as queries no banco de dados
  public function execute($query, $params = []){
    try{
      $statement = $this->connection->prepare($query);
      $statement->execute($params);
      return $statement;
    }catch(PDOException $e){
      die('ERROR: '.$e->getMessage());
    }
  }


    // Método que realiza consulta no banco de dados
  public function select($where = null, $order = null, $limit = null, $fields = '*'){
    // Dados da query
    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER BY '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    // Monta a query
    $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    return $this->execute($query);

  }

    // Parâmetro que executa atualização
  public function update($where, $values){
    // DADOS DA QUERY
    $fields = array_keys($values);

    // MONTA A QUERY
    $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    // EXECUTA A QUERY
    $this->execute($query, array_values($values));
    return true;
  }

    //função que deleta usuários
    public function delete($where){
    // Monta query
    $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

    // Executa query
    $this->execute($query);
    return true;
  }
}

?>
