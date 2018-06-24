<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Testimoni;
use Auth;

class TestimoniFrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // TESTIMONI
    public function testimoni()
    {
        // dd(Auth::user());
        return view('customer.testimoni');
    }

    public function sendTestimoni(Request $request){
        $testimoni = Testimoni::create([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'description' => $request->get('description')
        ]);
        if($testimoni){
            alert()->success('Success','Saved');
            return redirect('/testimoni');
        }
    }


}
