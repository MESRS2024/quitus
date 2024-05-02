<?php

namespace App\Repositories;

use App\Models\academicYear;
use App\Repositories\BaseRepository;

class academicYearRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'id',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return academicYear::class;
    }
}
