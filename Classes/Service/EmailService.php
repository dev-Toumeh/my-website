<?php

namespace Toumeh\MyWebsite\Service;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Toumeh\MyWebsite\Domain\Model\Contacts;

class EmailService
{
    private const string SUBJECT = "some one contacted you on you Website";

    public function sendEmail(array $contactData): void
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['SMTP_PORT'];

            //Recipients
            $mail->IsHTML();
            $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
            $mail->addAddress($_ENV['SMTP_RECIPIENT']);

            //Content
            $mail->Subject = self::SUBJECT;
            $mail->Body = $this->getBody($contactData);

            $mail->send();

        } catch (Exception $e) {
            echo "Message could not be sent. PHPMailer Exception: {$e->getMessage()}";
        }
    }

    private function getBody($contentData): string
    {
        $body = '<html><body>';
        $body .= '<h2>Contact Details</h2>';
        $body .= '<p><strong>Name:</strong> ' . htmlspecialchars($contentData[CONTACTS::NAME]) . '</p>';
        $body .= '<p><strong>Email:</strong> ' . htmlspecialchars($contentData[CONTACTS::EMAIL]) . '</p>';
        $body .= '<p><strong>Phone:</strong> ' . htmlspecialchars($contentData[CONTACTS::PHONE]) . '</p>';
        $body .= '<p><strong>Message:</strong><br>' . nl2br(htmlspecialchars($contentData[CONTACTS::MESSAGE])) . '</p>';
        $body .= '</body></html>';
        return $body;
    }
}