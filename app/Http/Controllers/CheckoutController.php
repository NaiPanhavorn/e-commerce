<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        // Validate input quantity, named 'quantity' for clarity
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $quantity = $request->input('quantity');

        if ($product->stock < $quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        DB::beginTransaction();

        try {
            // Create transaction record
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'total_price' => $product->price * $quantity,
                'status' => 'paid',  // or use constants/enums
            ]);

            // Create transaction item (purchase details)
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price' => $product->price,
            ]);

            // Reduce product stock
            $product->stock -= $quantity;
            $product->save();

            DB::commit();

            return redirect('/purchase-success');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
