<?php

// app/Http/Controllers/EmailController.php
// app/Http/Controllers/EmailController.php
// app/Http/Controllers/EmailController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomEmail;
use App\Models\Receiver;

use PDF;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $emailContent = $request->input('emailContent');

        $pdfContent = '<h1>Hello, this is a PDF!</h1>';

        // Generate PDF
        $pdf = PDF::loadHTML($pdfContent);
        $pdfPath = storage_path('app/pdf/template.pdf');
        $pdf->save($pdfPath);

        // Get the list of emails
        $emails = Receiver::pluck('email');

        // Send emails with attached PDF
        foreach ($emails as $email) {
            Mail::to($email)->send(new CustomEmail($emailContent, $pdfPath));
        }

        // Delete the temporary PDF file
        unlink($pdfPath);

        return response()->json(['success' => true]);
    }
}
