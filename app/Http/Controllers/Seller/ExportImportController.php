<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    public function import(Request $request) {

        Excel::import(new ProductsImport, $request->file('file'));
        
        return redirect()->route('vendor.products')->with('success_msg', 'Product has been created!');
    }
}
