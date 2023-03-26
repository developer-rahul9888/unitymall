<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class AuthController extends Controller
{

    public function __construct(CustomerRepository $CustomerRepository) {
    $this->customerRepository = $CustomerRepository;
}

    public function referralUser(Request $request) {

      $user = Customer::where('customer_id',$request->username)->first(['f_name','l_name']);
      if($user) {
        return response()->json([
          'data' => $user->f_name.' '.$user->l_name
        ]);
      } else {
        return response()->json([
          'data' => 'No Record Found.'
        ]);
      }
      
    }

    public function login(Request $request)
    {
        
        // $phone = 7888953469;  
        // $sms_msg = urlencode('Dear Rahul your A Voucher has been generated successfully, The Voucher Code is:1234, Do Not Share It With Anyone. Regards, Unitymall Inc.');
              
        // $smstext ="http://trans.businesskarma.in/api/v4/?api_key=A489d867d76419ff045781f5fc877e40a&method=sms&message=".$sms_msg."&to=".$phone."&sender=UNTYML";
        // echo file_get_contents($smstext);
        // die;


        if ($request->isMethod('POST')) {
        $rules = array(
        'email' => 'required',
        'password' => 'required|min:6');
        $validated = $request->validate($rules);
        $email = $request->email;
        $user = Customer::where(function ($query) use($email) {
            $query->where('email',$email);
            $query->orWhere('customer_id',$email);
            $query->orWhere('phone',$email);
        })
        ->where('pass_word',md5($request->password))
        ->first();


          if ($user)
          {
            Auth::login($user); 
            return redirect()->intended('/user')->withSuccess('User Signed in');
          }
          else
          {
            return redirect()->back()->with('error', 'Incorrect credential.');
          }
        
      } 
      $categories = $this->customerRepository->getCategory();
      return view('shop.login',compact('categories'));


    }


    public function member_login(Request $request)
    {
        if ($request->isMethod('POST')) {
        $rules = array(
          'bcono' => 'required'
          );
        $validated = $request->validate($rules);
        $user = Customer::where(['customer_id'=> $request->bcono])->first(); 

        if ($user)
          {
            Auth::login($user);

            if($request->has('type')) {
              if($request->type == 'shop') {
                return redirect('/');
              }
            }

            return redirect()->intended('/user')->withSuccess('User Signed in');
          }
          else
          {
            return redirect()->back()->with('error', 'Incorrect email or password.');
          }
        } 
        $categories = $this->customerRepository->getCategory();
      return view('shop.login',compact('categories'));
    }


    public function register(Request $request)
    {

        if ($request->isMethod('POST')) {
            $rules = array(
                'f_name' => 'required',
                'l_name' => 'required', 
                'gender' => 'required',
                'dob' => 'required',
                'phone' => 'required|unique:customer',
                'email' => 'required|email|unique:customer',
                'city' => 'required',
                'pincode' => 'required',
                'state' => 'required',
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6',
                //'direct_customer_id' => 'exists:customer,customer_id',
            );
            $message = [
                'f_name.required' => 'First Name is required',
                'l_name.required' => 'Last Name is required',
                'email.required' => 'Email is required',
                'password.required' => 'password is required',
                'phone.required' => 'Phone is required',
                'city.required' => 'City is required',
                'pincode.required' => 'pincode is required',
               // 'direct_customer_id.exists' => 'Referral ID is invalid',
            ];
            $validated = $request->validate($rules,$message);
            
            if($request->direct_customer_id) {
              $sponsorData = Customer::where([ 
                'customer_id' => $request->direct_customer_id
              ])->first();
              if(!$sponsorData) {
                  return redirect()->back()->withInput($request->all())->withError('Referral ID does not exist.');
              }
              $direct_customer_id = $request->direct_customer_id;
            } else {
              $direct_customer_id = 'RA56691061';
            }
            $tr_pin = str_pad(mt_rand(1,99999),4,'0',STR_PAD_LEFT);
            
            $user = new Customer;
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->dob = $request->dob;
            $user->state = $request->state;
            $user->pass_word = md5($request->password);
            $user->tr_pin = md5($tr_pin);
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->pincode = $request->pincode;
            $user->direct_customer_id = $direct_customer_id;
            $user->parent_customer_id = $direct_customer_id;
            $user->save();

            
            $insert_id = $user->id;
            $f_name = $request->f_name;
            $phone = $request->phone;
            $customer_n = $insert_id.$tr_pin;
            $customer_id = strtoupper($customer_n);
            $user->customer_id = $customer_id;
            $user->save();

            $fullName = $user->f_name.' '.$user->l_name;

            $sms_msg = urlencode("Welcome to www.unitymall.in Your Login ID is ".$customer_id.",\nPassword ".$request->password."\nThank You.");

            $smstext ="http://trans.businesskarma.in/api/v4/?api_key=A489d867d76419ff045781f5fc877e40a&method=sms&message=".$sms_msg."&to=".$phone."&sender=UNTYML";
					  file_get_contents($smstext);


            if ($user)
              {


                Customer::where('customer_id',$direct_customer_id)->increment('reward_wallet',1000);

                $sponsorData = Customer::where('customer_id',$direct_customer_id)->first();

                $dataToStore = array('user_id'=>$user->id,'send_to'=>$sponsorData->id,'send_by'=>$user->id,'amount'=>1000,'wallet_type'=>'Reward Point','status'=>'Credit');

                $this->customerRepository->addTransactionWallet($dataToStore);

                Customer::where('customer_id',$customer_id)->increment('reward_wallet',1000);

                $dataToStore = array('user_id'=>$sponsorData->id,'send_to'=>$sponsorData->id,'send_by'=>$user->id,'amount'=>1000,'wallet_type'=>'Reward Point','status'=>'Credit');

                $this->customerRepository->addTransactionWallet($dataToStore);

                return redirect()->intended('/login')->withSuccess('Registered successfully. Please login now.');
              }
              else
              {
                return redirect()->back()->withError('Something went wrong.');
              }
            
          } 
          $categories = $this->customerRepository->getCategory();
      return view('shop.register',compact('categories'));


    }
}
