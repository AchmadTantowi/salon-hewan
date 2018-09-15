<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimoni;
use DB;

class TestimoniController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $testimonis = Testimoni::get();
        $testimonis = DB::table('testimonis')
        ->leftJoin('users', 'users.user_id', '=', 'testimonis.user_id')
        ->select('*')
        ->get();
        return view('admin.testimoni.index', compact('testimonis'));
    }

}
