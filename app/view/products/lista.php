<?php
$resultado='';
$mensagem='';

foreach($products as $product){
   $resultado.='
   <tr class="data-row">
        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$product->name.'</span>
        </td>
      
        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$product->sku.'</span>
        </td>

        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.str_replace(".",",",$product->price).'</span>
        </td>

        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$product->quantity.'</span>
        </td>

        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.implode("<br>",$product->category).'</span>
        </td>
      
        <td class="data-grid-td">
          <div class="actions">
            <div class="action edit"><span><a href="editProduct.php?id='.$product->id_products.'">Edit</a></span></div>
            <div class="action delete"><span><a href="deleteProduct.php?id='.$product->id_products.'">Delete</a></span></div>
          </div>
        </td>
      </tr>';
}
$resultado =strlen($resultado)>0?$resultado:'
<tr>
    <td colspan="6">Nenhum registro encontrado</td>
</tr>';
?>
<!-- Main Content -->
<main class="content">
    <div class="header-list-page">
      <h1 class="title">Products</h1>
      <a href="addProduct.php" class="btn-action">Add new Product</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      
      <?=$resultado?>
    </table>
  </main>
  <!-- Main Content -->