<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/categories/home">category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/posts/create">Create post</a>
      </li>
    </ul>
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class="nav-link" href="/logout"> <?php echo $_SESSION['user']['name'] ?> | Logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">view blog</a>
      </li>
    </ul>
  </div>
</nav>
