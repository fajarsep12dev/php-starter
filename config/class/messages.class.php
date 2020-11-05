<?php

require_once 'workflow.class.php';

abstract class URL {
    const link = "https://www.aquajapan.com";
}

abstract class SuccessStatus {
    const ReceiveMessage = 1;
    const SuccessVerification = 2;
    const ReceivePhoto = 3;
    const WaitForVerification = 4;
    const Approved = 5;
}

abstract class FailStatus{
    const FormatNotValid = 6;
    const PhotoNotValid = 7; 
}

abstract class MessageType {
    const wa = 1;
    const sms = 2;
}



class Messages extends conn {

    /*
        Check existing data customer 
    */
    public function CheckingValidCustomerId(
        $nama ,
        $nomorKtp){

        $query  = " SELECT * FROM
                     mr_customers 
                    WHERE 

                    ktp = $nomorKtp 
                  ";
        $result = $this->connection->query($query);
        $countResult = mysqli_num_rows($result);
        
        if ($countResult > 0) return false;
        else return true;
       
    }
    /*
        get response message from table
    */
    public function getResponseMessage($ws_id){
        $query = "SELECT msg_out_text
                  FROM mp_message_out
                  WHERE ws_id = $ws_id";
        $result     = $this->connection->query($query);
        $rowResult  = mysqli_fetch_array($result);
        
        $bodyMessage = $rowResult['msg_out_text'];

        return $bodyMessage;

    }
    /*
        sending response message with wa or sms
    */
    public function SendResponseMessage($messages, $number, $ws_id, $msg_type){
        
        $responseMessage = getResponseMessage($ws_id);
        
        if ($msg_type == MessageType::wa) {
            $data = [
                'phone' => $number, // Receivers phone
                'body'  => $responseMessage, // Message
            ];
            $json = json_encode($data); 

            $url = 'https://foo.chat-api.com/message?token=83763g87x';
            
            $options = stream_context_create(['http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $json
                ]
            ]);
            
            $result = file_get_contents($url, false, $options);
    
        }else{

        }
        

    }
     /*
        Checking message with format #####
    */
    public function FormatVerificationMessage (array $messages, $ws_status, $msg_type) {
        $workflow = new Workflow();

        foreach($messages as $item) {
            //Get sepparate data from message
            $msgBody   = $item['messageBody'];
            $msgNumber = $item['number'];
            
            $arr        = explode("#", $msgBody);

            $nama       = $arr[1];   
            $nomorKtp   = $arr[2];   
            $model      = $arr[3];   
            $noseri     = $arr[4];   
            $tanggal    = $arr[5]; 
            $ws_status  = 0;
            //CHECKING DATE FORMAT
            //Get date format from string message #ddmmyyy
            $day    = substr($tanggal, 0, 2);
            $month  = substr($tanggal, 2, 2);
            $year   = substr($tanggal, 4, 4);

            //Convert string to Date
            $joinDate =  $month.'/'.$day.'/'.$year;
            $time = strtotime($joinDate);

            //Result Date
            $date = date('m/d/Y',$time);
            #END REGION
            
            $isInvalidData = $this->CheckingValidCustomerId(
                $nama ,
                $nomorKtp 
            );

            if (!$isInvalidData) { 
                $ws_status = SuccessStatus::SuccessVerification;
              
                $workflow->InsertWorkflow(
                    $nomorKtp,
                    $ws_status,
                    $noseri,
                    $msg_type,
                    10,
                    $date
                );
            }else{
                $ws_status = FailStatus::FormatNotValid;

                $workflow->InsertWorkflow(
                    $nomorKtp,
                    $ws_status,
                    $noseri,
                    $msg_type,
                    10,
                    $date
                );
            }
            
                
                // $this->SendResponseMessage(
                //      $messages,
                //      $number, 
                //      $ws_status,
                //      $msg_type);          
        }

    }

   
   
}

?>