<?php
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../entity/Category.php';
use App\Entity\Category;

switch (PAGINA) {
    case 'addcategory':
        
        add();
        break;
    case 'editcategory':
        update();
        break;

    case 'deletecategory':
        delete();
        break;
    default:
        listCategories();
        break;
}

function add(){
    $category = new Category();
    if(isset($_POST['category-name'],$_POST['category-code'])){
        $category->category_name = $_POST['category-name'];
        $category->category_code = $_POST['category-code'];
        $category->save();
        
        header('Location: categories.php?status=success');
        exit;
    }


    include (__DIR__.'/../view/category/'.'category.php');
    
}
function update(){
    $category = new Category();
    //Validação do ID
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('Location: categories.php?status=error');
        exit;
    }

    //Consulta Vaga
    $category = Category::getCategory($_GET['id']);

    //echo "<pre>"; print_r($obVaga); echo "<pre>"; exit;
    //VALIDA SE VAGA EXISTE
    if(!$category instanceof Category){
        header('Location: index.php?status=error');
        exit;
    }


    
    if(isset($_POST['category-name'],$_POST['category-code'])){
        $category->category_name = $_POST['category-name'];
        $category->category_code = $_POST['category-code'];
        $category->atualiza();
        
        header('Location: categories.php?status=success');
        exit;
    }


    include (__DIR__.'/../view/category/'.'category.php');
}
function delete(){
    $category = new Category();
        //Validação do ID
        if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
            header('Location: categories.php?status=error');
            exit;
        }

        //Consulta Vaga
        $category = Category::getCategory($_GET['id']);

        //echo "<pre>"; print_r($obVaga); echo "<pre>"; exit;
        //VALIDA SE VAGA EXISTE
        if(!$category instanceof Category){
            header('Location: index.php?status=error');
            exit;
        }


        
        if(isset($_POST['excluir'])){
            
            $category->delete($_GET['id']);
            
            header('Location: categories.php?status=success');
            exit;
        }


        include (__DIR__.'/../view/category/'.'confirmdeletecategory.php');
}
function listCategories(){
    $categories = new Category;
        $categories = $categories->getAll();
        include (__DIR__.'/../view/category/'.'lista.php');
}
