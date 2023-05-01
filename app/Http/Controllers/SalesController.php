<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Sales;

class SalesController extends Controller
{
    public function indexSales()
    {
        $sales = Sales::all();

        return response()->json($sales);
    }

    public function createSales()
    {
        return view('sales.index');
    }

    public function storeSales(StoreSalesRequest $request)
    {
        $sales = new Sales();

        $sales->start_date = $request->post('start_date');
        $sales->end_date = $request->post('end_date');
        $sales->price_list = $request->post('price_list');
        $sales->brand_id = $request->post('brant_id');
        $sales->product_id = $request->post('product_id');
        $sales->price = $request->post('price');

        $sales->save();

        return redirect()->route('sales.index')->with('success', 'Sale created successfully');

    }

    public function showSales(Sales $sales, $id)
    {
        $sales = Sales::findOrFail($id);

        return view('sales.show', compact('sales'));
    }

    public function editSales(Sales $sales, $id)
    {
        $sales = Sales::findOrFail($id);

        return view('sales.edit', ['sales' => $sales]);
    }

    public function updateSales(UpdateSalesRequest $request, Sales $sales, $id)
    {
        $sales = Sales::findOrFail($id);
        $sales->start_date = $request->input('start_date');
        $sales->end_date = $request->input('end_date');
        $sales->price_list = $request->input('price_list');
        $sales->brand_id = $request->input('brant_id');
        $sales->product_id = $request->input('product_id');
        $sales->price = $request->input('price');

        $sales->save();

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
    }

    public function destroySales(Sales $sales, $id)
    {
        $sales = Sales::find($id);

        if (!$sales) {
            return redirect()->route('sales.index')->withErrors('This sales does not exist');
        }

        $sales->delete();
        return redirect()->route('sales.index')->with('success', 'Sale eliminated correctly');
    }
}
