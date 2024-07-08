<?php

namespace App\Http\Controllers\Marchentiger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){

        return view('auth.marchentiger.dashboard');
    }
    public function createOrUpdate(Request $request) {
        dd($request->all());
    }
}
