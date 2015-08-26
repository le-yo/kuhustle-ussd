<?php

$text = $_REQUEST['text'];

$input = getInput($text);

if($input['level'] == 0){
  //Breaking news, Football, Athletics, Gossip

  $reply = "Safaricom:".PHP_EOL."1.Safaricom+".PHP_EOL."2.M-PESA";

  echo "CON ".$reply;
  exit;
}else{
  //get the input form the previous step
  if($input['latest_message'] == 1){

    //safaricom menu
  $reply = "Still in progress";

  }elseif($input['latest_message'] == 2){
    //MPESA menu
    $reply = "MPESA:".PHP_EOL."1. Send Money".PHP_EOL."2.Withdraw Cash".PHP_EOL."3. Buy Airtime";

  }else{
    $reply = "We do not understand your response";
    echo "END ".$reply;
exit;
  }

echo "CON ".$reply;

}


//User dials the code and is requested to enter the drug verification
//code

//step 2 the code is compared to valid code and if valid gets valid Message

//end at this



function getInput($text){
  //check if text is empty
  $input = array();
  if(empty($text)){
    $input['level'] = 0;
    $input['latest_message']= "";
  }else{
     $exploded_text = explode('*',$text);

     $input['exploded_text'] = $exploded_text;
      $input['level'] = count($exploded_text);
      $input['latest_message'] = end($exploded_text);
  }

return $input;
}




 ?>
