<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Load Composer's autoloader
require '../vendor/autoload.php';
class email_config {
    public $mail;
    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->mail->Hostname = 'localhost';
        // $this->mail->isSMTP();
        // $this->mail->SMTPDebug  = 1;  
        $this->mail->SMTPAuth   = TRUE;
        $this->mail->SMTPSecure = "tls";
        $this->mail->Port       = 587;
        $this->mail->Host       = "smtp.gmail.com";
        $this->mail->Username   = "2faauthsystem@gmail.com";
        $this->mail->Password   = "twofactorauth22";
    }


}