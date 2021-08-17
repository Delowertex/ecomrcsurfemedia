<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class CategoryComponent extends Component
{
    public $shorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug){
        $this->shorting = 'default';
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_msg', 'Item has been added in Cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if($this->shorting=='date'){
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->shorting=='price'){
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }else if($this->shorting=='price-desc'){
            $products = Product::where('category_id', $category_id)->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }else{
            $products = Product::where('category_id', $category_id)->paginate($this->pagesize);
        }

        $categories = Category::all();
        
        return view('livewire.category-component', ['products'=>$products, 'categories'=>$categories, 'category_name'=>$category_name])->layout('layouts.base');
    }
}
