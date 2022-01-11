<?php 
require __DIR__.'/vendor/autoload.php';

const PAGINA="editProduct";
const TITLE="Edit Product";


include __DIR__.'/app/view/layout/'.'header.php';
include __DIR__.'/app/controller/'.'products.php';
include __DIR__.'/app/view/layout/'.'footer.php';
?>