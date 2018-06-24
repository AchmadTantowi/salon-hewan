<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConfirmPayment;

class ConfirmController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $confirms = ConfirmPayment::get();
        return view('admin.confirm.index', compact('confirms'));
    }

}
