<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $brands = Brand::orderby('id', 'desc')->get();
            return view('backend.admin.brand.index', compact('brands'));
        }
        catch (Exception $e) {
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
                'name'        => 'required|unique:brands,name|max:255',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            if ($request->hasFile('image')) {

                $file       = $request->file('image');
                $extension  = $file->getClientOriginalExtension();
                $filename   = time() . '.' . $extension;

                // Resize - Image Intevention
                $image = Image::make($file);
                $image->resize(600, 360)->save(public_path('images/backend/brand_images/' . $filename));

                $data['image'] = $filename;
            }

            Brand::create($data);

            $notify = ['message' => 'Brand created successfully!', 'alert-type' => 'success'];

            return redirect()->back()->with($notify);
        }
        catch (Exception $e) {
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
            $brand = Brand::find($id);

            $request->validate([
                'name'        => 'required|unique:brands,name,' . $brand->id . '|max:255',
                'description' => 'required',
            ]);

            $data = [
                'name'        => $request->name,
                'description' => $request->description,
            ];

            if ($request->hasFile('image')) {
                if ($request->old_thumb) {
                    File::delete(public_path('images/backend/brand_images/' . $request->old_thumb));
                }

                $file       = $request->file('image');
                $extension  = $file->getClientOriginalExtension();
                $filename   = time() . '.' . $extension;


                // Resize image
                $image = Image::make($file);
                $image->resize(600, 360)->save(public_path('images/backend/brand_images/' . $filename));

                $data['image'] = $filename;
            }

            Brand::where('id', $id)->update($data);

            $notify = ['message' => 'Brand updated successfully!', 'alert-type' => 'success'];

            return redirect()->back()->with($notify);
        }
        catch (Exception $e) {
            return redirect()->back()->with($notify);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $brand = Brand::find($id);

            $brand->delete();

            $notify = ['message' => 'Brand deleted!', 'alert-type' => 'error'];
            return redirect()->back()->with($notify);
        }
        catch (Exception $e) {
            return redirect()->back()->with($notify);
        }

    }
}
