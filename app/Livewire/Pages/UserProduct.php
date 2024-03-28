<?php

namespace App\Livewire\Pages;

use \App\View\Components\AppLayout;
use Livewire\Component;

class UserProduct extends Component
{
    public $user;
    public $products;
    
    public function mount()
    {
        $this->user = auth()->user();
        $this->products = \App\Models\Product::all()->pluck('name', 'id');
    }

    public function render()
    {
        return view('livewire.pages.user-product')
            ->layout(AppLayout::class, ['title' => 'User Product']);
    }

    public function create()
    {
        $this->user->products()->sync($this->products);
    }

    public function productSelected($products)
    {
        $this->products = $products;
    }

    public function productDeselected($products)
    {
        $this->products = $products;
    }

    public function productCleared()
    {
        $this->products = [];
    }

    public function productSet($products)
    {
        $this->products = $products;
    }

    public function updatedProduct($products)
    {
        $this->products = $products;
    }

    public function updatedUser($user)
    {
        $this->user = $user;
    }

    public function updatedProducts($products)
    {
        $this->products = $products;
    }

    public function updatedUserProducts($user, $products)
    {
        $this->user = $user;
        $this->products = $products;
    }
    
}
