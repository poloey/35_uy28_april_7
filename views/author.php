<?php require 'header.php'; ?>
<?php 
$user = User::find($_GET['id']);
?>

<div class="p-5 bg-info text-white">
  <h2> You are visiting <?php echo $user->name ?> page</h2>
</div>
<div class="container">
  <div class="row">

    <div class="col-md-8">
      <?php foreach ($user->posts as $post): ?>
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