<?php

namespace App\Livewire\Pages;

use \App\View\Components\AppLayout;
use Livewire\Component;

class UserProduct extends Component
{
    public $selectedProduct = [];

    public function render()
    {
        return view('livewire.pages.user-product')
            ->layout(AppLayout::class, ['title' => 'User Product']);
    }

    public function hydrate(): void 
    {
        $this->emit('select2.hydrate');
    }

    
}
