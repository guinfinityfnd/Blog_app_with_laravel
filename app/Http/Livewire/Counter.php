<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $countde = 10;
 
    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->countde--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
