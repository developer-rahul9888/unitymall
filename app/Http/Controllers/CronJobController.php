<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CronJobRepository;
use App\Mail\Register;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use DB;

class CronJobController extends Controller
{
    

    /**
     * Search repository instance.
     *
     * @var \Webkul\Core\Repositories\CronJobRepository
     */
    protected $cronJobRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository  $sliderRepository
     * @param  \Webkul\Product\Repositories\SearchRepository  $searchRepository
     * @return void
     */
    public function __construct(CronJobRepository $cronJobRepository) {
        $this->cronJobRepository = $cronJobRepository;
    }


    public function callback(Request $request) {

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $orders = $this->cronJobRepository->getAllPendingOrders();
        //echo count($orders); die;
        dd($orders);
        $orders->map(function ($order) {
            $orderId = $order->id;
            $orderData = $api->order->fetch($order->spl_note);
            if($orderData) {
                $status = $orderData->status;
                if($status == 'paid') {
                    if($order->status=='Process') {
                        $data_to_store = ['status'=>'Pending','paid'=>1];
                        if($orderData['amount']==129800) {
                            $data_to_store['status'] = 'Accepted';
                        }
                        $this->cronJobRepository->updateOrder($orderId,$data_to_store);
                        
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
                }
            }
            
        });   
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

}
