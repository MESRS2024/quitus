<?php

namespace App\Services;



use misterspelik\LaravelPdf\Pdf;
use misterspelik\LaravelPdf\PdfWrapper;

class GeneratExonorationCertfcate
{
    public function __construct(
        public $students
    )
    {
    }

    /*
     * Generate the Exonoration Certificate for the students with the given id
     */

    public function generateForStudent()
    {

        $html = view('Documents.StudentsCertificate', ['Students'=>$this->students]);
        $pdf = new PdfWrapper();
        $file = $pdf->loadHTML($html);
        return response()->streamDownload(
            fn () => print($file->output()),
            "Certificate.pdf"
        );
    }


    /*
     * Generate the Exonoration Certificate for the students with the given id
     */
    public function generateAllSelectedStudents($user, $studentsList): void
    {
        $pdf = \misterspelik\LaravelPdf\Facades\Pdf::LoadView('Documents.StudentsCertificate', ['Students'=>$studentsList]);
        $storage = config('pdf.public_storage') . $user . '/';
        if (!file_exists($storage)) {
            mkdir($storage, 0777, true);
        }
        $pdf->save($storage . 'Certificate_' . $user . '.pdf');
    }


}
