<?php

$text = "Leonard*2355";

$level = getLevel($text);

print_r($level);
exit;
//create a function to give us the level

function getLevel($text){
  //check if text is empty
  if(empty($text)){
    $level = 0;
  }else{
    $exploded_text = explode('*',$text);

    $level = count($exploded_text);
  }

  return $level;
}








 ?>
