<?php

$oldvalues = [
  'name' => '',
  'email' => '' ,
  'password' => '' ,
];
$errors = [];
$message = '';

if (isset($_POST['name']) &&
isset($_POST['email']) ) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $oldvalues = [
    'name' => $name,
    'email' => $email,
    'password' => $password,
  ];

  if (!validate_string($name, 3)) {
    $errors['name'] = 'Your name shouldn\'t less than 4 character';
  }
  if (!validate_email($email)) {
    $errors['email'] = 'Please submit a valid email';
  } else if (is_email_exists($email)) {
    $errors['email'] = 'Your email already taken';
  }
  if (!validate_string($password)) {
    $errors['password'] = 'Your password shouldn\'t less than 4 character';
  } 
  if (empty($errors)) {
    User::create([
      'name' => $name,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);
    $message = 'You have successfully registered';
    $oldvalues = [
      'name' => '',
      'email' => '' ,
      'password' => '' ,
    ];
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
            <h2>Register</h2>
          </div>
          <div class="card-body">
            <?php if(!empty($message)): ?>
              <div class="alert alert-success">
                <p><?php echo $message ?></p>
              </div>
            <?php endif; ?>
            <form action="" method="post">
              <div class="form-group">
                  <label for="name">Name</label>
                  <input value="<?php echo $oldvalues['name'] ?>" type="text" name="name" id="name" class="form-control" >
              </div>

              <?php if(isset($errors['name'])): ?>
                <p class="text-danger"><?php echo $errors['name'] ?></p>
              <?php endif; ?>
              
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
                Already registered? <a href="/login">Login here</a>
              </p>
              <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Register</button>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>