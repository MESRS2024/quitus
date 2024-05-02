<?php

namespace App\Livewire;

use App\Models\academicYear;
use App\Models\Student;
use App\Repositories\StudentRepository;
use App\Services\progresServices;
use Illuminate\Support\Facades\Redis;
use Livewire\Component;

class RoleSwitcher extends Component
{


    public $roles = [];

    public $academicYear = [];

    public $activeRole;

    public $activeAcademicYear;


    public function mount()
    {
        $this->roles = [" "=>" Choose your Role "]+auth()->user()->getRoles()->pluck('description', 'name')->toArray();
        $this->activeRole = session('activeRole') ?? auth()->user()->getRoles()->first()->name;
        $this->activeAcademicYear = session('activeAcademicYear') ?? academicYear::where('is_active', 1)->first()->id;
        $this->academicYear = [" "=>" Choose your Academic Year "]+academicYear::pluck('description', 'id')->toArray();
    }

    public function render()
    {
        return view('livewire.role-switcher', ['roles' => $this->roles]);
    }


    public function change()
    {
        session(['activeRole' => $this->activeRole]);
        $response = (new progresServices())->getStrecture(
                                                        auth()->user()->idIndividu,
                                                        $this->activeRole,
                                                        auth()->user()->progres_token
        );
        if (!empty($response['structure_id'])) {
            session(['strecture_id' => $response['structure_id']]);
        }
        if (!empty($response['group_id'])) {
            session(['group_id' => $response['group_id']]);
        }
        Redis::del('CachedData'.auth()->id());
        (new studentRepository())->cacheKey();
        $this->js('window.location.reload()');
    }

    public function changeAcademicYear()
    {

        session(['activeAcademicYear' => $this->activeAcademicYear]);
        $this->change();
    }
}
