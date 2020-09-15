<?php


namespace app\models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Mailer
{
    private $mail;
    private $userName;
    private $userEmail;
    private $subject;
    private $message;
    private $adminEmail;
    private $database;
    private $regexName = "/^[A-Z][a-z]{2,15}(\s[A-Z][a-z]{2,15})*$/";
    private $regexMail = "/^(([^<>()\[\]\\.,;:\s@\"]+(\.[^<>()\[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";

    public function __construct($database, $userName, $userEmail, $subject, $message)
    {
        $this->mail = new PHPMailer(true);
        $this->userName = $userName;
        $this->userEmail = $userEmail;
        $this->subject = $subject;
        $this->message = $message;
        $this->database = $database;
    }

    private function mailerConfig()
    {
        $this->mail->SMTPDebug = 0;                                  // Enable verbose debug output
        $this->mail->isSMTP();                                       // Set mailer to use SMTP
        $this->mail->Host = "smtp.gmail.com";                       // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = "auditorne.php@gmail.com";          // SMTP username
        $this->mail->Password = "Sifra123";                         // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $this->mail->setFrom("contact@it-ebooks.com", "IT-eBooks");
        $this->mail->addAddress($this->adminEmail);          // Add a recipient
        $this->mail->addReplyTo($this->userEmail);

        // Content
        $this->mail->isHTML(true);                           // Set email format to HTML
        $this->mail->Subject = $this->subject;
        $this->mail->Body = $this->message;
    }
    private function validateContactForm()
    {
        if (preg_match($this->regexName, $this->userName) && preg_match($this->regexMail, $this->userEmail) && $this->subject != "" && $this->message != "") {
            $valid = true;
        } else {
            $valid = false;
        }
        return $valid;
    }
    private function getAdminEmail()
    {
        $admin = $this->database->getRecord("SELECT u.email AS email FROM user u INNER JOIN role r ON u.idRole = r.idRole WHERE r.name = 'admin'");
        $this->adminEmail = $admin->email;
    }

    public function sendMail()
    {
        try
        {
            if ($this->validateContactForm())
            {
                $this->getAdminEmail();
                $this->mailerConfig();
                $this->mail->send();
                http_response_code(200);
                echo json_encode('Message has been sent');
            }
        }
        catch (Exception $e)
        {
            http_response_code(503);
            echo json_encode("Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}");
        }

    }


}