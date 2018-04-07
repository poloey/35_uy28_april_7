<?php require 'header.php'; ?>
<?php 
$id = $_GET['id'];
$post = Post::find($id);

?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
        <div class="card my-3">
          <div class="card-body">
            <h2>
                <?php echo $post->title ?>
            </h2>
            <p><?php  echo $post->content ?> </p>
          </div>
        </div>
    </div>
    <div class="col-md-4">
      <?php require 'sidebar.php'; ?>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>