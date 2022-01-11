<?php
require __DIR__.'/../entity/Products.php';

use \App\Entity\Product;


$products = new Product();
$products = $products->getAll();
include __DIR__.'/../view/layout/'.'main.php';