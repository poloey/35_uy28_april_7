<?php 

function validate_email($email) {
  $pattern = "/.+@.+\..+/" ;
  return preg_match($pattern, $email);
}

function is_email_exists($email) {
  $user = User::where('email', $email)->first();
  return $user ? true : false;
  // if ($user) {
  //   return true;
  // }else {
  //   return false;
  // }
}

function validate_string ($string, $limit = 3) {
  return strlen($string) > $limit;
}

function redirect($path) {
  header("Location: $path");
}

function logout() {
  session_destroy();
  redirect('/');
}


// echo validate_email('pologmail.com') ? 'valide email' : 'invalid email';
// echo is_email_exists('pologmail.com') ? 'email exists' : 'email not exists';
