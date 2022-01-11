<?php

namespace APP\Database;


use \PDO;
use \PDOException;
use \App\Config\DatabaseConfiguracao;


class Database{
    /**
     * Host da conexão do banco
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Usuário da conexão do banco
     * @var string
     */
    const USER = '';

    /**
     * Senha da conexão do banco
     * @var string
     */
    const PASS = "";

    /**
     * Nome do banco de dados
     * @var string
     */
    const DBNAME = 'webjump';
    

    
    /**
     * Instancia do PDO
     * @var \PDO
     */
    private $pdo;

    /**
     * nome da tabela a ser manipulada
     * @var \APP\Db\Database
     */
    private $table;

    /**
     * Instancia do PDO
     * @var \PDO
     */
    private $connection;

    /**
     * Define a tablea e instancia de conexao
     * @var \PDO
     */
    public function __construct($table= null){
        

        $this->table = $table;
        $this->setConnection();
   }

   /**
    * Define a conexão com o banco de dados
    */
   public function setConnection(){
        
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
            
        }

   }

    /**metodo responsavel por executar queris dentro do banco de dados
    *@param string $query	
    *@param array $params
    *@return PDOStantement
    */
   public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
   }
   public function insert($values){
       
    //DADOS DA QUERY    
    $fields = array_keys($values);
    $binds = array_pad([],count($fields),'?');

    //MONTA QUERY
    $query='INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
    
    //EXECUTA O INSERT
    $this->execute($query,array_values($values));

    return $this->connection->lastInsertId();
       
    
   }

   /**
    * Metodo responsavel por executar uma consulta no banco
    * @param string $where
    * @param array $order
    * @param array $limit
    * @param array $fields
    * @return PDOSstatement
    */
    public function select($where = null, $order= null,$limit=null,$fields = '*'){
        //DADOS DA QUERY
         $where = ($where) ? ' WHERE '.$where : '';
         $order = ($order) ? ' ORDER BY '.$order : '';
         $limit = ($limit) ? ' LIMIT '.$limit : '';
 
         //MONTA QUERY
         $query='SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
         
         
 
         return $this->execute($query);
    }

     /**
    * Metodo responsavel por atualizar dados no banco
    * @param string $where
    * @param array $data [field => value]
    * @return boolen
    */
    public function update($where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);
        

        //MONTA QUERY
        $query = 'update '.$this->table.' set '.implode('=?, ',$fields).'=? where '.$where;

        //EXECUTA O UPDATE
        $this->execute($query,array_values($values));
        
        return true;
    }
    public function delete($where){
        //DADOS DA QUERY
         $query = 'delete from '.$this->table.' where '.$where;
   
         //EXECUTA O DELETE
         $this->execute($query);
         //echo "<pre>"; print_r($query); echo "<pre>"; exit;
         return true;
   }



}