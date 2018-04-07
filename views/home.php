<?php require 'header.php'; ?>
<?php 
$posts = Post::all();
?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php foreach ($posts as $post): ?>
        <div class="card my-3">
          <div class="card-body">
            <h2>
              <a href="post?id=<?php echo $post->id ?>">
                <?php echo $post->title ?>
              </a>
            </h2>
            <p><?php  echo substr( $post->content, 0, 200) ?>
              ... <a href="post?id=<?php echo $post->id ?>" class="btn btn-link">read more</a>
            </p>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="col-md-4">
      <?php require 'sidebar.php'; ?>
    </div>
  </div>
</div>

<?php require 'footer.php'; ?>