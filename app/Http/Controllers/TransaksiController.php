<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatAlkes_m;

class TransaksiController extends Controller
{
    public function index()
    {
        $obatalkes = ObatAlkes_m::all();
        return view('transaksi.index',
            ['products' => $obatalkes]
        );
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'customer_id' => 'required|exists:customers,id',
        //     'items' => 'required|array',
        //     'items.*.produk_id' => 'required|exists:products,id',
        //     'items.*.quantity' => 'required|integer|min:1',
        // ]);

        $totalAmount = 0;

        // Hitung total jumlah dan periksa stok
        // foreach ($request->items as $item) {
        //     $product = Obatalkes_m::find($item['produk_id']);
        //     if ($product->stock < $item['quantity']) {
        //         return redirect()->back()->withErrors(['msg' => 'Stok tidak mencukupi untuk produk: ' . $product->name]);
        //     }
        //     // $totalAmount += $product->price * $item['quantity'];
        // }

        // Buat transaksi
        $transaksi = TransaksiController::index([
            // 'customer_id' => $request->customer_id,
            'total_amount' => $totalAmount,
        ]);

        // Buat item transaksi dan kurangi stok
        foreach ($request->items as $item) {
            $product = Obatalkes_m::all();
            TransaksiController::index([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $item['produk_id'],
                // 'quantity' => $item['quantity'],
            ]);

            // Kurangi stok produk
            // $product->save();
        }

        return redirect()->route('transaksi.index')->with('success', 'Transaction completed successfully.');
    }
}
