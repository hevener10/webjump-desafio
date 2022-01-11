<!-- Main Content -->
<main class="content">
    <h1 class="title new-item"><?=TITLE?></h1>
    
    <form method="POST">
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" name="category-name" id="category-name" value="<?=$category->category_name?>" class="input-text" />
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" name="category-code" id="category-code" value="<?=$category->category_code?>" class="input-text" />
        
      </div>
      <div class="actions-form">
        <a href="categories.php" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
  </main>
  <!-- Main Content -->