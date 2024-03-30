<?php

namespace App\Livewire;

use App\Models\Categories;
use Livewire\Component;

class ShowCategories extends Component
{
    public $categories;
    public $selectedCategory;
    public function mount(){
        $this->categories = Categories::all();
    }
    public function showCategory()
    {
        $this->dispatch('categorySelected', $this->selectedCategory);
    }
    public function render()
    {
        return view('livewire.show-categories');
    }
}
