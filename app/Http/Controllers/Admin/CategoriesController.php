<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{
    public function index()
    {        
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[           
            'name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',
            'cat_image' => 'image|max:5120|mimes:jpeg,png,jpg,svg',           
        ]);

        $category = new Category();
        $category->name  =  $request->name;
        if($request->hasfile('cat_image'))
        {
           $image_file = $request->file('cat_image');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('public/category/',$img_filename);//folder uploads
           $category->cat_image = $img_filename;
        }
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[           
            'name' => 'regex:/^[a-zA-ZÑñ\s]+$/|max:120',
            'cat_image' => 'image|max:5120|mimes:jpeg,png,jpg,svg',           
        ]);

        $category = Category::find($id);
        $category->name  =  $request->name;
        if($request->hasfile('cat_image'))
        {
           $image_file = $request->file('cat_image');
           $img_extension = $image_file->getClientOriginalExtension();//sometimes same name,no will store so time extension will stores with time
           $img_filename = time().'.'.$img_extension;
           $image_file->move('public/category/',$img_filename);//folder uploads
           $category->cat_image = $img_filename;
        }

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function destroy($id) 
    {        
        $category = Category::find($id);
        $filepath_file = 'public/category/'.$category->cat_image;
        if(File::exists($filepath_file))
        {
            File::delete($filepath_file);
        }       
        Category::where("id", $category->id)->delete();
        return redirect()->back();
    }

    // public function massDestroy(MassDestroyCategoryRequest $request)
    // {
    //     Category::whereIn('id', request('ids'))->delete();
    //     return response(null, Response::HTTP_NO_CONTENT);
    // }
}
