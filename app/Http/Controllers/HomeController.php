<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Cart;
use Auth;
use App\Testimoni;
use App\Product;
use App\Contact;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        // $testimonis = Testimoni::get();
        $testimonis = DB::table('testimonis')
        ->leftJoin('users', 'users.user_id', '=', 'testimonis.user_id')
        ->select('*')
        ->get();
        return view('home', compact('products', 'testimonis'));
    }

    // CONTACT
    public function contact()
    {
        return view('contact');
    }

    public function unverified()
    {
        alert()->info('Unverified','Akun Anda belum diverifikasi');
        return redirect('/');
    }

    public function sendContact(Request $request){
        $contact = Contact::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message')
        ]);
        if($contact){
            alert()->success('Success','Saved');
            return redirect('/contact');
        }
    }

    public function addToCart(Request $request){
        if(Auth::check()){
            $saved = Cart::add($request->get('id'), $request->get('name'), 1, $request->get('price'), ['size' => 'large']);
            if($saved){
                alert()->success('Success','Added to cart');
                return redirect('/');
            }  
        } else {
            alert()->info('Login before','Please login before add to cart');
            return redirect('/login');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
