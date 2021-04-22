<?php

namespace App\Http\Livewire;

use App\Helpers\Enums\YesNo;
use App\Models\Notification;
use Livewire\Component;

class NotificationsCounter extends Component
{
    protected int $counter = 0;
    protected bool $updated = false;
    protected $listeners = ['updateCounter' => 'updateCounter'];

    public function updateCounter(){
        $this->counter = Notification::whereRead((string) YesNo::NO)
            ->whereUserId(auth()->id())
            ->get()
            ->count();
    }

    public function render()
    {
        if(!$this->updated){
            $this->counter = Notification::whereRead((string) YesNo::NO)
                ->whereUserId(auth()->id())
                ->get()
                ->count();
        }

        return view('livewire.notifications-counter', [
            'counter' => $this->counter
        ]);
    }
}
