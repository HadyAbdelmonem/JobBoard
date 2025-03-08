<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.category.index', ['categories' => Category::all()]);
    }

    public function show(Category $category)
    {
        // return view('category.index');
    }
    public function create()
    {

        return view('dashboard.category.form', ['resource' => new Category()]);
    }
    public function store(CategoryRequest $request)
    {
        $slug = Str::slug($request->name);
        $category = Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);
        return response()->json(['message' => 'Category created successfully']);


        // return redirect(route('category.index'));
    }
    public function edit(Category $category)
    {
        return view('dashboard.category.form', ['resource' => $category]);
    }
    public function update(Request $request, Category $category)
    {

        $slug = Str::slug($request->name);
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);
        return response()->json(['message' => 'Category Updated successfully']);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        // return response()->json(['message' => 'Category deleted successfully']);
        toast('Category deleted successfully', 'success');
        // Alert::success('Success!', 'Operation completed successfully.');

        return back();
    }


    public function changeStatus(Request $request)

    {
        $category = Category::find($request->id);
        $status = $category->status == 'active' ? 'inactive' : 'active';
        $category->update(['status' => $status]);
    }
}
