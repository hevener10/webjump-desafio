<?php
namespace App\Entity;

use \APP\Database\Database;
use \APP\Entity\ProductsCategory;
use \APP\Entity\Category;
use \PDO;
class Product{
    /**
     * Identificador unico do produto
     * @var int
     */
    public $id_products;

    /**
     * Nome do produto
     * @var string
     */
    public $name;

    /**
     * Descrição do produto
     * @var string
     */
    public $description;

    /**
     * Codigo de barras
     * @var string
     */
    public $sku;

    /**
     * PReço do produto
     * @var string
     */
    public $price;

    /**
     * Quantidade do produto
     * @var string
     */
    public $quantity;

    /**
     * Categoria do produto
     * @var string
     */
    public $category=array();

    

    
    /**
     * Guarda os dados da produto no banco de dados
     * @param array $data
     */
    
    public function save(){
        //instancia classe de coneção com o banco de dados na tabela categories
        $obDatabase = new Database('products');
        
        //insere no banco os dados e retorna o ID para a classe atual
        
        $this->id_products = $obDatabase->insert([
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description
        ]);

        $productsCategory = new ProductsCategory();
        $productsCategory->id_product = $this->id_products;
        $productsCategory->id_categories = $this->category;
        
        $productsCategory ->save();
        return true;
    }

    /**
     * Retorna todas as categorias
     * @return array
     */
    public static function getAll(){
        $productCategories = new ProductsCategory();
        $categoryProduct = new Category();

        $products = (new Database('products'))->select('', 'name asc', '')->fetchAll(\PDO::FETCH_CLASS,self::class);
        foreach($products as $product){
            
            $id_category = $productCategories->getByProduct($product->id_products);
            $names_category=array();
            foreach($id_category as $category){
                $names_category[] = $categoryProduct->getNameOfCategory($category);
            }

            $product->category=$names_category;
            
        }
        

        return $products;

    }

    public static function getProduct($id){
        
        return (new Database('products'))->select('id_products ='. $id)->fetchObject(self::class);
    }

    public function atualiza(){
        $obDatabase = new Database('products');
        $obDatabase->update('id_products = '.$this->id_products,[
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description
        ]);
        
        $productsCategory = new ProductsCategory();
        $productsCategory->id_product = $this->id_products;
        $productsCategory->id_categories = $this->category;
        $productsCategory ->save();
    }

    public function delete($id){
        return (new Database('products'))->delete('id_products ='. $id);
    }

}