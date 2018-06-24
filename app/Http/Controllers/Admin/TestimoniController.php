<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimoni;

class TestimoniController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $testimonis = Testimoni::get();
        return view('admin.testimoni.index', compact('testimonis'));
    }

}
