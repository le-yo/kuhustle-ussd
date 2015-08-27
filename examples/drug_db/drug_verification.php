<?php

$text = $_REQUEST['text'];

$level = getLevel($text);

if($level == 0){

  $reply = "Please enter the drug code";
  echo "CON ".$reply;
  exit;
}else{
  $valid_drug_code = "xyz";

  if($text == $valid_drug_code){
    $reply = "The drug is valid";
  }else{
    $reply = "The drug is invalid";
  }
  echo "END ".$reply;

}


//User dials the code and is requested to enter the drug verification
//code

//step 2 the code is compared to valid code and if valid gets valid Message

//end at this



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
