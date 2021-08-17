<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;
use App\Models\Category;

class ShopComponnet extends Component
{
    public $shorting;
    public $pagesize;

    public $min_price;
    public $max_price;

    public function mount(){
        $this->shorting = 'default';
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->min_price = 1000;
    }

    public function store($product_id, $product_name, $product_price){
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_msg', 'Item has been added in Cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        if($this->shorting=='date'){
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }else if($this->shorting=='price'){
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        }else if($this->shorting=='price-desc'){
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }else{
            $products = Product::paginate($this->pagesize);
        }

        $categories = Category::all();
        
        return view('livewire.shop-componnet', ['products'=>$products, 'categories'=>$categories])->layout('layouts.base');
    }
}
