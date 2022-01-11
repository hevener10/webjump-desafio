<?php
namespace App\Entity;

use \APP\Database\Database;
use \PDO;
class Category{
    /**
     * Identificador unico da categoria
     * @var int
     */
    public $id_category;

    /**
     * Nome da categoria
     * @var string
     */
    public $category_name;

    /**
     * Nome da categoria
     * @var string
     */
    public $category_code;


    /**
     * Guarda os dados da categoria no banco de dados
     * @param array $data
     */
    
    public function save(){
        //instancia classe de coneção com o banco de dados na tabela categories
        $obDatabase = new Database('categories');
        
        //insere no banco os dados e retorna o ID para a classe atual
        
        $this->id_categories = $obDatabase->insert([
            'category_name' => $this->category_name,
            'category_code' => $this->category_code
        ]);
        return true;
    }

    /**
     * Retorna todas as categorias
     * @return array
     */
    public static function getAll(){
        
        return (new Database('categories'))->select('', 'category_name asc', '')->fetchAll(\PDO::FETCH_CLASS,self::class);
    }

    /**
     * Retorna uma catergoria pelo ID
     * @return array
     */
    public static function getCategory($id){
        
        return (new Database('categories'))->select('id_category ='. $id)->fetchObject(self::class);
    }

    /**
     * Retorna o nome da categoria pelo ID
     * @return string
     */
    public static function getNameOfCategory($id){
        return (new Database('categories'))->select('id_category ='. $id,'','','category_name')->fetch(PDO::FETCH_COLUMN);
    }

    public function atualiza(){
        $obDatabase = new Database('categories');
        $obDatabase->update('id_category = '.$this->id_category,[
            'category_name' => $this->category_name,
            'category_code' => $this->category_code
        ]);
    }

    public function delete($id){
        return (new Database('categories'))->delete('id_category ='. $id);
    }
}