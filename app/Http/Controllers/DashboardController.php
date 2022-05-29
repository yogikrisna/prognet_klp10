<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ProductCategoryDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function dashboard() {
        $title = "All Products";
        $active = "Posts";
        $now = Carbon::now();
        $allTransactions = Transaksi::where('status', 'success')->get();
        $allSales = Transaksi::where('status', 'success')->count();
        $monthlySales = Transaksi::where('status', 'success')->whereMonth('created_at', $now->month)->count();
        $annualSales = Transaksi::where('status', 'success')->whereYear('created_at', $now->year)->count();
        $monthlyTransactions = Transaksi::where('status', 'success')->whereMonth('created_at', $now->month)->get();
        $annualTranscations = Transaksi::where('status', 'success')->whereYear('created_at', $now->year)->get();
        
        $incomeTotal = 0;
        $incomeMonthly = 0;
        $incomeAnnual = 0;

        foreach ($allTransactions as $transaction) {
            $incomeTotal+=$transaction->total;
        }

        
        foreach ($monthlyTransactions as $monthly) {
            $incomeMonthly+=$monthly->total;
        }

        foreach ($annualTranscations as $annual) {
            $incomeAnnual+=$annual->total;
        }

        $january = Transaksi::where('status', 'success')->whereMonth('created_at', '01')->count();
        $february = Transaksi::where('status', 'success')->whereMonth('created_at', '02')->count();
        $march = Transaksi::where('status', 'success')->whereMonth('created_at', '03')->count();
        $april = Transaksi::where('status', 'success')->whereMonth('created_at', '04')->count();
        $may = Transaksi::where('status', 'success')->whereMonth('created_at', '05')->count();
        $june = Transaksi::where('status', 'success')->whereMonth('created_at', '06')->count();
        $july = Transaksi::where('status', 'success')->whereMonth('created_at', '07')->count();
        $august = Transaksi::where('status', 'success')->whereMonth('created_at', '08')->count();
        $september = Transaksi::where('status', 'success')->whereMonth('created_at', '09')->count();
        $october = Transaksi::where('status', 'success')->whereMonth('created_at', '10')->count();
        $november = Transaksi::where('status', 'success')->whereMonth('created_at', '11')->count();
        $december = Transaksi::where('status', 'success')->whereMonth('created_at', '12')->count();

        $details = ProductCategoryDetail::get();

        return view('admin.dashboard', compact('title', 'active', 'now', 'allSales', 'monthlySales', 'annualSales', 'incomeTotal', 'incomeMonthly', 'incomeAnnual', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'details'));
    }
}
