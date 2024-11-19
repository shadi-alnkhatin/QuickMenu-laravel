<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function store(Request $request){

        $catagory= Category::create([
            'name' => $request->categoryName,
            'menu_id' => $request->menu_id,
        ]);
        dd($catagory);
    }
}
