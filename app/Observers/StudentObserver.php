<?php

namespace App\Observers;

use App\Models\Student;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "updated" event.
     */


    public function updating(Student $student): void
    {
        match (session('activeRole')) {
            'QTC_DEP' => $student->sit_dep_updatedBy = auth()->id(),
            'QTC_BIB_FAC' => $student->sit_bf_updatedBy = auth()->id(),
            'QTC_BIB_CENT' => $student->sit_bc_updatedBy = auth()->id(),
            'QTC_RU' => $student->sit_ru_updatedBy = auth()->id(),
            'QTC_BRS' => $student->sit_brs_updatedBy = auth()->id(),
            default =>  '',
        };
        match (session('activeRole')) {
            'QTC_DEP' => $student->sit_dep_updated_at = now(),
            'QTC_BIB_FAC' => $student->sit_bf_updated_at = now(),
            'QTC_BIB_CENT' => $student->sit_bc_updated_at = now(),
            'QTC_RU' => $student->sit_ru_updated_at = now(),
            'QTC_BRS' => $student->sit_brs_updated_at = now(),
            default =>  '',
        };
    }

    public function updated(Student $student): void
    {
        \Cache::forget('student_'.$student->uuid);
        \Cache::put('student_'.$student->uuid, collect(['data'=>$student]), 60*60*24);
    }

    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}
