<?php
$method = $_SERVER['REQUEST_METHOD'];

$post1 = isset($_POST['request'])?$_POST['request']:"";
$post2 = isset($_POST['response'])?$_POST['response']:"";

if($method == 'GET'){
    echo 'hellow';
}
elseif($method == 'POST'){
  if($post1&&$post2){
    echo $post1."".$post2."OK";
  }else{
    echo "NG";
  }
}
 ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          