<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contact">contact</a>
      </li>
    </ul>
    <ul class="navbar-nav ">
      <?php if (isset($_SESSION['user'])) :  ?>
        <li class="nav-item">
          <a class="nav-link" href="/dashboard/home">
            <?php 
              print($_SESSION['user']['name']);
             ?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      <?php else:  ?>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
      <?php endif;  ?>
    </ul>
  </div>
</nav>
