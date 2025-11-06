<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::where('shop_id', auth()->user()->shop->id)
            ->when(request('from_date'), function ($q) {
                $q->whereDate('created_at', '>=', request('from_date'));
            })
            ->when(request('to_date'), function ($q) {
                $q->whereDate('created_at', '<=', request('to_date'));
            })
            ->with('product')
            ->latest()
            ->paginate(20);

        return view('auth.seller.purchases.index', compact('purchases'));
    }
    public function create()
    {
        return view('auth.seller.purchases.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'reference' => ['nullable', 'string', 'max:100'],
            'note' => ['nullable', 'string', 'max:1000'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'integer', 'exists:products,id'],
            'items.*.quantity' => ['required', 'numeric', 'min:0.01'],
            'items.*.cost_price' => ['nullable', 'numeric', 'min:0'],
        ]);

        $shopId = auth()->user()->shop->id;

        foreach ($data['items'] as $line) {
            $product = Product::findOrFail($line['product_id']);
            if ($product->shop_id !== $shopId) {
                return back()->withErrors('One or more products do not belong to your shop.');
            }

            Purchase::create([
                'shop_id' => $shopId,
                'product_id' => $product->id,
                'quantity' => (float) $line['quantity'],
                'cost_price' => $line['cost_price'] ?? null,
                'reference' => $data['reference'] ?? null,
                'note' => $data['note'] ?? null,
            ]);

            $product->update([
                'quantity' => ($product->quantity + (float) $line['quantity']),
            ]);
        }

        return redirect()->route('vendor.purchases.create')->with('success_msg', 'Purchases recorded and product quantities updated.');
    }

    public function export(Request $request)
    {
        $fromDate = $request->get('from_date');
        $toDate = $request->get('to_date');

        $filename = 'purchases_' . date('Y-m-d');
        if ($fromDate && $toDate) {
            $filename = 'purchases_' . $fromDate . '_to_' . $toDate;
        } elseif ($fromDate) {
            $filename = 'purchases_from_' . $fromDate;
        } elseif ($toDate) {
            $filename = 'purchases_until_' . $toDate;
        }

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\PurchasesExport($fromDate, $toDate),
            $filename . '.xlsx'
        );
    }
}


