<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $seleted_categories = [];
    public $noofproducts;

    public function mount(){
        $category = HomeCategory::find(1);
        $this->seleted_categories = explode(',', $category->sel_categories);
        $this->noofproducts = $category->no_of_products;
    }

    public function updateHomeCategory(){
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->seleted_categories);
        $category->no_of_products = $this->noofproducts;
        $category->save();
        session()->flash('message', 'Home Category updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
