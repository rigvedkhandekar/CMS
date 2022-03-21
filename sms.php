<?php

class sendSms
{

private $authentication_key = "295394AVN59Csg5ZSAZ96dc";
private $sender = "MMBGIT";
private $msg;
private $receiver;

        public function __construct ($msg, $receiver)
        {
             $this->msg = $msg;
             $this->receiver = $receiver;
              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{ \"sender\": \"$this->sender\",
                                          \"route\": \"1\",
                                           \"country\": \"91\",
                                            \"sms\": [ { \"message\": \"$this->msg\",
                                                         \"to\": [ \"$this->receiver\"]
                                                       }
                                                     ]
                                             }",
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTPHEADER => array(
                  "authkey: $this->authentication_key",
                  "content-type: application/json"
                ),
              ));


              $response = curl_exec($curl);
              $err = curl_error($curl);

              curl_close($curl);

              // if ($err) {
              //   echo "<script>
              //         console.log('cURL Error'+$err)
              //        </script>";

              // }
              // else
              //  {
              //   echo "<script> console.log ($response) </script>";
              // }
              if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

            }
}


?>
