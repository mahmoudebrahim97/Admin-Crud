<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /***************************  get all   **************************/
    public function index()
    {
        $rows = Category::where('category_id', null)->get();
        return view('product.categoryTreeview', compact('rows'));
    }
    public function subcategories($id)
    {
        $rows = Category::where('category_id', $id)->get();
        return view('product.subCategoryList', compact('rows', 'id'));
    }
    /***************************  store  **************************/
    public function create($id = null)
    {
        return view('product.create', compact('id'));
    }
    /***************************  store  **************************/
        public function store(Request $request)
    {
        // dd($request);
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'img_path' => md5(uniqid(rand(), true))
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            DB::table('categories')->where('id', $category->id)->update([
                'image' => $file_name,
            ]);
            $request->image->move(public_path('categories/' . $category->img_path), $file_name);
        }

        if($category->category_id == null ){
        return redirect()->route('dashboard');
        }else{

            $id = $category->category_id;
        return redirect()->route('subcategories', compact('id'));
        }
    }


    /***************************  edit page  **************************/
    public function edit($id)
    {
        $row = Category::findOrFail($id);
        $categories = Category::latest()->get();
        return view('product.edit', ['row' => $row, 'categories' => $categories]);
    }

    /***************************  update   **************************/
    public function update(store $request, $id)
    {
        $category = Category::where('id',$id)->first();
        Category::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'img_path' => $category->img_path
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            DB::table('categories')->where('id', $id)->update([
                'image' => $file_name,
            ]);
            $request->image->move(public_path('categories/' . $category->img_path), $file_name);
        }
        if($category->category_id == null ){
            return redirect()->route('dashboard');
            }else{
                $id = $category->category_id;
            return redirect()->route('subcategories', compact('id'));
            }
    }

    /*************** show *************************************/
    public function show($id)
    {
        $row = Category::findOrFail($id);
        $categories = Category::get();
        return view('admin.categories.show', ['row' => $row, 'categories' => $categories]);
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('id');
    }
}
