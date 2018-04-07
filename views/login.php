<?php

$oldvalues = [
  'name' => '',
  'email' => '' ,
  'password' => '' ,
];
$errors = [];
$message = '';

if (isset($_POST['email']) &&
isset($_POST['password']) ) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $oldvalues = [
    'email' => $email,
    'password' => $password,
  ];

  if (!is_email_exists($email)) {
    $errors['email'] = 'Your email doesn\t associated with any account. Please register first';
  } else {
    $user = User::where('email', $email)->first();
    if (password_verify($password, $user->password)) {
      $data = [
        'name' => $user->name,
        'email' => $user->email,
        'id' => $user->id,
      ];
      $_SESSION['user'] = $data;
      redirect('/');
    }else {
    $errors['password'] = 'Please put correct password';
  }
  }





}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="/public/bootstrap.min.css">
</head>
<body class="bg-info">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card mt-5">
          <div class="card-header">
            <h2>Login</h2>
          </div>
          <div class="card-body">
            <?php if(!empty($message)): ?>
              <div class="alert alert-success">
                <p><?php echo $message ?></p>
              </div>
            <?php endif; ?>
            <form action="" method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input value="<?php echo $oldvalues['email'] ?>" type="text" class="form-control" name="email" id="email" >
              </div>
              <?php if(isset($errors['email'])): ?>
                <p class="text-danger"><?php echo $errors['email'] ?></p>
              <?php endif; ?>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input value="<?php echo $oldvalues['password']  ?>" type="password" name="password" id="password" class="form-control" >
              </div>
              <?php if(isset($errors['password'])): ?>
                <p class="text-danger"><?php echo $errors['password'] ?></p>
              <?php endif; ?>
              <p>
                Dont have account? <a href="/register">Register here</a>
              </p>
              <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Login</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>