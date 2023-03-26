<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{

    public function __construct(CustomerRepository $CustomerRepository) {
        $this->customerRepository = $CustomerRepository;
    }


    public function index()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.dashboard',compact('categories'));
    }

    public function orders()
    {
        $categories = $this->customerRepository->getCategory();
        $orders = Auth::user()->orders()->where('status','!=','Process')->orderBy('id','desc')->get();
        return view('shop.admin.order',compact('orders','categories'));
    }

    public function cancelOrder($orderId,Request $request) {

        $orderData = auth()->user()->orders()->where('id',$orderId)->where('status','Pending')->first();
        if(!$orderData) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
        $orderData->status = 'Cancelled';
        $orderData->save();

        $dataToStore = [
            'user_id' => auth()->user()->id,
            'wallet_type' => 'Main Wallet',
            'amount' => $orderData->total_amount,
            'status' => 'Credit',
            'description' => 'Refund ( Order ID #'.$orderData->id.')',
            'rdate' => date('Y-m-d H:i:s')
        ];
        $this->customerRepository->addTransactionWallet($dataToStore);
        auth()->user()->increment('bliss_amount',$orderData->total_amount);
        return redirect('user/orders')->with('success', 'Order Cancel Successfully.');
    }

    public function myRecentClicks()
    {
        $categories = $this->customerRepository->getCategory();
        $clicks = Auth::user()->clicks()->orderBy('id','desc')->get();
        return view('shop.admin.my-recent-clicks',compact('clicks','categories'));
    }

    public function invoice($invoiceId)
    {
        $categories = $this->customerRepository->getCategory();
        $invoice = Order::with('orderItems')->where('id',$invoiceId)->where('user_id',Auth::user()->id)->first();
        //echo '<pre>'; print_r($invoice->toArray()); echo '</pre>';
        return view('shop.admin.invoice',compact('invoice','categories'));
    }
    public function address()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.address',compact('categories'));
    }
    public function payment()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.payment',compact('categories'));
    }
    public function wishlist()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.wishlist',compact('categories'));
    }
    public function security()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.security',compact('categories'));
    }
    public function profile()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.profile',compact('categories'));
    }

    public function password(Request $request)
    {
        if ($request->isMethod('POST')) {
            $rules = [
                'currentPassword' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ];
            $message = [
                'currentPassword.required' => 'Current password field is required.',
                'password.required' => 'New password field is required.',
            ];
            $validated = $request->validate($rules,$message);
            if(Auth::user()->pass_word != md5($request->input('currentPassword'))) {
                return redirect()->back()->withInput($request->all())->with('error', 'Incorrect old password.');
            }
            $store = [
                'pass_word'=>md5($request->input('password')),
            ];
            $this->customerRepository->updateUser(Auth::user()->id,$store);
            return redirect()->back()->with('success', 'Updated Successfully.');
        }
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.password',compact('categories'));
    }

    public function kycEdit(Request $request)
    {
        if ($request->isMethod('POST')) {

            $rules = [
                'pancard' => 'required',
                'aadhar' => 'required',
                'panimage' => 'mimes:png,jpg,jpeg|max:2048',
                'aadharimage' => 'mimes:png,jpg,jpeg|max:2048',
                'b_aadhar_img' => 'mimes:png,jpg,jpeg|max:2048',
            ];
            $message = [
                'pancard.required' => 'First Name is required.',
                'aadhar.required' => 'Last Name is required.',
            ];
            $validated = $request->validate($rules,$message);
            $panimage = $aadharimage = $b_aadhar_img = '';

            $store = [
                'pancard'=>$request->input('pancard'),
                'aadhar'=>$request->input('aadhar'),
            ];


            if($request->file('panimage')) {
                $name = $request->file('panimage')->getClientOriginalName();
                $panimage = $request->file('panimage')->getClientOriginalName();
                $extension = $request->file('panimage')->getClientOriginalExtension();
                $panimage = time() . '.'.$extension;
                $destinationPath = 'files/kyc';
                $request->file('panimage')->move($destinationPath, $panimage);
                $store['panimage'] = $panimage;
            }

            if($request->file('aadharimage')) {
                $name = $request->file('aadharimage')->getClientOriginalName();
                $aadharimage = $request->file('aadharimage')->getClientOriginalName();
                $extension = $request->file('aadharimage')->getClientOriginalExtension();
                $aadharimage = time() . '.'.$extension;
                $destinationPath = 'files/kyc';
                $request->file('aadharimage')->move($destinationPath, $aadharimage);
                $store['aadharimage'] = $aadharimage;
            }

            if($request->file('b_aadhar_img')) {
                $name = $request->file('b_aadhar_img')->getClientOriginalName();
                $b_aadhar_img = $request->file('b_aadhar_img')->getClientOriginalName();
                $extension = $request->file('b_aadhar_img')->getClientOriginalExtension();
                $b_aadhar_img = time() . '.'.$extension;
                $destinationPath = 'files/kyc';
                $request->file('b_aadhar_img')->move($destinationPath, $b_aadhar_img);
                $store['b_aadhar_img'] = $b_aadhar_img;
            }
            
            $this->customerRepository->updateUser(Auth::user()->id,$store);
            return redirect()->back()->withInput($request->all())->with('success', 'Updated Successfully.');
        }
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.kyc-edit',compact('categories'));
    }

    public function bankEdit(Request $request)
    {
        if ($request->isMethod('POST')) {

            $rules = [
                'bank_name' => 'required',
                'branch' => 'required',
                'account_type' => 'required',
                'account_no' => 'required',
                'ifsc' => 'required',
                'image' => 'mimes:png,jpg,jpeg|max:2048',
            ];
            $message = [
                'bank_name.required' => 'First Name is required.',
                'branch.required' => 'Last Name is required.',
                'account_type.required' => 'Last Name is required.',
                'account_no.required' => 'Last Name is required.',
                'ifsc.required' => 'Last Name is required.',
            ];
            $validated = $request->validate($rules,$message);
            $panimage = $aadharimage = $b_aadhar_img = '';

            $store = [
                'bank_name'=>$request->input('bank_name'),
                'branch'=>$request->input('branch'),
                'account_type'=>$request->input('account_type'),
                'account_no'=>$request->input('account_no'),
                'ifsc'=>$request->input('ifsc'),
            ];


            if($request->file('bank_img')) {
                $name = $request->file('bank_img')->getClientOriginalName();
                $bank_img = $request->file('bank_img')->getClientOriginalName();
                $extension = $request->file('bank_img')->getClientOriginalExtension();
                $bank_img = time() . '.'.$extension;
                $destinationPath = 'files/kyc';
                $request->file('bank_img')->move($destinationPath, $bank_img);
                $store['bank_img'] = $bank_img;
            }
            
            $this->customerRepository->updateUser(Auth::user()->id,$store);
            return redirect()->back()->withInput($request->all())->with('success', 'Updated Successfully.');
        }
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.bank-edit',compact('categories'));
    }

    public function profileEdit(Request $request)
    {
        if ($request->isMethod('POST')) {

            $rules = [
                'f_name' => 'required',
                'l_name' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'country' => 'required',
                'state' => 'required',
                'pincode' => 'required',
                'file' => 'mimes:png,jpg,jpeg|max:2048'
            ];
            $message = [
                'f_name.required' => 'First Name is required.',
                'l_name.required' => 'Last Name is required.',
                'gender.required' => 'Gender is required.',
                'dob.required' => 'Email is required.',
                'phone.required' => 'Country is required.',
                'email.required' => 'Address is required.',
                'country.required' => 'City is required.',
                'state.required' => 'State is required.',
                'pincode.required' => 'Pincode is required.',
            ];
            $validated = $request->validate($rules,$message);
            $picName = '';
            if($request->file('file')) {
                $name = $request->file('file')->getClientOriginalName();
                $picName = $request->file('file')->getClientOriginalName();
                $extension = $request->file('file')->getClientOriginalExtension();
                $picName = time() . '.'.$extension;
                $destinationPath = 'files';
                $request->file('file')->move($destinationPath, $picName);
            }
            $store = [
                'f_name'=>$request->input('f_name'),
                'l_name'=>$request->input('l_name'),
                'gender'=>$request->input('gender'),
                'dob'=>$request->input('dob'),
                'phone'=>$request->input('phone'),
                'email'=>$request->input('email'),
                'country'=>$request->input('country'),
                'address'=>$request->input('address'),
                'state'=>$request->input('state'),
                'pincode'=>$request->input('pincode'),
                'image' => $picName,
            ];
            $this->customerRepository->updateUser(Auth::user()->id,$store);
            return redirect()->back()->withInput($request->all())->with('success', 'Updated Successfully.');
        }
        $categories = $this->customerRepository->getCategory();
        return view('shop.admin.profile-edit',compact('categories'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
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
        return view('shop.product',compact('products','max','page','limit','categories'));
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
        return view('shop.single-product', compact('product'));
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('shop.cart');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
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


        return view('shop.product',compact('products','max','page','limit'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function checkout(Request $request)
    {   
        
        if ($request->isMethod('POST')) {
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
            $product = $this->customerRepository->placeOrder($request);
            session()->forget('cart');
            return redirect()->back()->with('success', 'Your rental request has been sent');
            
        }
        return view('shop.checkout');
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
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->pname,
                "cost" => $product->cost,
                "discount" => 0,
                "price" => $product->price,
                "quantity" => 1,
                "tax" => $product->t_class,
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
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            if($request->quantity <= 0) {
                unset($cart[$id]);
            }
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->pname,
                "cost" => $product->cost,
                "discount" => 0,
                "price" => $product->price,
                "quantity" => 1,
                "tax" => $product->t_class,
                "image" => asset('../main-admin/images/product/'.$product->image)
            ];
        }
        session()->put('cart', $cart);
        // if($request->id && $request->quantity){
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["quantity"] = $request->quantity;
        //     session()->put('cart', $cart);
        //     session()->flash('success', 'Cart updated successfully');
        // }
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
        return response()->json([
            'status' => true,
            'message' => array_sum(array_column($cart,'quantity')),
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
