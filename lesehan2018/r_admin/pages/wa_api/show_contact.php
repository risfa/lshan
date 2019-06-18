<?php

$output = "";
$output .= '<div class="row sideBar"  >';



$url = 'https://eu2.chat-api.com/instance3416/messages?token=vz7p7nyzeayqnhn4';


$chatId = '';
$array = array();
$result = file_get_contents($url); // Send a request
$data = json_decode($result, 1); // Parse JSON
$data2 = array_reverse($data['messages']);
foreach($data2 as $message){ // Echo every message
	if (in_array($message['chatId'], $array)) {
		continue;
	}
	array_push($array,$message['chatId']);




         



$output .= '<div class="row sideBar-body"  onclick="show_message('.substr($message['chatId'], 0, -5).');">
              <div class="col-sm-3 col-xs-3 sideBar-avatar">
                <div class="avatar-icon">
                  <img src="http://shurl.esy.es/y">
                </div>
              </div>
              <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="col-sm-9 col-xs-9 sideBar-main">
                <div class="row">
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">'.$message['chatId'].'
                  </span>
                  </div>
                  <div class="col-sm-8 col-xs-8 sideBar-name">
                    <span class="name-meta">'.$message['body'].'
                  </span>
                  </div>
                </div>
              </div>
              </div>
            </div>';


}

$output .= '</div>';

echo $output;
?>