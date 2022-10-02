<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function get(Product $product)
    {     
        if ($product){
            $product->view++;
            $product->save();
        }          
        return $product;
    }

    public function find($name)
    {               
        return (Product::query()->where('name', 'like', '%' . $name . '%')->get());
    }

    public function findID()
    {
        $product = Product::query()->find(request('id'));
        if ($product){
            $product->view++;
            $product->save();
        }
        return $product;
    }

    public function hot()
    {
        return DB::table('products')->orderByDesc('view')->limit(30)->get();
    }

    public function filter()
    {
        
        return
        request()->has('categoryId') 
        ? Product::query()->where('category_id', '=', request('categoryId'))->get()
        : Product::all();
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'price' => 'numeric',
            'quantity' => 'numeric',
            'category_id' => 'numeric',
        ]);

        return Product::create([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'quantity' => request('quantity'),
            'image' => request('image'),
            'category_id' => request('category_id'),
        ]);
    }

    public function update(Product $product)
    {
        request()->validate([
            'name' => 'required',
            'price' => 'numeric',
            'quantity' => 'numeric',
            'category_id' => 'numeric',
        ]);

        $success = $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'description' => request('description'),
            'quantity' => request('quantity'),
            'image' => request('image'),
            'category_id' => request('category_id'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function setView(Product $product)
    {
        $success = $product->update([
            'view' => request('view'),
            
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Product $product)
    {
        $success = $product->delete();
        
        return [
            'success' => $success
        ];

    }

    
}
