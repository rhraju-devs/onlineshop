<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

use App\Notifications\SuccessfulRegistration;
use Illuminate\Notifications\Messages\VonageMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Vonage;
use App\helper;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::all();
        return view('backend.admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.admin.customer.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $customerImage = null;
        if($request->hasFile('photo')){
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/customers/', $customerImage);
        }
        $request->validate([
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'username' => 'string|required|unique:customers',
            'email' => 'email|required|unique:customers',
            'password' => 'required|min:6', 
            'phone' => 'required|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|required',
            'status' => 'string|required'
        ]);

        $customer = User::create([
            'firstname'=>$request->firstname,
            'lastname' => $request->lastname,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'photo'=>$customerImage,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
        if($customer){
            Toastr::success('Customer Successfully Created :)', 'Create', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.customer.list');
        }else{
            Toastr::success('Fill the Cridential :)', 'Not found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
        // dd($request);;
    }

    public function edit($id)
    {

        $customer = User::find($id);
        return view('backend.admin.customer.edit', compact('customer'));  
    }

    public function update(Request $request, $id)
    {
        $customer = User::find($id);
        $customerImage = $customer->photo;
        if($request->hasFile('photo'))
        {
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '_' . rand(1, 1000) . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('/uploads/customers/', $customerImage);
        }

        $request->validate([
            'firstname' => 'string|nullable',
            'lastname' => 'string|nullable',
            'username' => 'string|nullable',
            // 'email' => 'email',
            // 'password' => 'required|min:6', 
            'phone' => 'nullable|string|digits:11', 
            'photo' => 'nullable', 
            'address' => 'string|nullable',
            'status' => 'string|nullable'
        ]);

        $customer->update([
            'firstname'=>$request->firstname,
            'lastname' => $request->lastname,
            'username'=>$request->username,
            // 'email'=>$request->email,
            // 'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'photo'=>$customerImage,
            'address'=>$request->address,
            'status'=>$request->status, 
        ]);
        if($customer->update([])){
            Toastr::success('Customer Successfully Updated :)', 'Update', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.customer.list');
        }else{
            Toastr::error('Something Wrond :)', 'Error', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }

    public function delete($id)
    {
        $customer = User::find($id)->delete();
        if($customer){
            Toastr::error('Customer Successfully Deleted :)', 'Delete', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->route('admin.customer.list');
        }else{
            Toastr::warning('Customer could not found and Try again (:', 'Warning', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }

    public function show($id)
    {
        $customer = User::find($id);
        if($customer){
            Toastr::info('Customer Found :)', 'Found', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return view('backend.admin.customer.show', compact('customer'));
        }else{
            Toastr::warning('Customer could not found and Try again (:', 'Warning', ["positionClass"=> "toast-top-right", "closeButton" => true,"progressBar" => true,  "preventDuplicates" => true,]);
            return redirect()->back(); 
        }
    }

    public function sms($id)
    {
        $customer = User::find($id);
        $customer->notify(new SuccessfulRegistration());
        $sms=smsSend($customer->phone,'','');
 
   
        if ($sms) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: ";
        }
        return "success";
    }


}


// Helper function
// https://readerstacks.com/create-custom-helper-functions-in-laravel-8/
// https://github.com/browner12/helpers
// https://laravel.com/docs/5.1/helpers
// https://www.youtube.com/watch?v=XZ-Isc5lzF8
