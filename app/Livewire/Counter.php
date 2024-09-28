<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count =0;

    public $text= "I love";
    public function render()
    {
        return view('livewire.counter');
    }
    public function increment(){
        $this->count++;
    }
    public function decrement(){
        $this->count--;
    }

    public function change(){
        $this->text = "Laravel";
    }
}
