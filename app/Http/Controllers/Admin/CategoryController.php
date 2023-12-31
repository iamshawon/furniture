<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::orderby('id', 'desc')->get();
            return view('backend.admin.category.index', compact('categories'));
        } catch (Exception $e) {
            return redirect()->back();
        }
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

        try {
            $request->validate([
                'name'        => 'required|unique:categories,name|max:255',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            Category::create($data);

            $notify = ['message'    => 'Category created successfully', 'alert-type' => 'success'];

            return redirect()->back()->with($notify);
        } catch (Exception $e) {
            return redirect()->back()->with($notify);
        }
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
            $category = Category::find($id);

            $request->validate([
                'name'        => 'required|unique:categories,name,' . $category->id . '|max:255',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            $category->update($data);

            $notify = ['message' => 'Category updated successfully', 'alert-type' => 'success'];

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
        try {
            $category = Category::find($id);

            $category->delete();

            $notify = ['message' => 'Category deleted!', 'alert-type' => 'error'];
            return redirect()->back()->with($notify);
        } catch (Exception $e) {
            return redirect()->back()->with($notify);
        }
    }
}
