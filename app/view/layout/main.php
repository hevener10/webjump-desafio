<?php
$results="";

foreach($products as $product){
  $img=isset($product->image) ? $product->image : 'no-image.png';
  $price=number_format($product->price,2,",",".");
  $results.='<li>
  <div class="product-image">
    <a href="editProduct.php?id='.$product->id_products.'" title="'.$product->name.'">
      <img src="assets/images/'.$img.'" layout="responsive" width="164" height="145" alt="'.$product->name.'" />
    </a>
  </div>
  <div class="product-info">
    <div class="product-name"><span>'.$product->name.'</span></div>
    <div class="product-price"><span class="special-price">'.$product->quantity.' available</span> <span>R$ '.$price.'</span></div>
  </div>
</li>';
}
?>
<!-- Main Content -->
<main class="content">
    <div class="header-list-page">
      <h1 class="title">Dashboard</h1>
    </div>
    <div class="infor">
      You have <?=count($products)?> products added on this store: <a href="addProduct.php" class="btn-action">Add new Product</a>
    </div>
    <ul class="product-list">
      <?=$results?>
      
    </ul>
  </main>
  <!-- Main Content -->