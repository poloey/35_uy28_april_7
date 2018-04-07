<?php
$message = '';

if (
  isset($_POST['category'])
) {
  Category::create([
    'name' => $_POST['category'],
  ]);
  $message = 'Your Category added successfully';
}

 ?>

<?php  require 'header.php'; ?>
<div class="container">
  <div class="p-5 bg-info text-white mt-5">
    Create post
  </div>
  
  <?php if(!empty($message)): ?>
    <div class="alert alert-success">
      <p><?php echo $message ?></p>
    </div>
  <?php endif; ?>

  <form action="" method="post" class="my-3">
    <div class="form-group">
        <label for="category">category</label>
        <input type="text" name="category" id="category" class="form-control">
    </div>
    
    <div class="form-group">
      <button type="submit" class="btn btn-info">Add post</button>
    </div>
  </form>

</div>
<?php require 'footer.php'; ?>
