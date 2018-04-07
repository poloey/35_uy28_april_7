<?php
$id = $_GET['id'];
$category = Category::find($id);
$message = '';

if (
  isset($_POST['category'])
) {
  $category->name = $_POST['category'];
  $category->save();
  $message = 'Your Category updated successfully';
}

 ?>

<?php  require 'header.php'; ?>
<div class="container">
  <div class="p-5 bg-info text-white mt-5">
    Edit category
  </div>
  
  <?php if(!empty($message)): ?>
    <div class="alert alert-success">
      <p><?php echo $message ?></p>
    </div>
  <?php endif; ?>

  <form action="" method="post" class="my-3">
    <div class="form-group">
        <label for="category">category</label>
        <input value="<?php echo $category->name ?>" type="text" name="category" id="category" class="form-control">
    </div>
    
    <div class="form-group">
      <button type="submit" class="btn btn-info">Update category</button>
    </div>
  </form>
</div>
<?php require 'footer.php'; ?>
