 <?php
 $resultado='';
 $mensagem='';

 foreach($categories as $categorie){
   $resultado.='
   <tr class="data-row">
        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$categorie->category_name.'</span>
        </td>
      
        <td class="data-grid-td">
           <span class="data-grid-cell-content">'.$categorie->category_code.'</span>
        </td>
      
        <td class="data-grid-td">
          <div class="actions">
            <div class="action edit"><a href="editCategory.php?id='.$categorie->id_category.'"><span>Edit</span></a></div>
            <div class="button action delete"><a href="deleteCategory.php?id='.$categorie->id_category.'"><span>Delete</span></a></div>
          </div>
        </td>
      </tr>
   
   ';
 }
 $resultado =strlen($resultado)>0?$resultado:'
    <tr>
        <td colspan="3">Nenhum registro encontrado</td>
    </tr>';
 ?>
 <!-- Main Content -->
 <main class="content">
    <div class="header-list-page">
      <h1 class="title">Categories</h1>
      <a href="addCategory.php" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Code</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      <?=$resultado?>
      
    </table>
  </main>
  <!-- Main Content -->