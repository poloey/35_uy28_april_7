<?php 
require 'vendor/autoload.php';
require 'table.php';
use Faker\Factory;
$faker = Factory::create();


$users = [
  [
    'name' => 'parvez', 
    'email' => 'parvez@gmail.com', 
  ],
  [
    'name' => 'sujon', 
    'email' => 'sujon@gmail.com', 
  ],
  [
    'name' => 'asraf', 
    'email' => 'asraf@gmail.com', 
  ]
];

$categories = ['technology', 'web', 'programming'];

foreach ($users as $user) {
  User::create([
    'name' => $user['name'],
    'email' => $user['email'],
    'password' => password_hash('secret', PASSWORD_BCRYPT)
  ]);
}

foreach ($categories as $category) {
  Category::create([
    'name' => $category
  ]);
}

for ($i=0; $i < 20; $i++) { 
  Post::create([
    'title' => $faker->sentence,
    'content' => $faker->paragraph(rand(5, 15)),
    'category_id' => rand(1, 3),
    'user_id' => rand(1, 3)
  ]);
}








