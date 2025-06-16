<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function store(Request $request) {
        $cart = session()->get('cart', []);
        foreach ($cart as $product_id => $item) {
            Transaction::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'quantity' => $item['quantity'],
                'total_price' => $item['price'] * $item['quantity']
            ]);
        }
        session()->forget('cart');
        return redirect()->route('transactions.index');
    }

    public function index() {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('transactions.index', compact('transactions'));
    }
}
