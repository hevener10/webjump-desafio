<?php
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../entity/Category.php';
require __DIR__.'/../entity/Products.php';

use App\Entity\Category;
use App\Entity\Product;
use \APP\Entity\ProductsCategory;
switch (PAGINA) {
    case 'addProduct':
        add();
        break;
    case 'editProduct':
        edit();
        break;
    case 'deleteProduct':
        delete();
        break;
    default:
            listCategories();
        break;
}


function add(){
    $categories = new Category();
    $categories=  $categories->getAll();

    $product = new Product();

    
    if(!empty($_POST['sku']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantity'])){
        $product->sku = $_POST['sku'];
        $product->name = $_POST['name'];
        $product->price = str_replace(array('.',','),array('','.'),$_POST['price']);
        $product->quantity = $_POST['quantity'];
        $product->description = $_POST['description'];
        $product->category = $_POST['category'];
        
        $product->save();
        
        header('Location: products.php?status=success');
        
        exit;
    }

    $productCategories = array();
    include (__DIR__.'/../view/products/'.'products.php');
}
function listCategories(){
    $products = new Product;
    $products = $products->getAll();

    include (__DIR__.'/../view/products/'.'lista.php');
}

function edit(){
    $categories = new Category();
    $categories=  $categories->getAll();

    $product = new Product();
    $product = $product->getProduct($_GET['id']);
    
    if(!empty($_POST['sku']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantity'])){
        $product->sku = $_POST['sku'];
        $product->name = $_POST['name'];
        $product->price = str_replace(array('.',','),array('','.'),$_POST['price']);
        $product->quantity = $_POST['quantity'];
        $product->description = $_POST['description'];
        $product->category = $_POST['category'];
        $product->atualiza();
        
        header('Location: editProduct.php?id='.$_GET['id'].'&status=success');
        
        exit;
    }

    $productCategories = new ProductsCategory();
    $productCategories = $productCategories->getByProduct($product->id_products);
    include (__DIR__.'/../view/products/'.'Products.php');
}

function delete(){
    $category = new Category();
        //Validação do ID
        if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
            header('Location: products.php?status=error');
            exit;
        }

        //Consulta Vaga
        $product = Product::getProduct($_GET['id']);

        //echo "<pre>"; print_r($obVaga); echo "<pre>"; exit;
        //VALIDA SE VAGA EXISTE
        if(!$product instanceof Product){
            header('Location: index.php?status=error');
            exit;
        }


        
        if(isset($_POST['excluir'])){
            
            $product->delete($_GET['id']);
            
            header('Location: products.php?status=success');
            exit;
        }


        include (__DIR__.'/../view/products/'.'confirmdeleteproduct.php');
}