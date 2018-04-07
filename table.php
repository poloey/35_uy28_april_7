<?php 

require 'vendor/autoload.php';


use Illuminate\Database\Capsule\Manager;

Manager::schema()->dropIfExists('posts');
Manager::schema()->dropIfExists('categories');
Manager::schema()->dropIfExists('users');

Manager::schema()->create('users', function($t) {
  $t->increments('id');
  $t->string('name');
  $t->string('email')->unique();
  $t->string('password');
  $t->timestamps();
});

Manager::schema()->create('categories', function($t) {
  $t->increments('id');
  $t->string('name');
  $t->timestamps();
});

Manager::schema()->create('posts', function($t) {
  $t->increments('id');
  $t->string('title');
  $t->text('content');
  $t->integer('category_id')->unsigned();
  $t->integer('user_id')->unsigned();
  $t->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
  $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
  $t->timestamps();
});

