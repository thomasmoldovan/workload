<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToasterComponent extends Component
{
    protected $listeners = [
        "toaster_message" => "update"
    ];

    public function render()
    {
        return view('livewire.toaster-component');
    }

    public function update($toaster_message) 
    {
        $this->dispatchBrowserEvent('alert', $toaster_message);
    }
}
