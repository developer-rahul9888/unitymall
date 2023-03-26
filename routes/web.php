<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\CartController;
use App\Http\Controllers\Shop\ComparisonController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\Shop\BusController;
use App\Http\Controllers\Shop\UserController;
use App\Http\Controllers\Shop\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CronJobController;
use App\Http\Controllers\RazorpayPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () { return view('welcome'); });



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('cron-job', [CronJobController::class, 'callback'])->name('cron');

Route::any('/member-login', [AuthController::class, 'member_login'])->name('member.login');
Route::any('/login', [AuthController::class, 'login'])->name('login');
Route::any('/register/{referralCode?}', [AuthController::class, 'register'])->name('register');
Route::any('referral-user', [AuthController::class, 'referralUser'])->name('referral.user');

Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');


Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])->name('refund_policy');
Route::get('/terms-of-use', [HomeController::class, 'termsOfUse'])->name('terms_of_use');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/payment-privacy', [HomeController::class, 'paymentPrivacy'])->name('payment_privacy');
Route::get('/shipping-policy', [HomeController::class, 'shippingPolicy'])->name('shipping_policy');


Route::get('/product-details/{slug}', [ShopController::class, 'fetchProductDetails'])->name('shop.product');
Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');
Route::get('product', [ShopController::class, 'product'])->name('product');
Route::get('points', [ShopController::class, 'points'])->name('points');
Route::get('product-test', [ShopController::class, 'product_test'])->name('product.test');
Route::get('category/{categoryId}', [ShopController::class, 'category'])->name('category');
Route::any('search/{keyword?}', [ShopController::class,'search'])->name('search');
Route::any('ajax-search/{keyword?}', [ShopController::class,'ajax_search'])->name('ajax.search');
Route::get('cart', [ShopController::class, 'cart'])->name('cart');
Route::get('cart-count', [ShopController::class, 'cartCount'])->name('cart.count');
Route::any('checkout', [ShopController::class, 'checkout'])->name('checkout');

Route::any('membership', [ShopController::class, 'membership'])->name('membership');

Route::any('thankyou/{orderId}', [ShopController::class, 'thankyou'])->name('thankyou');
Route::any('order-tracking', [ShopController::class, 'order_tracking'])->name('order.tracking');

Route::any('pay/{orderId}', [ShopController::class, 'pay'])->name('pay');
Route::any('callback/{orderId}', [ShopController::class, 'callback'])->name('callback');
Route::any('postback', [ShopController::class, 'postBack'])->name('postback');


Route::any('online-store', [ShopController::class, 'onlineStore'])->name('online.store');
Route::any('online-store-search/{keyword?}', [ShopController::class, 'ajaxWebStoreSearch'])->name('online.store.search');
Route::any('redirecting/{storeId}', [ShopController::class, 'redirecting'])->name('online.redirecting')->middleware('auth');
Route::get('distribute-order/{orderId}', [ShopController::class, 'distributeOrder'])->name('distribute.order');


Route::any('bus/search', [BusController::class, 'index'])->name('bus.search');
Route::any('bus/ajax-search/{keyword?}', [BusController::class,'ajax_search'])->name('bus.ajax.search');
Route::any('bus/list', [BusController::class, 'busList'])->name('bus.list');

Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');

Route::group(['namespace' => 'User', 'prefix' => 'user','middleware' => 'auth'], function() {
    Route::any('/', [UserController::class, 'index'])->name('dashboard');
    Route::any('/recent-clicks', [UserController::class, 'myRecentClicks'])->name('recentclicks');
    Route::any('/orders', [UserController::class, 'orders'])->name('orders');
    Route::get('cancel-order/{orderId}', [UserController::class, 'cancelOrder'])->name('order.cancel');
    Route::any('/invoice/{invoiceId}', [UserController::class, 'invoice'])->name('invoice');
    Route::any('/address', [UserController::class, 'address'])->name('address');
    Route::any('/payment', [UserController::class, 'payment'])->name('payment');
    Route::any('/wishlist', [UserController::class, 'wishlist'])->name('wishlist');
    Route::any('/security', [UserController::class, 'security'])->name('security');
    Route::any('/order/{orderId}', [UserController::class, 'order_view'])->name('order.view');
    Route::any('/profile', [UserController::class, 'profile'])->name('profile');
    Route::any('/profile/edit', [UserController::class, 'profileEdit'])->name('profile.edit');
    Route::any('/kyc/edit', [UserController::class, 'kycEdit'])->name('kyc.edit');
    Route::any('/bank/edit', [UserController::class, 'bankEdit'])->name('bank.edit');
    Route::any('/password', [UserController::class, 'password'])->name('profile.password');
    Route::any('/logout', [UserController::class, 'logout'])->name('logout');
});


Route::fallback(function () { return redirect()->home(); });