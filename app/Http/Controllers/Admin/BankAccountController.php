<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BankAccount;
use Input;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;   

class BankAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $bankAccounts = BankAccount::get();
        return view('admin.bank_account.index', compact('bankAccounts'));
    }

    public function add()
    {
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        return view('admin.bank_account.add');
    }

    public function save(Request $request)
    {
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $this->validate($request, [
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required'
        ]);
        $bank = BankAccount::create([
            'bank_name' => $request->get('bank_name'),
            'account_number' => $request->get('account_number'),
            'account_name' => $request->get('account_name')
          ]);
        if($bank){
            alert()->success('Success','Saved');
            return redirect('/admin/bank');
        }
    }

    public function edit($id){
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $bank = BankAccount::where('bank_account_id', $id)->first();
        return view('admin.bank_account.edit', compact('bank'));
    }

    public function update($id, Request $request){
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $this->validate($request, [
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_name' => 'required'
        ]);
        $bank = BankAccount::find($id);
        $bank->bank_name = $request->get('bank_name');
        $bank->account_number = $request->get('account_number');
        $bank->account_name = $request->get('account_name');

        $bank->save();
        alert()->success('Updated','Successfully');
        return redirect('/admin/bank');
    }

    public function delete($id){
        if(Auth::user()->position != "Pemilik"){
            abort(404);
        }
        $bank = BankAccount::find($id);
        $bank->delete();
        if($bank){
            alert()->success('Deleted','Successfully');
            return redirect('/admin/bank');
        }
    }
}
