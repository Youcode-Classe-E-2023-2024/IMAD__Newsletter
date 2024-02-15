<?php



namespace App\Http\Controllers;

use App\Mail\SendPDFMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class PDFController extends Controller
{
    public function generatePDFAndSendEmail(Request $request)
    {
        $emailContent = $request->input('emailContent');

        // Generate PDF
        $pdf = PDF::loadView('pdf.template', ['content' => $emailContent]);
        $pdfPath = storage_path('app/pdf/template.pdf');
        $pdf->save($pdfPath);

        // Get the list of emails
   

        // Send emails with attached PDF
        
            Mail::to("imadbpro63@gmail.com")->send(new CustomEmail($emailContent, $pdfPath));
        

        // Delete the temporary PDF file
        unlink($pdfPath);

        return response()->json(['success' => true]);
    }
    public function sendPDFEmail()
    {
        // Your PDF content or logic to generate the PDF
        $pdfContent = '<h1>Hello, this is a PDF!</h1>';

        // Generate PDF
        $pdf = PDF::loadHTML($pdfContent);
        $pdfPath = storage_path('app/pdf/template.pdf');
        $pdf->save($pdfPath);

        // Send email with attached PDF
        Mail::to('imadbpro63@gmail.com')->send(new SendPDFMail($pdfPath));

        // Delete the temporary PDF file
        unlink($pdfPath);

        return redirect()->back()->with('success', 'PDF sent successfully');
    }
}


