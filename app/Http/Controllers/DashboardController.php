<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $totalSales = DB::table('transactions')->sum('total_price');
        $totalInvestment = $products->sum(fn($p) => $p->old_price * $p->stock);
        $totalStock = $products->sum('stock');

    return view('dashboard', compact('products', 'totalSales', 'totalInvestment', 'totalStock'));
    }
}

