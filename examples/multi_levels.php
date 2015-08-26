<?php

$text = $_REQUEST['text'];

$input = getInput($text);

if($input['level'] == 0){
  //Breaking news, Football, Athletics, Gossip
  $reply = self::getMainMenu();
  echo "CON ".$reply;
  exit;
}elseif($input['level'] == 1){
  //get the input form the previous step
  if($input['latest_message'] == 1){
      $reply = getSafaricomMenu();
  }elseif($input['latest_message'] == 2){
    //MPESA menu

    $reply = getMpesaMenu();
    print_r($reply);
    exit;
  }else{
    $reply = getErrorMessage();
    echo "END ".$reply;
   exit;
  }

echo "CON ".$reply;

}elseif($input['level'] == 2){
  //get the input form the previous step
  if($input['exploded_text'][0] == 1){
    //Safaricom Menu level 2
  }elseif($input['exploded_text'][0] == 2){
    //MPESA level 2

    $reply = getMpesaLevel2($input['latest_message']);
  }else{
    $reply = getErrorMessage();
    echo "END ".$reply;
   exit;
  }

echo "CON ".$reply;

}


//User dials the code and is requested to enter the drug verification
//code

//step 2 the code is compared to valid code and if valid gets valid Message

//end at this

function getMpesaLevel2($latest_message){


  if($latest_message == 1){
      $reply = "Send money process";
  }elseif($latest_message == 2){
    //MPESA menu
    $reply = "Withdraw cash process";
  }else{
    $reply = "Buy Airtime Process";
    echo "END ".$reply;
   exit;
  }

  return $reply;
}
function getErrorMessage(){
  return "We do not understand your response";

}
function getMpesaMenu(){
  return "MPESA:".PHP_EOL."1.Send Money".PHP_EOL."2.Withdraw Cash".PHP_EOL."3.Buy Airtime";

}
function getMainMenu(){
  return "Safaricom:".PHP_EOL."1.Safaricom+".PHP_EOL."2.M-PESA";
}

function getSafaricomMenu(){
  return "Still in progress";

}
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
