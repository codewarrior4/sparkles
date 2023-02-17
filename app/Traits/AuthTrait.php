<?php

namespace App\Traits;

use App\Models\Customers;

use App\Mail\EmailVerification;
use App\Mail\SendResetPassword;
use App\Models\CustomerVerification;
use App\Models\Notifications;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

trait AuthTrait{
    
    
        public function saveCustomer($request){
            $this->validate($request,[
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:customers',
                'phone' => 'required',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password'
            ]);

            // send email verification
            $token = Str::random(100);

            $this->sendVerification($request->email,$request->firstname,$token);
            $customer = Customers::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' =>'Active',
                'isverified' =>0,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('customer.login')->with('success','Registration successful, please check your email to verify your account');
        }

    
        public function loginCustomer($request){
            // login user
            $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            // check if email and password is found
            $customer = Customers::where('email',$request->email)->first();
            if(!$customer || !Hash::check($request->password,$customer->password))
            {
                return redirect()->back()->with('error','Invalid login details');
            } else{
                // check if user is verified
                if($customer->isverified == 0){

                    // send verification email
                    $token = Str::random(100);
                    $this->sendVerification($request->email,$customer->firstname,$token);
                    return redirect()->back()->with('error','Please check your email address to verify your account');
                } else{
                    // login user
                    // check user status is suspended
                    if($customer->status == 'Suspended'){
                        return redirect()->back()->with('error','Your account has been suspended, please contact support');
                    }
                    session(['customer' => $customer]);
                    return redirect()->route('customer.dashboard');
                }
            }
        }
    
        public function verifyCustomer($token){
            // verify user
            $customer = CustomerVerification::where('token',$token)->first();
            // check time if not more than 1 hour
            
            if($customer){
                $generatedAt = Carbon::parse($customer->created_at);
                $now = Carbon::now();
                $diff = $generatedAt->diffInMinutes($now);
                
                if($diff > 60){
                    $customer->delete();
                    return redirect()->route('customer.login')->with('error','Verification link has expired, please request for another link');
                }

                Customers::where('email',$customer->email)->update(['isverified' => 1]);
                $customer->delete();
                return redirect()->route('customer.login')->with('success','Account verified successfully, please login');
            } else{
                return redirect()->route('customer.login')->with('error','Invalid verification link');
            }
        }
       

        public function sendVerification($email,$firstname,$token){
            // send verification email
            $details =[
                'firstname' => $firstname,
                'url'=> URL::to('/').'/customer/verify/'.$token
            ];
            Mail::to($email)->send(new EmailVerification($details));
            CustomerVerification::create([
                'email' => $email,
                'token' => $token
            ]);
        }

        public function sendPasswordreset($email,$firstname,$token){
            // send reset link
            $details =[
                'firstname' => $firstname,
                'url'=> URL::to('/').'/customer/reset/'.$token
            ];
            Mail::to($email)->send(new sendResetPassword($details));
            CustomerVerification::create([
                'email' => $email,
                'token' => $token
            ]);
        }

        public function logoutCustomer  (){
            // logout logoutCustomer
            session()->forget('customer');
            return redirect()->route('customer.login');
        }
    
        public function sendResetLinkEmail($request){
            
            $this->validate($request,[
                'email' => 'required|email'
            ]);
            $customer = Customers::where('email',$request->email)->first();
            if(!$customer){
                return redirect()->back()->with('error','Email address not found');
            } else{
                // send reset link
                $token = Str::random(100);
                $this->sendPasswordreset($request->email,$customer->firstname,$token);


                return redirect()->back()->with('success','Reset link sent to your email address');
            }
        }

      
    
        public function savePass($request){
            // save new password
            $this->validate($request,[
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
                'token' =>'required'
            ]);

            $customer = CustomerVerification::where('token',$request->token)->first();
            if($customer){
                // update password
                Customers::where('email',$customer->email)->update(['password' => Hash::make($request->password)]);
            }
            return redirect()->route('customer.login')->with('success','Password updated successfully, please login');
        }

        public function changeCustomerPassword($request){
            $this->validate($request,[
                'password' =>'required|min:6',
                'confirm_password' => 'required|same:password'
            ]);

            Customers::find(session('customer')->id)->update(['password'=>Hash::make($request->password)]);
            return redirect()->route('customer.profile')->with('success','Password updated successfully');

        }

        public function updateCustomer($request){
            $this->validate($request,[
                'firstname' =>'required',
                'lastname' =>'required',
                'phone' =>'required'
            ]);
            $customer = Customers::find(session('customer')->id);
            $customer->firstname = $request->firstname;
            $customer->lastname = $request->lastname;
            $customer->phone = $request->phone;
            $customer->save();

            session(['customer' => $customer]);
            return redirect()->route('customer.profile')->with('success','Profile updated successfully');



        }

        // admin
        public function loginAdmin($request){
            // login user
            $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);

            // check if email and password is found
            if($request->email <> 'admin@sparkles.com' && $request->password <> 'codewarx')
            {
                return redirect()->back()->with('error','Invalid login details');
            } else{
                // login user
                session(['admin' => $request->all()]);
                return redirect()->route('admin.dashboard');
            }
        }

        public function logoutAdmin(){
            // logout admin
            session()->forget('admin');
            return redirect()->route('admin.login');
        }
    
        
}