 <?php
 
 ?>
 <!-- Main Content -->
 <main class="content">
    <h1 class="title new-item">Delete Confirm</h1>
    
    <form method="POST">
      Confirma exclusão do produto <strong> <?=$product->name?></strong>?
      <div class="actions-form">
        <a href="products.php" class="action back">Cancel</a>
        <input name="excluir" class="btn-submit btn-action" type="submit" value="Confirm" />
      </div>
      
    </form>
  </main>
  <!-- Main Content -->