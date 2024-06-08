<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

class EmailService
{
    protected $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.mailtrap.io';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = '338e25c639faf1';
            $this->mailer->Password = '49d6a30605febb';
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
            $this->mailer->setFrom('istmamouservice@cometinfo.com', 'Mailer');
        } catch (Exception $e) {
            Log::error("Mailer Error: {$e->getMessage()}");
        }
    }

    public function sendWelcomeEmail($recipientEmail, $unsubscribeLink)
    {
        try {
            $this->mailer->addAddress($recipientEmail);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Bienvenue dans notre newsletter';
            
            $htmlContent = View::make('emails.welcome', ['unsubscribeLink' => $unsubscribeLink])->render();
            $this->mailer->msgHTML($htmlContent);
            $this->mailer->AltBody = 'Merci de vous être inscrit à notre newsletter!' . "\n\n" .
                                     'Pour vous désinscrire, cliquez ici: ' . $unsubscribeLink;
            $this->mailer->send();
        } catch (Exception $e) {
            Log::error("Le message n'a pas été envoyé. Mailer Error: {$this->mailer->ErrorInfo}");
        }
    }

    public function sendNewsletter($subject, $body, $recipientEmail, $unsubscribeLink)
    {
        try {
            $this->mailer->addAddress($recipientEmail);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;

            $htmlContent = View::make('emails.newsletter', ['subject' => $subject, 'body' => $body, 'unsubscribeLink' => $unsubscribeLink])->render();
            $this->mailer->msgHTML($htmlContent);
            $this->mailer->AltBody = $body . "\n\n" . 'Pour vous désinscrire, cliquez ici: ' . $unsubscribeLink;
            $this->mailer->send();
        } catch (Exception $e) {
            Log::error("Le message n'a pas été envoyé. Mailer Error: {$this->mailer->ErrorInfo}");
        }
    }

    public function sendUnsubscribeConfirmation($recipientEmail)
    {
        try {
            $this->mailer->addAddress($recipientEmail);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Confirmation de desabonnement';
            
            $htmlContent = view('emails.unsubscribe', ['subscribeLink' => 'URL_VERS_LA_PAGE_D_ABONNEMENT'])->render();
            $this->mailer->msgHTML($htmlContent);
            
            $this->mailer->send();
        } catch (Exception $e) {
            Log::error("Le message de confirmation de désabonnement n'a pas été envoyé. Mailer Error: {$this->mailer->ErrorInfo}");
        }
    }
}
