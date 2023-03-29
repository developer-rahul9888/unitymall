<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Validator;

class ShopController extends Controller
{

    public function __construct(CustomerRepository $CustomerRepository) {
        $this->customerRepository = $CustomerRepository;
    }

    public function postBack(Request $request) {
        $input = $request->all();
        $data_to_store = [
            'data'=> json_encode($input),
            'type' => 'Cue-link'
        ];
        $this->customerRepository->storeReponse($data_to_store);

        $response = [
            'success'=>true,
            'message'=>'Success'
        ];
        return response()->json($response);
    }

    /**
     * Index to handle the view loaded with the search results.
     *
     * @return \Illuminate\View\View
     */
    public function search($keyword='',Request $request)
    {
        if ($request->isMethod('POST')) {
            $keyword = $request->input('keyword');
            return redirect('/search/'.$keyword);
        }
        $page = 1;
        $limit = 24;
        if($request->get('page')) { $page = $request->get('page');}
        $count = ($page-1)*$limit;
        $productsData = $this->customerRepository->getSearchProduct($keyword,$count,$limit);
        $products = $productsData['data'];
        $totalCount = $productsData['count'];
        $max = ceil($totalCount/$limit);
        $categories = $this->customerRepository->getCategory();
        return view('shop.search',compact('products','max','page','limit','categories','totalCount'));
    }

    public function ajax_search($keyword='',Request $request)
    {
        // if ($request->isMethod('POST')) {
        //     $keyword = $request->input('keyword');
        //     return redirect('/search/'.$keyword);
        // }
        $productsData = $this->customerRepository->getAjaxSearchProduct($keyword);
        $response = [];
        if($productsData) {
            foreach($productsData as $product) {
                
                $response[] = [
                    'p_id'=>$product->p_id,
                    'name'=>$product->pname,
                    'image'=>asset('../main-admin/images/product/'.$product->image),
                    'price'=>$product->price-$product->reward
                ];
            }
        }
        return response()->json($response);
    }

    /**
     * Fetch product details.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function fetchProductDetails($slug)
    {
        $product = $this->customerRepository->findBySlug($slug);
        $categories = $this->customerRepository->getCategory();
        return view('shop.single-product', compact('product','categories'));
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.cart', compact('categories'));
    }
    
    
    public function thankyou($orderId)
    {
        $categories = $this->customerRepository->getCategory();
        $order = $this->customerRepository->getOrderById($orderId);

        
        //echo '<pre>'; print_r($order->toArray()); die;
        session()->forget('cart');
        return view('shop.thankyou',compact('order','categories'));
    }

    public function order_tracking()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.orderTracking',compact('categories'));
    }
    
    public function product(Request $request)
    {
        $page = 1;
        $limit = 24;
        if($request->get('page')) {
            $page = $request->get('page');
        }
        $count = ($page-1)*$limit;

        $products = $this->customerRepository->all(['status'=>'active'],$count,$limit);
        $totalCount = $this->customerRepository->totalProduct();

        $max = ceil($totalCount/$limit);
        $categories = $this->customerRepository->getCategory();

        return view('shop.product',compact('products','max','page','limit','categories','totalCount'));
    }

    public function redirecting($storeId) {

        $transactionId = substr(md5(date('YmdHis').rand(11111,99999)),0,15);
        $onlineStore = $this->customerRepository->getOnlineStoreById($storeId);
        $url = 'https://www.cuelinks.com/api/v2/links.json?url='.$onlineStore->web_url.'&channel_id=162830&shorten=true&subid='.auth()->user()->customer_id.'&subid2='.$transactionId.'&subid3=desktop';
        $response = Http::withHeaders([
            'Authorization' => 'Token token=Zgk1wRe4OUVPIxTZU-AVocbVIPN1gJKpFOU03LY9UtY'
        ])->get($url);
        $affiliate_url = $onlineStore->web_url;
        if($response->successful()) {
            $affiliate_url = $response->json('shorten_url');
        }
        $dataToStore = [
            'Sitename'=> $onlineStore->web_name,
            'trx_id'=> $transactionId,
            'link' => $onlineStore->web_url,
            'user_id' => auth()->user()->id,
            'username' =>auth()->user()->customer_id,
            'phno'=>auth()->user()->phone,
            'ip' =>request()->ip()
        ];
        $this->customerRepository->addclick($dataToStore);
        return view('shop.redirecting',compact('onlineStore','affiliate_url'));
    }
    public function onlineStore(Request $request)
    {
        $page = 1;
        $limit = 24;
        if($request->get('page')) {
            $page = $request->get('page');
        }
        $count = ($page-1)*$limit;
        $productsData = $this->customerRepository->getAllOnlineStore($count,$limit);
        $webStores = $productsData['data'];
        $totalCount = $productsData['count'];
        $max = ceil($totalCount/$limit);
        $categories = $this->customerRepository->getCategory();
        return view('shop.online-store',compact('webStores','max','page','limit','categories','totalCount'));
    }

    public function ajaxWebStoreSearch($keyword)
    {
        $storeData = $this->customerRepository->getgetAjaxSearchOnlineStore($keyword);
        $response = [];
        if($storeData) {
            foreach($storeData as $store) {
                $response[] = [
                    'id' => $store->id,
                    'name' => $store->web_name,
                    'url' => url('redirecting/'.$store->id)
                ];
            }
        }
        return response()->json($response);
    }

    public function points(Request $request)
    {
        $page = 1;
        $limit = 24;
        if($request->get('page')) {
            $page = $request->get('page');
        }
        $count = ($page-1)*$limit;

        

        $productsData = $this->customerRepository->getPointProduct(100,$count,$limit);
        $products = $productsData['data'];
        $totalCount = $productsData['count'];

        $max = ceil($totalCount/$limit);
        $categories = $this->customerRepository->getCategory();

        return view('shop.points',compact('products','max','page','limit','categories','totalCount'));
    }

    public function product_test(Request $request)
    {
        $page = 1;
        $limit = 24;
        if($request->get('page')) {
            $page = $request->get('page');
        }
        $count = ($page-1)*$limit;

        $products = $this->customerRepository->all(['status'=>'active'],$count,$limit);
        $totalCount = $this->customerRepository->totalProduct();

        $max = ceil($totalCount/$limit);
        $categories = $this->customerRepository->getCategory();

        return view('shop.product_test',compact('products','max','page','limit','categories','totalCount'));
    }

    public function category($categoryId,Request $request)
    {
        $page = 1;
        $limit = 24;
        if($request->get('page')) { $page = $request->get('page');}
        $count = ($page-1)*$limit;
        $productsData = $this->customerRepository->getProductByCategory($categoryId,$count,$limit);
        $products = $productsData['data'];
        $totalCount = $productsData['count'];
        $max = ceil($totalCount/$limit);
        $categories = $this->customerRepository->getCategory();
        return view('shop.category',compact('products','max','page','limit','categories','totalCount'));
    }

    public function upgradeAccountToTopTest($custId, $limit = 1) {
        $user = $this->customerRepository->getUserById($custId);
		$levelIncome = [100,100,200,800,6400,102400];
		$directCustomerId = $user->direct_customer_id;
		$level = 1;
		while($level <= $limit) {
			$sponsorData = $this->customerRepository->getUserByCustomerId($directCustomerId);
			if(empty($sponsorData)) { break; }
				if($level == $limit) {
                    $count = $this->customerRepository->getUserFromIdTeamLevel($sponsorData->id,$custId,$level);
                    if($count > 0) { continue; }
					
					$dataToStore = ['user_id' => $sponsorData->id,'from_id'=>$custId,'level'=>$level];
					$this->customerRepository->addUserTeamLevel($dataToStore);
					

                    $dataToStore = array(
                        'user_id' => $sponsorData->id,
                        'amount' => $levelIncome[$level-1],
                        'user_send_by' => $custId,
                        'type' => 'Upgrade Income',
                        'pay_level' => $level,
                        'status' => 'Active'
                    );
					
                    if($sponsorData->user_level <= $level+1) {
                        $dataToStore['amount'] = $dataToStore['amount']/2;
                    }
                    //if($limit > 1) {
                        //$this->customerRepository->addIncome($dataToStore);
                        //$this->customerRepository->incrementPoints($sponsorData->id,$dataToStore['amount']);
                    //}
                    

                    
                    $count = $this->customerRepository->getUserTeamLevel($sponsorData->id,$level);
                    $upgradeLevel = pow(2,$level);
					if($count == $upgradeLevel) 
						{
							$custId = $sponsorData->id;
							$this->customerRepository->updateUser($custId,['user_level'=>$level+2]);
							$limit = $level+1; $level = 0;
						} 
					else { break; }
				}
			$directCustomerId = $sponsorData->direct_customer_id;
			$level++;
		}
    }



    public function upgradeAccountToTop($custId, $limit = 1) {
        $user = $this->customerRepository->getUserById($custId);
		$levelIncome = [100,100,200,800,6400,102400];
		$directCustomerId = $user->direct_customer_id;
		$level = 1;
		while($level <= $limit) {
			$sponsorData = $this->customerRepository->getUserByCustomerId($directCustomerId);
			if(empty($sponsorData) || $limit > 6) { break; }
				if($level == $limit) {
                    $count = $this->customerRepository->getUserFromIdTeamLevel($sponsorData->id,$custId,$level);
                    if($count > 0) { break; }
					
					$dataToStore = ['user_id' => $sponsorData->id,'from_id'=>$custId,'level'=>$level];
					$this->customerRepository->addUserTeamLevel($dataToStore);
					

                    $dataToStore = array(
                        'user_id' => $sponsorData->id,
                        'amount' => $levelIncome[$level-1],
                        'user_send_by' => $custId,
                        'type' => 'Upgrade Income',
                        'pay_level' => $level,
                        'status' => 'Hold'
                    );
					
                    if($sponsorData->user_level <= $level+1) {
                        $dataToStore['amount'] = $dataToStore['amount']/2;
                    }
                    //if($limit > 1) {
                        if($sponsorData->user_level >= $level+1) {
                            $dataToStore['status'] = 'Active';
                            $this->customerRepository->incrementPoints($sponsorData->id,$dataToStore['amount']);
                        }
                        $this->customerRepository->addIncome($dataToStore);
                    //}
                    
                    $count = $this->customerRepository->getUserTeamLevel($sponsorData->id,$level);
                    $upgradeLevel = pow(2,$level);
					if($count >= $upgradeLevel && $sponsorData->user_level == $level+1) 
						{
							$custId = $sponsorData->id;
							$this->customerRepository->updateUser($custId,['user_level'=>$level+2]);
                            $this->customerRepository->updateHoldIncome($custId,$level+1);
							$limit = $level+1; $level = 0;
						} 
					else { break; }
				}
			$directCustomerId = $sponsorData->direct_customer_id;
			$level++;
		}
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function checkout(Request $request)
    {   

        $user = auth()->user();
        $level = 1;
        $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
        $upgradeLevel = pow(2,$level);
        if($count >= $upgradeLevel && $user->user_level <= $level+1) {
            $this->customerRepository->updateHoldIncome($user->id,$level+1);
            $this->upgradeAccountToTop($user->id,$level+1);
            $user->user_level = $level + 2;
            $user->save();
        }
        // $this->customerRepository->storeResponse();
        // $incomes = $this->customerRepository->getTempIncome();

        // $incomes->each(function ($income) {
        //     //echo 'Rahul';
        //     $deductionAmount = $income->amount/2;
        //     $this->customerRepository->updateTempIncome($income->id,['amount' => $deductionAmount]);
        //     $this->customerRepository->decrementPoints($income->user_id,$deductionAmount);
        // });
        // dd($incomes);

        // $users = $this->customerRepository->getAllActiveUser();
        // // echo '<pre>'; print_r($users->toArray());
        // // die;
        // //dd($users->toArray());
        // $users->each(function ($user) {
        //     $this->upgradeAccountToTopTest($user->id);
        // });

        // // $this->upgradeAccountToTop(12705,3);
        // die;

        $razorpayOrder = $order = [];
        $cart = session()->get('cart');
        if(!$cart) { return redirect('/'); }
        if ($request->isMethod('POST')) {
            if(!Auth::check()) 
            {
                return redirect()->back()->withInput($request->all())->with('error', 'Please login first.');
            }
            $input = $request->input();
            
            $rules = [
                'f_name' => 'required',
                'l_name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'country' => 'required',
                'address' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
                'paymentType' => 'string',
            ];
            $message = [
                'f_name.required' => 'First Name is required',
                'l_name.required' => 'Last Name is required',
                'phone.required' => 'Phone is required',
                'email.required' => 'Email is required',
                'country.required' => 'Country is required',
                'address.required' => 'Address is required',
                'city.required' => 'City is required',
                'state.required' => 'State is required',
                'zipcode.required' => 'Zipcode is required',
            ];
            $validated = $request->validate($rules,$message);
            $transactionId = time() . Auth::user()->id;
            $validated['transaction_id'] = $transactionId;
            $validated['status'] = 'Pending';

            if($validated['paymentType']!='cod' && $validated['paymentType']!='wallet') {
                $validated['status'] = 'Process';
            }
            
            $order = $this->customerRepository->placeOrder($validated);

            if($validated['paymentType']=='wallet') {
                $cart = session()->get('cart');
                $total_amount = array_sum(array_column($cart,'total')) + array_sum(array_column($cart,'shipping'));
                $validated['status'] = 'Pending';

                if($total_amount > auth()->user()->bliss_amount) {
                    return redirect()->back()->with('error', 'Insufficient fund.');
                }
                $dataToStore = [
                    'user_id' => auth()->user()->id,
                    'wallet_type' => 'Main Wallet',
                    'amount' => $total_amount,
                    'status' => 'Debit',
                    'description' => 'Purchased',
                    'rdate' => date('Y-m-d H:i:s')
                ];
                $this->customerRepository->addTransactionWallet($dataToStore);
                auth()->user()->decrement('bliss_amount',$total_amount);
                // $data = [
                //     'order_id'=>$order->id,
                //     'cust_id' => $order->user_id,
                //     'how_to_pay'=>'razorpay',
                //     'comm_dis'=>$order->comm_dis,
                //     'reward_point'=>$order->reward,
                // ];
                // $this->apiCall($data);

                $user = auth()->user();
                
                $this->distribution($user,$order->comm_dis);

                $user->decrement('reward_wallet',$order->reward);

                $order->paid = 1;
                if($total_amount=='1298') { $order->status = 'Accepted'; } else { $order->status = 'Pending'; }
                $order->save();
            }


            if($validated['status']=='Process') {
                $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
                //$order = $this->customerRepository->getOrderById($orderId);
                
                $orderData = [
                            'receipt'         => 'rcpt_'.$order->id,
                            'amount'          => $order->total_amount*100, // 39900 rupees in paise
                            'currency'        => 'INR'
                            ];
                
                $data_to_store = [
                    'data'=> json_encode($orderData),
                    'type' => 'receipt'
                ];
                
                $this->customerRepository->storeReponse($data_to_store);
                $razorpayOrder = $api->order->create($orderData);
                $order->spl_note = $razorpayOrder->id;
                $order->how_to_pay = 'Razorpay';
                $order->save();
                //echo '<pre>'; print_r($razorpayOrder); die;
                //return view('shop.razorpayView',compact('order','razorpayOrder'));

                //return redirect('pay/'.$order->id);
            } else {
                return redirect('/thankyou'.'/'.$order->id);
            }
            
        }
        $categories = $this->customerRepository->getCategory();
        return view('shop.checkout',compact('categories','razorpayOrder','order'));
    }

    public function membership(Request $request)
    {
        $razorpayOrder = $order = [];
        if ($request->isMethod('POST')) {
            if(!Auth::check()) 
            {
                return redirect('login');
            }
            
            $id = 8;
            $product = $this->customerRepository->findById($id);
            $cart = [
                "id" => $product->id,
                "name" => $product->pname,
                "cost" => $product->cost,
                "reward" => $product->reward,
                "price" => $product->p_d_price,
                "quantity" => 1,
                "tax" => $product->t_class,
                "shipping" => $product->delivery_charge,
                "coin" => $product->comm_dis,
                "total" => $product->p_d_price,
                "image" => asset('../main-admin/images/product/'.$product->image)
            ];

            $user = auth()->user();
            $shipping = [
                'f_name' => $user->f_name,
                'l_name' => $user->l_name,
                'phone' => $user->phone,
                'email' => $user->email,
                'country' => $user->country,
                'address' => $user->address,
                'city' => $user->city,
                'state' => $user->state,
                'zipcode' => $user->pincode,
                'paymentType' => 'razorpay',
            ];
            $transactionId = time() . Auth::user()->id;
            $shipping['transaction_id'] = $transactionId;
            $shipping['status'] = 'Process';

            $order = $this->customerRepository->placeMembershipOrder($shipping,$cart);

            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $orderData = [
                'receipt'         => 'rcpt_'.$order->id,
                'amount'          => $order->total_amount*100, // 39900 rupees in paise
                'currency'        => 'INR'
            ];
            
            $data_to_store = [
                'data'=> json_encode($orderData),
                'type' => 'receipt'
            ];
            
            $this->customerRepository->storeReponse($data_to_store);
            $razorpayOrder = $api->order->create($orderData);
            $order->spl_note = $razorpayOrder->id;
            $order->how_to_pay = 'Razorpay';
            $order->save();

        }
        $categories = $this->customerRepository->getCategory();
        return view('shop.membership', compact('categories','razorpayOrder','order'));
    }

    public function goldPackageDistribution($user,$distributionAmount) {

        $addRoi = [
            'user_id' => $user->id,
            'amount' => (2/100)*$distributionAmount,
            'plan_type' => 'GOLD',
            'roi_count' => 50,
            'description' => 'Gold Package',
            'type' => 'M',
            'status' => 'Active',
            'pay_date' => date('Y-m-d',strtotime('+1 month')),
        ];
        $this->customerRepository->addRoi($addRoi);

        $this->customerRepository->directGoldIncomeDistribution($user,$distributionAmount);

        $this->customerRepository->levelIncomeDistribution($user,$distributionAmount);
    }

    public function distributeOrder($orderId) {
        

        $order = $this->customerRepository->getOrderById($orderId);
        
        if($order->paid == 1) {
            return redirect('/thankyou/'.$orderId);
        }
        
        
        if($order->status=='Process') {
            $data_to_store = ['status'=>'Pending','paid'=>1];
            if($order->amount==129800) {
                $data_to_store['status'] = 'Accepted';
            }
            $this->customerRepository->updateOrder($orderId,$data_to_store);
            
            // $data = [
            //     'order_id'=>$order->id,
            //     'cust_id' => $order->user_id,
            //     'how_to_pay'=>'razorpay',
            //     'comm_dis'=>$order->comm_dis,
            //     'reward_point'=>$order->reward,
            // ];
            // $this->apiCall($data);

            
            $user = $this->customerRepository->getUserModelById($order->user_id);
            $this->distribution($user,$order->comm_dis);

            $user->decrement('reward_wallet',$order->reward);
            
        }
        return redirect('/thankyou/'.$orderId);
        
    }
    
    public function callback($orderId,Request $request) {

        //return redirect('/thankyou/'.$orderId);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $order = $this->customerRepository->getOrderById($orderId);
        
        if($order->paid == 1) {
            return redirect('/thankyou/'.$orderId);
        }
         
        $orderData = $api->order->fetch($order->spl_note);
        if(!$orderData) {
            return redirect('/thankyou/'.$orderId);
        }

        $status = $orderData->status;
        if($status == 'paid') {
            if($order->status=='Process' && $order->how_to_pay == 'Razorpay') {
                $data_to_store = ['status'=>'Pending','paid'=>1];
                if($orderData['amount']==129800) {
                    $data_to_store['status'] = 'Accepted';
                }
                $this->customerRepository->updateOrder($orderId,$data_to_store);
                
                // $data = [
                //     'order_id'=>$order->id,
                //     'cust_id' => $order->user_id,
                //     'how_to_pay'=>'razorpay',
                //     'comm_dis'=>$order->comm_dis,
                //     'reward_point'=>$order->reward,
                // ];
                // $this->apiCall($data);

                $user = auth()->user();
                
                $this->distribution($user,$order->comm_dis);

                $user->decrement('reward_wallet',$order->reward);
                
            }
            return redirect('/thankyou/'.$orderId);
        }

        return redirect('checkout');


        //$payment = $api->payment->fetch('pay_LRPBZhhCFVYZN3');
        echo '<pre>'; print_r($data); die;
        dd($data);
        $input = $request->all();
        $data_to_store = [
            'data'=> json_encode($input)
        ];
        $this->customerRepository->storeReponse($data_to_store);
        //echo '<pre>'; print_r($request->all()); die;

        if ($request->isMethod('POST')) {

                $success = true;
                $error = "Payment Failed";

                if ($request->has('razorpay_payment_id'))
                {
                    $razorpay_payment_id = $request->input('razorpay_payment_id');
                    $payment = $api->payment->fetch($razorpay_payment_id);
                    if($payment['status'] != 'captured') {
                        $data_to_store = [
                            'status'=>'F',
                            'response'=>json_encode($payment)
                        ];
                        $this->customerRepository->updatePayment($razorpay_payment_id,$data_to_store);
                        $this->customerRepository->updateOrder($orderId,['status'=>'Failed']);
                        $success = false;
                    }

                    $data_to_store = [
                        'user_id'=>Auth::user()->id,
                        'order_id'=>$orderId,
                        'payment_id' => $razorpay_payment_id,
                        'amount'=>$payment['amount'],
                    ];
                    $this->customerRepository->addPayment($data_to_store);
                } else {
                    $this->customerRepository->updateOrder($orderId,['status'=>'Failed']);
                    $success = false;
                }

                if ($success === true)
                {
                    $data_to_store = [
                        'status'=>'S',
                    ];
                    $this->customerRepository->updatePayment($razorpay_payment_id,$data_to_store);

                    $order = $this->customerRepository->getOrderById($orderId);

                    if($order->status=='Process') {
                        $data_to_store = ['status'=>'Pending','paid'=>1];
                        if($payment['amount']==129800) {
                            $data_to_store['status'] = 'Accepted';
                        }
                        $this->customerRepository->updateOrder($orderId,$data_to_store);
                        
                        $data = [
                            'order_id'=>$order->id,
                            'cust_id' => $order->user_id,
                            'how_to_pay'=>'razorpay',
                            'comm_dis'=>$order->comm_dis,
                            'reward_point'=>$order->reward,
                        ];
                        $this->apiCall($data);

                        // $user = auth()->user();
                        
                        // $this->distribution($user,$order->comm_dis);

                        // $user->decrement('reward_wallet',$order->reward);
                        
                    }
                    return redirect('/thankyou/'.$orderId);
                } 
        }       
    }

    public function distribution($user,$distribution_amount) {
            $total_sbv = $user->sbv + $distribution_amount;

            if($total_sbv >= 20 && $user->consume == 0) {
                $this->first_level_income($user->direct_customer_id,$user->id);
                $user->consume = 1;
                $user->user_level = 1;
                $user->package_used = date('Y-m-d H:i:s');
            }

            if($total_sbv >= 100) {
                if($user->user_level < 2) {
                    $user->user_level = 2;
                    $this->customerRepository->incrementDirect($user->direct_customer_id);
                    $this->upgradeAccountToTop($user->id);
                    $this->customerRepository->updateHoldIncome($user->id,1);

                    $level = 1;
                    $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
                    $upgradeLevel = pow(2,$level);
                    if($count >= $upgradeLevel && $user->user_level <= $level+1) {
                        $this->customerRepository->updateHoldIncome($user->id,$level+1);
                        $this->upgradeAccountToTop($user->id,$level+1);
                        $user->user_level = $level + 2;
                    }
                    $level = 2;
                    $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
                    $upgradeLevel = pow(2,$level);
                    if($count >= $upgradeLevel && $user->user_level <= $level+1) {
                        $this->customerRepository->updateHoldIncome($user->id,$level+1);
                        $this->upgradeAccountToTop($user->id,$level+1);
                        $user->user_level = $level + 2;
                    }
                    $level = 3;
                    $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
                    $upgradeLevel = pow(2,$level);
                    if($count >= $upgradeLevel && $user->user_level <= $level+1) {
                        $this->customerRepository->updateHoldIncome($user->id,$level+1);
                        $this->upgradeAccountToTop($user->id,$level+1);
                        $user->user_level = $level + 2;
                    }
                    $level = 4;
                    $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
                    $upgradeLevel = pow(2,$level);
                    if($count >= $upgradeLevel && $user->user_level <= $level+1) {
                        $this->customerRepository->updateHoldIncome($user->id,$level+1);
                        $this->upgradeAccountToTop($user->id,$level+1);
                        $user->user_level = $level + 2;
                    }
                    $level = 5;
                    $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
                    $upgradeLevel = pow(2,$level);
                    if($count >= $upgradeLevel && $user->user_level <= $level+1) {
                        $this->customerRepository->updateHoldIncome($user->id,$level+1);
                        $this->upgradeAccountToTop($user->id,$level+1);
                        $user->user_level = $level + 2;
                    }
                    $level = 6;
                    $count = $this->customerRepository->getUserTeamLevel($user->id,$level);
                    $upgradeLevel = pow(2,$level);
                    if($count >= $upgradeLevel && $user->user_level <= $level+1) {
                        $this->customerRepository->updateHoldIncome($user->id,$level+1);
                        $this->upgradeAccountToTop($user->id,$level+1);
                        $user->user_level = $level + 2;
                    }

                    
                }
                
                $sponsorData = $this->customerRepository->getUserByCustomerId($user->direct_customer_id);
                if($sponsorData->direct >= 10 && $sponsorData->booster == 0) {
                    $this->customerRepository->updateUser($sponsorData->id,array('booster'=>1));
                }
                elseif($sponsorData->direct >= 15 && $sponsorData->booster == 1) {
                    $this->customerRepository->updateUser($sponsorData->id,array('booster'=>2));
                }
            }
            $user->save();
    }

    function first_level_income($direct_customer_id,$cust_id) {
		$p = 0;
		$dis_level = 1;
		$dis_income = array(5,4,2,2,1,1,1);
		while($p<6) {
			$direct_user = $this->customerRepository->getUserByCustomerId($direct_customer_id);
				if(!empty($direct_user)) {
						$data_to_store = array(
								'user_id' => $direct_user->id,
								'type' => 'Level Income',
								'pay_level' => $dis_level,
								'amount' => $dis_income[$p],
								'status' => 'Active',
								'user_send_by' => $cust_id
						);
						$this->customerRepository->addIncome($data_to_store);
						$p++;
						$dis_level++;
						$direct_customer_id = $direct_user->direct_customer_id;
				} else { $p = 40; }
			}
	}

    function apiCall($data) {
        
        $type ='POST';
        $url = url('../main-admin/network-distribution');
        $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type
            ));
            if($type=='POST' && !empty($data)) {
            	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            }
		$response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        
        $product = $this->customerRepository->findById($id);
        
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total'] = $cart[$id]['p_d_price']*$cart[$id]['quantity'];
            $cart[$id]['coin'] = $product->comm_dis*$cart[$id]['quantity'];
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->pname,
                "cost" => $product->cost,
                "reward" => $product->reward,
                "price" => $product->p_d_price,
                "quantity" => 1,
                "tax" => $product->t_class,
                "shipping" => $product->delivery_charge,
                "coin" => $product->comm_dis,
                "total" => $product->p_d_price,
                "image" => asset('../main-admin/images/product/'.$product->image)
            ];
        } 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {   
        $id = $request->id;
        $product = $this->customerRepository->findById($id);
        if($product->p_qty <= 0) {
            return response()->json([
                'status' => false,
                'message' => 'Stock not available'
            ]);
        }
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            $cart[$id]['total'] = $product->p_d_price*$request->quantity;
            $cart[$id]['reward'] = $product->reward*$request->quantity;
            $cart[$id]['coin'] = $product->comm_dis*$request->quantity;
            if($request->quantity <= 0) {
                unset($cart[$id]);
            }
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->pname,
                "cost" => $product->cost,
                "reward" => $product->reward,
                "price" => $product->p_d_price,
                "quantity" => 1,
                "tax" => $product->t_class,
                "shipping" => $product->delivery_charge,
                "coin" => $product->comm_dis,
                "total" => $product->p_d_price,
                "image" => asset('../main-admin/images/product/'.$product->image)
            ];
        }
        session()->put('cart', $cart);

        return response()->json([
            'status' => true,
            'message' => 'Item Successfully added to your cart'
        ]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cartCount()
    {
        $cart = session()->get('cart');
        if(!$cart) {
            $message = 0;
        } else {
            $message = array_sum(array_column($cart,'quantity'));
        }
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }

    /**
     * Fetch category details.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryDetails()
    {
        $slug = request()->get('category-slug');

        if (! $slug) {
            abort(404);
        }

        switch ($slug) {
            case 'new-products':
            case 'featured-products':
                $count = request()->get('count');

                if ($slug == 'new-products') {
                    $products = $this->velocityCustomerRepository->getNewProducts($count);
                } else if ($slug == 'featured-products') {
                    $products = $this->velocityCustomerRepository->getFeaturedProducts($count);
                }

                $response = [
                    'status'   => true,
                    'products' => $products->map(function ($product) {
                        if (core()->getConfigData('catalog.products.homepage.out_of_stock_items')) {
                            return $this->velocityHelper->formatProduct($product);
                        } else {
                            if ($product->isSaleable()) {
                                return $this->velocityHelper->formatProduct($product);
                            }
                        }
                    })->reject(function ($product) {
                        return is_null($product);
                    })->values(),
                ];

                break;
            default:
                $categoryDetails = $this->categoryRepository->findByPath($slug);

                if ($categoryDetails) {
                    $list = false;
                    $customizedProducts = [];
                    $products = $this->customerRepository->getAll($categoryDetails->id);

                    foreach ($products as $product) {
                        $productDetails = [];

                        $productDetails = array_merge($productDetails, $this->velocityHelper->formatProduct($product));

                        array_push($customizedProducts, $productDetails);
                    }

                    $response = [
                        'status'           => true,
                        'list'             => $list,
                        'categoryDetails'  => $categoryDetails,
                        'categoryProducts' => $customizedProducts,
                    ];
                }

                break;
        }

        return $response ?? [
            'status' => false,
        ];
    }

    /**
     * Fetch categories.
     *
     * @return array
     */
    public function fetchCategories()
    {
        $formattedCategories = [];

        $categories = $this->categoryRepository->getVisibleCategoryTree(core()->getCurrentChannel()->root_category_id);

        foreach ($categories as $category) {
            $formattedCategories[] = $this->getCategoryFilteredData($category);
        }

        return [
            'categories' => $formattedCategories,
        ];
    }

    /**
     * Fetch fancy category.
     *
     * @param  string  $slug
     * @return array
     */
    public function fetchFancyCategoryDetails($slug)
    {
        $categoryDetails = $this->categoryRepository->findByPath($slug);

        if ($categoryDetails) {
            $response = [
                'status'          => true,
                'categoryDetails' => $this->getCategoryFilteredData($categoryDetails),
            ];
        }

        return $response ?? [
            'status' => false,
        ];
    }

    /**
     * Get wishlist.
     *
     * @return \Illuminate\View\View
     */
    public function getWishlistList()
    {
        return view($this->_config['view']);
    }

    /**
     * This function will provide the count of wishlist and comparison for logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getItemsCount()
    {
        if ($customer = auth()->guard('customer')->user()) {

            if (! core()->getConfigData('catalog.products.homepage.out_of_stock_items')) {
                $wishlistItemsCount = $this->wishlistRepository->getModel()
                    ->leftJoin('products as ps', 'wishlist.product_id', '=', 'ps.id')
                    ->leftJoin('product_inventories as pv', 'ps.id', '=', 'pv.product_id')
                    ->where(function ($qb) {
                        $qb
                            ->WhereIn('ps.type', ['configurable', 'grouped', 'downloadable', 'bundle', 'booking'])
                            ->orwhereIn('ps.type', ['simple', 'virtual'])->where('pv.qty', '>', 0);
                    })
                    ->where('wishlist.customer_id', $customer->id)
                    ->where('wishlist.channel_id', core()->getCurrentChannel()->id)
                    ->count('wishlist.id');
            } else {
                $wishlistItemsCount = $this->wishlistRepository->count([
                    'customer_id' => $customer->id,
                    'channel_id'  => core()->getCurrentChannel()->id,
                ]);
            }

            $comparedItemsCount = $this->compareProductsRepository->count([
                'customer_id' => $customer->id,
            ]);

            $response = [
                'status'                  => true,
                'compareProductsCount'    => $comparedItemsCount,
                'wishlistedProductsCount' => $wishlistItemsCount,
            ];
        }

        return response()->json($response ?? [
            'status' => false,
        ]);
    }

    /**
     * This method will provide details of multiple product.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetailedProducts()
    {
        if ($items = request()->get('items')) {
            $moveToCart = request()->get('moveToCart');

            $productCollection = $this->velocityHelper->fetchProductCollection($items, $moveToCart);

            $response = [
                'status'   => 'success',
                'products' => $productCollection,
            ];
        }

        return response()->json($response ?? [
            'status' => false,
        ]);
    }

    /**
     * This method will fetch products from category.
     *
     * @param  int  $categoryId
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategoryProducts($categoryId)
    {
        /* fetch category details */
        $categoryDetails = $this->categoryRepository->find($categoryId);

        /* if category not found then return empty response */
        if (! $categoryDetails) {
            return response()->json([
                'products'       => [],
                'paginationHTML' => '',
            ]);
        }

        /* fetching products */
        $products = $this->customerRepository->getAll($categoryId);
        $products->withPath($categoryDetails->slug);

        /* sending response */
        return response()->json([
            'products'       => collect($products->items())->map(function ($product) {
                return $this->velocityHelper->formatProduct($product);
            }),
            'paginationHTML' => $products->appends(request()->input())->links()->toHtml(),
        ]);
    }

    /**
     * Get category filtered data.
     *
     * @param  \Webkul\Category\Contracts\Category  $category
     * @return array
     */
    private function getCategoryFilteredData($category)
    {
        $formattedChildCategory = [];

        foreach ($category->children as $child) {
            $formattedChildCategory[] = $this->getCategoryFilteredData($child);
        }

        return [
            'id'                => $category->id,
            'slug'              => $category->slug,
            'name'              => $category->name,
            'children'          => $formattedChildCategory,
            'category_icon_url' => $category->category_icon_url,
            'image_url'         => $category->image_url,
        ];
    }
}
