<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function indexBrand()
    {
        $brand = Brand::all();

        return response()->json($brand);
    }

    public function createBrand()
    {
        return view('brand.index');
    }

    public function storeBrand(StoreBrandRequest $request)
    {
        $brand = new Brand();

        $brand->name = $request->post('name');

        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand created successfily');
    }

    public function showBrand(Brand $brand, $id)
    {
        $brand = Brand::findOrFail($id);

        return view('brand.show', compact('brand'));
    }

    public function editBrand(Brand $brand, $id) 
    {
        $brand = Brand::findOrFail($id);

        return view('brand.edit', ['brand' => $brand]);
    }

    public function updateBrand(UpdateBrandRequest $request, Brand $brand, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('name');

        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand updated successfily');
    }

    public function destroyBrand(Brand $brand, $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->route('brand.index')->withErrors('This brand does not exist');
        }

        $brand->delete();
        return redirect()->route('brand.index')->with('success', 'Brand eliminated correctly');
    }
}
