<?php
include('connect.php');

//$text = $_REQUEST['text'];
$sessionId   = $_REQUEST["sessionId"];
$serviceCode = $_REQUEST["serviceCode"];
$phoneNumber = $_REQUEST["phoneNumber"];
$text        = $_REQUEST["text"];

$level = getLevel($text);

if($level == 0){

  $reply = "Please enter the drug code";
  echo "CON ".$reply;
  exit;
}else{
  //check if the drug is valid

  $is_valid = validateDrugCode($text);

  //$valid_drug_code = "xyz";

  if($is_valid){
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


function validateDrugCode($text){
  $query = mysql_query("SELECT * FROM drugs WHERE verification_code='$text'");
if(mysql_num_rows($query)> 0){
  return TRUE;
}else{
    //create the user insurance
  return FALSE;
}
}


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
