<?php
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

use Models\users;
include "email_config.php";
include_once "kairos_face_php/Kairos.php";

$Kairos = new Kairos('b07139dc','193ebcef9e50706b46cc4b8972652eed' );
class controller extends email_config{
    private $otp;
     // Generate id
     private function generateId($length){
        // CODE TO GENERATE ID
         $token = 'qwertzuiopasdfghjklyxcvbnmABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz';
         $token = str_shuffle($token);
         $token = substr($token,  0,  $length);
         $current_date = date('Ymd');
         return $token = $token.$current_date;
     }

    private function responseMessage($message){
        echo json_encode($message);
    }

    public function registration($data){
        // insert data
        $this->otp = $this->generateId(10);
       $reg = users::insert([
            'user_id'           =>  $this->generateId(2),
            'name'             =>  strtolower($data['username']),
            'password'          => password_hash($data['password'], PASSWORD_BCRYPT),
            'phone'            => '',
            'email'             => $data['email'],
            'otp'                => $this->otp,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
            ]);
        if ($reg){
            $this->sendEmailVerification($data);
        }
    }

    public function login($data){
        $respons = null;
       $userData = users::where('name', strtolower($data['username']))->orWhere('email',$data['username'])->get();
       
        if (!count($userData)) {
            // $html_doc->title = "testtitle";
            $respons=0; 
        }else{
            foreach ($userData as $key => $value) {
                $hashed_password = $value['password'];            
    
                if(password_verify($data['password'], $hashed_password)) {
                    $respons=1;
                } else{
                    $respons=0;
                   
                }
            }
        }
       $this->responseMessage(array('response'=>$respons, 'userData'=>$userData));
    }

    private function sendEmailVerification ($data){
            
            //Sender
             $this->mail->setFrom('2faauthsystem@gmail.com', '2FA Auth System');

            //Recever
             $this->mail->addReplyTo($data['email']);
             $this->mail->addAddress($data['email'], $data['username']);     // Add a recipient
            
            // Content
             $this->mail->isHTML(true);                                  // Set email format to HTML
             $this->mail->Subject = '2FA Email Confirmation';
             $this->mail->Body    = 'Hello! '. $data['username'] . ' Thanks for choosing us, please click the button bellow to verify your email, <br>
            <p>
            <a href ="https://twofa.netlify.app/email_verification/'.$this->otp.'"><button>Verify Email Address </button></a>
            
            </p>
            
            ';
        try {
            $this->mail->send();
            echo json_encode(array("returnMsg" => 1));
        //     echo 'Message has been sent';
            } catch (Exception $e) {
                // echo json_encode(array("returnMsg" => "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}"));
                echo json_encode(array("returnMsg" => 0));
            }

           
    }

    public function verify_email($data){
        $userEmail;
        $verifyOTP = users::where('otp',$data['otp'])->count();
        if($verifyOTP == 1){
        $userEmail = users::select('email')->where('otp',$data['otp'])->get();
            $update_email_verification = users::where('otp',$data['otp'])->update([
                'verify_email' =>  1,
            ]);
        }
        $this->responseMessage(array('response'=>$verifyOTP, 'userEmail'=>$userEmail));
    }
     public function get_user_info($data)
    {
       $userData = users::where('email', $data['userEmail'])->get();
       if($userData){
        $this->responseMessage($userData);
       }
    }
    public function save_image($data){
        $saveUserImage = users::where('email',$data['email'])->update([
            'userImage' =>  $data['webcamImage'],
            'face_id'   =>  $data['face_id']
        ]);
        if( $saveUserImage){
            $this->responseMessage(array('response'=>'saved'));
        }
    }

    public function checkUsername($data){
        $userName = users::where('name', $data['username'])->count();
        $this->responseMessage(array('response'=> $userName));

    }

    public function checkEmail($data){
        $email = users::where('email', $data['email'])->count();
        $this->responseMessage(array('response'=> $email));
    }
}

