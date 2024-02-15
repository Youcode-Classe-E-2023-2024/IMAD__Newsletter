<?php

// app/Mail/CustomEmail.php
// app/Mail/CustomEmail.php
// app/Mail/CustomEmail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailContent;
    public $pdfPath;

    public function __construct($emailContent, $pdfPath)
    {
        $this->emailContent = $emailContent;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->view('emails.custom')
                    ->with(['emailContent' => $this->emailContent])
                    ->subject('Your Email Subject')
                    ->html($this->emailContent)
                    ->attach($this->pdfPath, [
                        'as' => 'template.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}

