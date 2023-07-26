<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $colors = Color::orderby('id', 'desc')->get();
            return view('backend.admin.color.index', compact('colors'));
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
                'name'        => 'required|unique:colors,name|max:255',
                'color_code'  => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'color_code'  => $request->color_code,
            ];

            Color::create($data);

            $notify = ['message'    => 'Color created successfully', 'alert-type' => 'success'];

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
            $colors = Color::find($id);

            $request->validate([
                'name'        => 'required|unique:categories,name,' . $colors->id . '|max:255',
                'color_code'  => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'color_code'  => $request->color_code,
            ];

            $colors->update($data);

            $notify = ['message' => 'Color updated successfully', 'alert-type' => 'success'];

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
            $color = Color::find($id);

            $color->delete();

            $notify = ['message' => 'Color deleted!', 'alert-type' => 'error'];
            return redirect()->back()->with($notify);
        } catch (Exception $e) {
            return redirect()->back()->with($notify);
        }
    }
}
