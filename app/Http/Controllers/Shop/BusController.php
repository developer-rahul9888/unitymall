<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\BusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;
use Validator;

class BusController extends Controller
{

    public function __construct(BusRepository $busRepository) {
        $this->busRepository = $busRepository;
    }

    public function index() {

        $categories = $this->busRepository->getCategory();
        return view('shop.bus',compact('categories'));
    }

    public function busList() {
        $categories = $this->busRepository->getCategory();
        return view('shop.bus-list',compact('categories'));
    }

    public function bus_api_call($url,$type,$data=array()) {
        $username  = 'captoretail';
        $password = 'CaptoRetail300';
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => $type
        ));
        if($type=='POST' && !empty($data)) {
          //echo '<pre>'; print_r($data);
          curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
          // Set the content type to application/json
          curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',"Cache-Control: no-cache"));
        }

        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt ($curl,CURLOPT_USERPWD,$username. ":". $password);
        
        $response = curl_exec($curl);
        curl_close($curl);
        //echo json_encode($data);
        return $response;
}

    public function ajax_search($keyword='',Request $request)
    {
        $url = 'http://test.etravelsmart.com/etsAPI/api/getStations';
        $response = $this->bus_api_call($url,"GET");
        $result = json_decode($response,true);
        $stations = $result['stationList'];

        $response = [];
        

        $result = array_filter($stations, function ($item) use ($keyword) {
            if (stripos($item['stationName'], $keyword) !== false) {
                return true;
            }
            return false;
        });

        if($result) {
            foreach($result as $key => $station) {
                $response[] = [
                    'id' => $key,
                    'name' => $station['stationName']
                ];
            }
        }

        //echo '<pre>'; print_r($result); die
        
        // if ($request->isMethod('POST')) {
        //     $keyword = $request->input('keyword');
        //     return redirect('/search/'.$keyword);
        // }
        //$productsData = $this->customerRepository->getAjaxSearchProduct($keyword);
        // $response[] = [
        //     'id' => '1',
        //     'name' => 'Mohali'
        // ];
        // $response[] = [
        //     'id' => '1',
        //     'name' => 'Chandigarh'
        // ];
        // if($productsData) {
        //     foreach($productsData as $product) {
                
        //         $response[] = [
        //             'p_id'=>$product->p_id,
        //             'name'=>$product->pname,
        //             'image'=>asset('../main-admin/images/product/'.$product->image),
        //             'price'=>$product->price-$product->reward
        //         ];
        //     }
        // }
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
        $productsData = $this->busRepository->getSearchProduct($keyword,$count,$limit);
        $products = $productsData['data'];
        $totalCount = $productsData['count'];
        $max = ceil($totalCount/$limit);
        $categories = $this->busRepository->getCategory();
        return view('shop.search',compact('products','max','page','limit','categories','totalCount'));
    }

    
}
