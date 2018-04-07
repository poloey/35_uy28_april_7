<?php
// $id = $_GET['id'] ?? 1;
$id = $_GET['id'];
$post = Post::find($id);
$categories = Category::all();
$message = '';

if (
  isset($_POST['title']) && 
  isset($_POST['content'])
) {

  $post->title = $_POST['title'];
  $post->content = $_POST['content'];
  $post->category_id = $_POST['category'];
  $post->save();
  $message = 'Your article updated successfully';
}

 ?>

<?php  require 'header.php'; ?>
<div class="container">
  <div class="p-5 bg-info text-white mt-5">
    Edit post
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
          <option <?php echo $category->id == $post->category_id ? 'selected' : ''; ?> value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $post->title ?>" type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">content</label>
        <textarea
          name="content"
          id="content"
          cols="30" rows="10" class="form-control"><?php echo $post->content ?></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-info">Update post</button>
    </div>
  </form>

</div>
<?php require 'footer.php'; ?>
