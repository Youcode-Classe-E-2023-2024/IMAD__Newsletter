<?php
// app/Mail/SendPDFMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;

    public function __construct($pdfPath)
    {
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->view('emails.send-pdf')
            ->attach($this->pdfPath, [
                'as' => 'document.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}

// // app/Mail/SendPDFMail.php



// // app/Mail/SendPDFMail.php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;

// class SendPDFMail extends Mailable
// {
//     use Queueable, SerializesModels;

//     public $pdfData;

//     /**
//      * Create a new message instance.
//      *
//      * @param  string  $pdfData  The PDF data as a string
//      * @return void
//      */
//     public function __construct($pdfData)
//     {
//         $this->pdfData = $pdfData;
//     }

//     /**
//      * Build the message.
//      *
//      * @return $this
//      */
//     public function build()
//     {
//         return $this->view('emails.send-pdf')
//             ->attachData($this->pdfData, 'converted.pdf', [
//                 'mime' => 'application/pdf',
//             ]);
//     }
// }


