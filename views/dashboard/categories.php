<?php 

$categories = Category::all();

 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-body">
      <h2 class="my-3">
        All Categories
      </h2>
      <a class="btn btn-outline-secondary" href="/dashboard/categories/create">Create category</a>
      <ul class="list-group my-4">
        <?php foreach ($categories as $category): ?>
          <li class="list-group-item my-2">
            <?php echo $category->name ?>
            <a class="btn btn-outline-info" href="/dashboard/categories/edit?id=<?php echo $category->id ?>">Edit</a>
            <a onclick="return confirm('are you sure you want to delete this category?')" class="btn btn-outline-danger" href="/dashboard/categories/delete?id=<?php echo $category->id ?>">Delete</a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>