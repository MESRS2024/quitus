<?php

namespace App\Jobs;


use App\Models\Scopes\EtablissementScope;
use App\Models\Student;

use App\Services\GeneratExonorationCertfcate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class PdfGeneration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public bool $failOnTimeout = false;

    /**
     * Create a new job instance.
     * @param  $students
     */
    public function __construct(
        public $students,
        public $user
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $studentsList = Student::withOutGlobalScope(EtablissementScope::class)
                                ->whereIn('id', $this->students)
                                ->get();
        (new GeneratExonorationCertfcate($studentsList))->generateAllSelectedStudents($this->user, $studentsList);
        /*$pdf = Pdf::LoadView('Documents.StudentsCertificate', ['Students'=>$studentsList]);
        $storage = config('pdf.public_storage') . $this->user . '/';
        if (!file_exists($storage)) {
            mkdir($storage, 0777, true);
        }
        $pdf->save($storage . 'Certificate_' . $this->user . '.pdf');*/
    }
}
