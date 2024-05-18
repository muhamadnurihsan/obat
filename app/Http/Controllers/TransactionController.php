<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obatalkes_m;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionItem;

class TransactionController extends Controller
{
    public function create()
    {
        $customers = Customer::all();
        $products = Obatalkes_m::all();
        return view('transaksi.index', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:obatalkes_ms,product_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $totalAmount = 0;

        // Hitung total jumlah dan periksa stok
        foreach ($request->items as $item) {
            $product = Obatalkes_m::find($item['product_id']);
            if ($product->stok < $item['quantity']) {
                return redirect()->back()->withErrors(['msg' => 'Stok tidak mencukupi untuk produk: ' . $product->name]);
            }
            $totalAmount += $item['quantity'];
        }

        // Buat transaksi
        // $transaction = Transaction::create([
        //     'customer_id' => $request->customer_id,
        //     'total_amount' => $totalAmount,
        // ]);

        // Buat item transaksi dan kurangi stok
        foreach ($request->items as $item) {
            $product = Obatalkes_m::find($item['product_id']);
            TransactionItem::create([
                // 'transaction_id' => $transaction->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);

            // Kurangi stok produk
            $product->stok -= $item['quantity'];
            $product->save();
        }

        return redirect()->route('transactions.create')->with('success', 'Transaction completed successfully.');
    }
}
