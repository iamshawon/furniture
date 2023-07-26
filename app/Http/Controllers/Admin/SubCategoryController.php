<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::orderby('id', 'desc')->get();
        $categories = Category::all();

        return view('backend.admin.sub_category.index', compact('subCategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|unique:sub_categories,name|max:255',
            'description' => 'required',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'description' => $request->description,
        ];

        SubCategory::create($data);

        $notify = ['message'    => 'Sub Category created Successfully', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $subCategory = SubCategory::find($id);

            $request->validate([
                'name'        => 'required|unique:sub_categories,name,' . $subCategory->id . '|max:255',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            $subCategory->update($data);

            $notify = ['message' => 'Sub Category updated successfully', 'alert-type' => 'success'];

            return redirect()->back()->with($notify);
        } catch (Exception $e) {
            return redirect()->back()->with($notify);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::find($id);

        $subCategory->delete();

        $notify = ['message' => 'Sub Category deleted!', 'alert-type' => 'error'];
        return redirect()->back()->with($notify);
    }
}
