<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sizes = Size::orderby('id', 'desc')->get();
            return view('backend.admin.size.index', compact('sizes'));
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
                'name'        => 'required|unique:sizes,name|max:255',
            ]);

            $data = [
                'name'        => $request->name,
            ];

            Size::create($data);

            $notify = ['message'    => 'Size created successfully', 'alert-type' => 'success'];

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
            $size = Size::find($id);

            $request->validate([
                'name'        => 'required|unique:sizes,name,' . $size->id . '|max:255',
            ]);

            $data = [
                'name'        => $request->name,
            ];

            $size->update($data);

            $notify = ['message' => 'Size updated successfully', 'alert-type' => 'success'];

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
            $size = Size::find($id);

            $size->delete();

            $notify = ['message' => 'Size deleted!', 'alert-type' => 'error'];
            return redirect()->back()->with($notify);
        } catch (Exception $e) {
            return redirect()->back()->with($notify);
        }
    }
}
