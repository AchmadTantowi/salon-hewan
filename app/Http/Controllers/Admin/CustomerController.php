<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Mail;

class CustomerController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $customers = User::where("role", "customer")->get();
        return view('admin.customer.index', compact('customers'));
    }

    public function updateStatusVerified($userId){
        $updateVerified = User::where('user_id', $userId)->update(['verified' => 1]);
        $getUser = User::where('user_id', $userId)->first();
        if($updateVerified){
            // Send email
            $send_data['title'] = "Akun Anda berhasil diverifikasi oleh Happy Pet";
            Mail::send('emails.regis', ['getUser' => $getUser, 'send_data' => $send_data], function($message) use($getUser) {
                $message->to($getUser->email, $getUser->name)->subject('Verified Happy Pet');
            });
            alert()->success('Success','Sent email');
            return redirect('/admin/customer');
        }
    }   

}
