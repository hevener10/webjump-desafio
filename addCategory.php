<?php 
require __DIR__.'/vendor/autoload.php';

const PAGINA="addcategory";
const TITLE="New Category";

include __DIR__.'/app/view/layout/'.'header.php';
include __DIR__.'/app/controller/'.'categories.php';
include __DIR__.'/app/view/layout/'.'footer.php';
?>