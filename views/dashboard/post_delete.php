<?php 

$id = $_GET['id'];
$post = Post::find($id);
$post->delete();
redirect('/dashboard/home');