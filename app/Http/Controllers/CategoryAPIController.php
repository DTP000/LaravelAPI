<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryApiController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function get(Category $category)
    {
        return $category;
    }

    public function findID()
    {
        return (DB::table('categories')->find(request('id')));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        return Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'image' => request('image'),
        ]);
    }

    public function update(Category $category)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $success = $category->update([
            'name' => request('name'),
            'description' => request('description'),
        ]);

        return [
            'success' => $success
        ];
    }
    
    public function destroy(Category $category)
    {
        $success = $category->delete();
        
        return [
            'success' => $success
        ];

    }
}
