 <?php
 $resultado_categorias="";

 

 foreach($categories as $category){
     $resultado_categorias.="<option".(in_array($category->id_category,$productCategories)?' selected ':'')." value='".$category->id_category."'>".$category->category_name."</option>";
 }
 ?>
 <!-- Main Content -->
 <main class="content">
    <h1 class="title new-item"><?=TITLE?></h1>
    
    <form method="POST">
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="text" id="sku" name="sku" value="<?=$product->sku?>" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" name="name" class="input-text" value="<?=$product->name?>"/> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" name="price" class="input-text" value="<?=str_replace(".",",",$product->price)?>"/> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="text" id="quantity" name="quantity" class="input-text" value="<?=$product->quantity?>"/> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category[]" name="category[]" class="input-text">
        <?=$resultado_categorias?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" name="description" class="input-text"><?=$product->description?></textarea>
      </div>
      <div class="actions-form">
        <a href="products.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
      </div>
      
    </form>
  </main>
  <!-- Main Content -->