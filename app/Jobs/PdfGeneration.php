<?php

namespace App\Jobs;


use App\Models\JobRecoder;
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
        public $user,
        public $jobId
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
        $status = (new GeneratExonorationCertfcate($studentsList))->generateAllSelectedStudents($this->user, $studentsList);
        if ($status) {
            JobRecoder::updateOrCreate
            (
                ['user_id' => $this->user, 'job_id' => $this->jobId],
                ['job_status' => 'success']
            );
        }else{
            JobRecoder::update
            (
                ['user_id' => $this->user, 'job_id' => $this->jobId],
                ['job_status' => 'failed']
            );
        }
    }
}
