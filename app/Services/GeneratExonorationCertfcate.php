<?php

namespace App\Services;



use misterspelik\LaravelPdf\Pdf;
use misterspelik\LaravelPdf\PdfWrapper;
use Storage;

class GeneratExonorationCertfcate
{
    public function __construct(
        public $students
    )
    {
    }

    /*
     * Check if the pdf file was recently updated
     * @param $file_path
     */

    private function recentlyUpdatedPdf($file_path): bool
    {
        if (file_exists($file_path)) {
            $lastModified = filemtime($file_path);
            $currentTime = time();
            $diff = $currentTime - $lastModified;
            if ($diff < 60) {
                return true;
            }
        }
        return false;
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
    public function generateAllSelectedStudents($user, $studentsList): bool
    {
        $pdf = \misterspelik\LaravelPdf\Facades\Pdf::LoadView('Documents.StudentsCertificate', ['Students'=>$studentsList]);
        $storage = config('pdf.public_storage') . $user . '/';
        if (!file_exists($storage)) {
            mkdir($storage, 0777, true);
        }
        $file_path = $storage . 'Certificate_' . $user . '.pdf';
        $pdf->save($storage . 'Certificate_' . $user . '.pdf');
        return $this->recentlyUpdatedPdf($file_path);
    }


}
