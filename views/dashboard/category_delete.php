<?php 

$id = $_GET['id'];
$post = Category::find($id);
$post->delete();
redirect('/dashboard/home');