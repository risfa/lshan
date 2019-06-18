
<?php


$output = '';

 $output .= '<div class="row message" id="conversation" style="overflow-y: auto;">';



                $url = 'https://eu2.chat-api.com/instance3416/messages?token=vz7p7nyzeayqnhn4';



                $result = file_get_contents($url); // Send a request
                $data = json_decode($result, 1); // Parse JSON
                foreach($data['messages'] as $message){ // Echo every message
                if ($message['chatId'] == $_GET['nomor'].'@c.us') {
                  if ($message['fromMe']== false) {
                    

                    $date = new DateTime(gmdate("Y-m-d H:i:s ", $message['time']));
                    $date->setTimezone(new DateTimeZone('Asia/Bangkok')); // +04

                 

          $output.= '<div class="row message-body">
            <div class="col-sm-12 message-main-receiver">
              <div class="receiver">
                <div class="message-text">';
                  if ($message['type'] == 'chat') {
                    
                  $output.= $message['body']; 
                  }else{
                    $output.='<a href="'.$message['body'].'" target="_blank"><img src="'.$message['body'].'" style="width: 100%"></a>';

                  }
                $output.='</div>
                <span class="message-time pull-right">';
                      $output.= $date->format('Y-m-d H:i:s'); // 2012-07-15 05:00:00 
                $output.='</span>
              </div>
            </div>
          </div>';

                }else{


                
                $date = new DateTime(gmdate("Y-m-d H:i:s ", $message['time']));
                    $date->setTimezone(new DateTimeZone('Asia/Bangkok')); // +04




          $output.='<div class="row message-body">
            <div class="col-sm-12 message-main-sender">
              <div class="sender">
                <div class="message-text">';
                  if ($message['type'] == 'chat') {
                    
                  $output.= $message['body']; 
                  }else{
                    $output.='=<img src="'.$message['body'].'">';

                  }
                $output.='</div>
                <span class="message-time pull-right">';
                      $output.= $date->format('Y-m-d H:i:s'); // 2012-07-15 05:00:00 
                $output.='</span>
              </div>
            </div>
          </div>';

              }
            }
          }

        $output.='</div>';

echo json_encode(array('output' => $output,'test' => $_GET['nomor']));

  ?>