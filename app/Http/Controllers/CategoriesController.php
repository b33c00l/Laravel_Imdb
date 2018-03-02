<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Movie;

use App\Actor;

use Auth;

use App\Http\Requests\StoreCategoryRequest;

use App\Http\Requests\EditCategoryRequest;

use Session;

use App\User;

class CategoriesController extends Controller
{

    public function create()
    {
        return view('categories.create');
    }
    
    public function store(StoreCategoryRequest $request)
    {
        $user = Auth::user();
        $user->categories()->create($request->except('_token'));

        Session::flash('success', 'Your form was successfully saved!');
    	
        return redirect()->route('categories/all');
    }

    public function all()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(15);

        return view('categories.all',[
            'categories' => $categories

        ]);
    }

    public function destroy($id)
    {   
        $deletecategory = Category::where('id', $id)->delete();

        return redirect()->route('categories/all');
    }

    public function edit($id)
    {   
        $edit = Category::where('id', $id)->get();

        return view('categories.edit', ['edit' => $edit]);
    }

    public function update($id, EditCategoryRequest $request)
    {   
        $user = Auth::user();
        $user->categories()->findOrFail($id)->update($request->except('_token'));

        $category = Category::where('id', $id)->first();

        return redirect()->route('categories/all');
    }

    public function single($id)
    {   
        $categories = Category::findOrFail($id);
        $single = $categories->movies;

        return view('categories.single',[
            'single' => $single,
            'categories' => $categories
        ]);
    }
}