<?php

namespace App\Http\Controllers\Admin;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
    	return view('admin.customers.create');
    }

    public function store(Request $request)
    { 
    	$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers,email',
            'phone'=>'required',
            'username'=>'required',
            'city'=>'required',
            'address'=>'required',
        ],[
            'name.required'=>'Customer name field is empty.',
            'email.required'=>'Email field is empty',
            'phone.required'=>'Phone number field is empty.',
            'phone.min'=>'Phone number input maximum 11 character',
            'username.required'=>'Username feild Is empty',
            'city.required'=>'City field is empty',
            'address.required'=>'Address field is empty',
        ]);
    	$data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'username'=>$request->username,
            'city'=>$request->city,
            'address'=>$request->address,
        ];
        $img =$request-> file('photo');
        if($img){
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/customer/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $customer = Customer::create($data);
            try{
                if($customer){
                    $notification = array(
                        'message'=>'Customer Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $customer = Customer::create($data);
            try{
                if($customer){
                    $notification = array(
                        'message'=>'Customer Added Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }
    public function index()
    {
    	$allcustomer = Customer::orderBy('id','asc')->paginate(10);
    	return view('admin.customers.index', compact('allcustomer'));

    }
    public function destroy($id)
    {
    	$customer = Customer::find('id');
    	try{
    		$customer->delete();
    		return redirect()->back();
    	}catch(\Throwable $exception){
    		return redirect()->back();
    	}
    }
    public function show($id)
    {
    	$customer = Customer::find($id);
    	return view('admin.customers.show',compact("customer"));
    }
    public function edit($id)
    {
    	$customer = Customer::find($id);
    	return view('admin.customers.edit', compact('customer'));
    }
    public function update(Request $request,$id)
    {
    	$customer = Customer::find($id);
    	$oldphoto = $customer->photo;
    	$data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'username'=>$request->username,
            'city'=>$request->city,
            'address'=>$request->address,
        ];
        $img =$request-> file('photo');
        if($img){
        	@unlink($oldphoto);
            $img_name = uniqid();
            $ext = $img->getClientOriginalExtension();
            $img_full_name = $img_name.'.'.$ext;

            $img_path = 'upload/customer/';
            $img_url = $img_path.$img_full_name;
            $img->move($img_path,$img_full_name);
            $data['photo']=$img_url;
            $customers = $customer->update($data);
            try{
                if($customers){
                    $notification = array(
                        'message'=>'Customer Updated Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $customers = $customer->update($data);
            try{
                if($customers){
                    $notification = array(
                        'message'=>'Customer updated Successfull!',
                        'alert-type'=>'success',
                    );
                    return Redirect()->back()->with($notification);
                }
            }catch(Throwable $exception){
                $notification = array(
                    'message'=>'Somthing is Wrong!',
                    'alert-type'=>'error',
                );
                return Redirect()->back()->with($notification);
            }
        }
    }

}
