<?php
$categories = Category::all();
$message = '';

if (
  isset($_POST['title']) && 
  isset($_POST['content'])
) {
  Post::create([
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'category_id' => $_POST['category'],
    'user_id' => $_SESSION['user']['id'],
  ]);
  $message = 'Your article posted successfully';
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
      <label for="category">Category</label>
      <select name="category" id="category" class="form-control">
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">content</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-info">Add post</button>
    </div>
  </form>

</div>
<?php require 'footer.php'; ?>
