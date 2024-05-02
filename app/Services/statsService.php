<?php

namespace App\Services;

use App\Models\Student;

class statsService
{

    public function getStats()
    {
        return [
            'total_students' =>
                    [   'title'=>'Total Students',
                        'class'=>'primary',
                        'data'=>Student::count()],
            'total_exonerated' =>
                    [   'title'=>'Total Exonerated Students',
                        'class'=>'success',
                        'data'=>Student::Exonerated()->count()],
            'total_nonExonerated' =>
                   [   'title'=>'Total Non Exonerated Students',
                       'class'=>'danger',
                       'data'=>Student::NotExonerated()->count()],
        ];
    }
}
