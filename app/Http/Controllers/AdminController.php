<?php

namespace App\Http\Controllers;

use App\Models\Earning;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function orderDetails(Order $order) {
        return view('auth.admin.order.details',compact('order'));
    }
    public function earnings() {
 
        $earnings = Earning::orderBy('created_at', 'desc')->get();

        $earningsGrouped = [];
        

        foreach ($earnings as $earning) {
            $date = Carbon::parse($earning->created_at)->format('d M, d');
            $shop = $earning->shop->id;
        
            if (!isset($earningsGrouped[$date])) {
                $earningsGrouped[$date] = [];
            }
    
            if (!isset($earningsGrouped[$date][$shop])) {
                $earningsGrouped[$date][$shop] = [];
            }
            $earningsGrouped[$date][$shop][] = $earning;
        }
        // dd($earningsGrouped);
        


        return view('auth.admin.earnings',compact('earningsGrouped'));
    }
}
