<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Easter extends Component
{
    public bool $showModal = false;
    public bool $logoHuevo = false;

    public array $egg = [
        'egg1' => false,
        'egg2' => false,
        'egg3' => false,
    ];

    #[On('onHuevoA')]
    public function huevoA(): void
    {
        $this->egg['egg1'] = true;
        $this->checkEggs();
    }

    #[On('onHuevoB')]
    public function huevoB(): void
    {
        $this->egg['egg2'] = true;
        $this->checkEggs();
    }

    #[On('onHuevoC')]
    public function huevoC(): void
    {
        $this->egg['egg3'] = true;
        $this->checkEggs();
    }

    protected function checkEggs(): void
    {
        if (! in_array(false, $this->egg, true)) {
            $this->showModal = true;
            $this->logoHuevo = true;  
        }
    }

    public function render()
    {
        return view('livewire.easter');
    }
}
