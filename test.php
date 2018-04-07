<?php 

require 'vendor/autoload.php';


// echo is_email_exists('dhaka@gmail.com') ? 'email exists' : 'email not exists';
$user = User::where('email', 'sujon@gmail.com')->first();
echo $user->name;
