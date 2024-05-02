<?php

namespace App\Livewire;

use App\Models\JobRecoder;

use Livewire\Component;

class CheckJob extends Component
{

    public $uuid;
    public $status;
    public $url;
    public $messages;
    public function mount()
    {
        $this->uuid = session('job_id');
        $this->status = $this->checkJobStatus();
        $this->updateUrlandMessage();
    }
    public function render()
    {
        return view('livewire.check-job');
    }

    public function updadeStatus()
    {
        $this->status = $this->checkJobStatus();
        $this->updateUrlandMessage();
    }
    private function checkJobStatus()
    {
        $job = JobRecoder::where('job_id', $this->uuid)
                            ->orWhere('user_id', auth()->id())->first();
        if ($job) {
            return $job->job_status;
        }
        return 'not found';
    }

    private function updateUrlandMessage()
    {
        if($this->status == 'pending'){
            $this->messages = 'file not ready';
        }
        if($this->status == 'success'){
            $this->messages = 'file is ready you can download it';
            $this->url =asset('/Documents/'. auth()->id() .'/Certificate_' . auth()->id() . '.pdf');

        }

    }
}
