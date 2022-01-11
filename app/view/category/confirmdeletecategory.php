<!-- Main Content -->
<main class="content">
    <h1 class="title new-item">Confirmação de exclusão</h1>
    
    <form method="POST">
      
      <p>Voce realmente deseja excluir a categoria <strong><?=$category->category_name?></strong> ?</p>
      <div class="actions-form">
        <a href="categories.php" class="action back">Cancelar</a>
        <input class="btn-submit btn-action" name="excluir"  type="submit" value="Confirmar" />
      </div>
    </form>
  </main>
  <!-- Main Content -->