<?php
namespace App\Entity;

use \APP\Database\Database;
use \PDO;
class ProductsCategory{
    /**
     * Identificador unico do produto
     * @var int
     */
    public $id_products_categories;

    /**
     * id do produto
     * @var int
     */
    public $id_product;

    /**
     * Categorias do produto
     * @var array
     */
    public $id_categories;

    
    /**
     * Guarda os dados da produto no banco de dados
     * @param array $data
     */
    
    public function save(){
        //instancia classe de coneção com o banco de dados na tabela categories
        $obDatabase = new Database('products_categories');
        $this->deleteAllByProduct($this->id_product);
        //insere no banco os dados e retorna o ID para a classe atual
        
        foreach ($this->id_categories as $id_category) {
            
            $obDatabase->insert(array(
                'id_products' => $this->id_product,
                'id_categories' => $id_category
            ));
        }
        
        return true;
    }

    /**
     * Retorna todas as categorias
     * @return array
     */
    public static function getAll(){
        
        return (new Database('products_categories'))->select('', 'products_name asc', '')->fetchAll(\PDO::FETCH_CLASS,self::class);
    }

    public static function getByProduct($id){
        return (new Database('products_categories'))->select('id_products ='. $id,'','','id_categories')->fetchAll(PDO::FETCH_COLUMN);
    }

    public function deleteAllByProduct($id){
        return (new Database('products_categories'))->delete('id_products ='. $id);
    }

}