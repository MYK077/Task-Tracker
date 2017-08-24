<?php

date_default_timezone_set('Asia/kolkata');

function i(){
  
  $icon = '<i class="fa fa-play" aria-hidden="true"></i>';

  return $icon;

}

function date_nice($date){

	return date('Y.m.d. g:i A',$date);
}

function time_nice($seconds){

	$h = floor(($seconds/60)/60);

	$m = round(($seconds/60) - ($h*60));

	return $h.'hours:'.$m.'mins';
}

function save($data){

    $json = json_encode($data);
    $file = fopen("data.json", "w");
    fwrite($file, $json);
    return true;

}


?>

