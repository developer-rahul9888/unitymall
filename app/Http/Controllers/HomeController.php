<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;


class HomeController extends Controller
{
    

    /**
     * Search repository instance.
     *
     * @var \Webkul\Core\Repositories\CustomerRepository
     */
    protected $CustomerRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Core\Repositories\SliderRepository  $sliderRepository
     * @param  \Webkul\Product\Repositories\SearchRepository  $searchRepository
     * @return void
     */
    public function __construct(CustomerRepository $CustomerRepository) {
        $this->customerRepository = $CustomerRepository;
    }

    /**
     * Loads the home page for the storefront.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = $this->customerRepository->getFeaturedProductRandom();
        $latestProducts = $this->customerRepository->getLatestProduct();
        $lowestPriceProducts = $this->customerRepository->getLowestPriceProduct();
        $categories = $this->customerRepository->getCategory();
        $sliders = $this->customerRepository->getHomeSlider();
        $webStores = $this->customerRepository->getWebStores();
        $popup = $this->customerRepository->getPopup();
        //$selling = $this->customerRepository->mostSellingProducts();
        //$categories = $this->customerRepository->getCategory();
        return view('shop.home', compact('products','latestProducts','lowestPriceProducts','categories','sliders','webStores','popup'));
    }

    public function about()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.about', compact('categories'));
    }

    public function contact()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.contact', compact('categories'));
    }

    public function refundPolicy()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.refund-policy', compact('categories'));
    }

    public function termsOfUse()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.terms-of-use', compact('categories'));
    }

    public function privacy()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.privacy', compact('categories'));
    }

    public function paymentPrivacy()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.payment-privacy', compact('categories'));
    }

    public function shippingPolicy()
    {
        $categories = $this->customerRepository->getCategory();
        return view('shop.shipping-policy', compact('categories'));
    }

    /**
     * Loads the home page for the storefront if something wrong.
     *
     * @return \Exception
     */
    public function notFound()
    {
        abort(404);
    }

    /**
     * Upload image for product search with machine learning.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return $this->searchRepository->uploadSearchImage(request()->all());
    }
}
