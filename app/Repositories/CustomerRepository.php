<?php

namespace App\Repositories;


use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Webstore;
use App\Models\Workwith;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Auth;


/**
 * Class UserRepository
 * @package App\Repositories
 * @version June 30, 2021, 7:13 am UTC
*/

class CustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'pname',
        'status',
        'comm_dis',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    public function placeOrder($data)
    {
        
        $cart = session()->get('cart');
        $order = new Order;
        $order->p_name = $data['f_name'].' '.$data['l_name'];
        $order->user_id = Auth::user()->id;
        $order->p_email = $data['email'];
        $order->p_phone = $data['phone'];
        $order->p_address = $data['address'];
        $order->p_city = $data['city'];
        $order->p_state = $data['state'];
        $order->p_zip = $data['zipcode'];
        $order->status = $data['status'];
        $order->transaction_id = $data['transaction_id'];
        $order->total_amount = array_sum(array_column($cart,'total')) + array_sum(array_column($cart,'shipping'));
        $order->comm_dis = array_sum(array_column($cart,'coin'));
        $order->reward = array_sum(array_column($cart,'reward'));
        $order->shipping = array_sum(array_column($cart,'shipping'));
        $order->save();
        
        if ($cart) {
            foreach($cart as $value) {
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $value['id'];
                $orderItem->product_title = $value['name'];
                $orderItem->product_image = $value['image'];
                $orderItem->price = $value['price'];
                $orderItem->reward = $value['reward'];
                $orderItem->cost = $value['cost'];
                $orderItem->quantity = $value['quantity'];
                $orderItem->tax = $value['tax'];
                $orderItem->shipping = $value['shipping'];
                $orderItem->coin = $value['coin'];
                $orderItem->total = $value['total'];
                $orderItem->save();
            }
        }
        return $order;
    }

    public function placeMembershipOrder($data,$cart)
    {
        $order = new Order;
        $order->p_name = $data['f_name'].' '.$data['l_name'];
        $order->user_id = Auth::user()->id;
        $order->p_email = $data['email'];
        $order->p_phone = $data['phone'];
        $order->p_address = $data['address'];
        $order->p_city = $data['city'];
        $order->p_state = $data['state'];
        $order->p_zip = $data['zipcode'];
        $order->status = $data['status'];
        $order->transaction_id = $data['transaction_id'];
        $order->total_amount = $cart['total'] + $cart['shipping'];
        $order->comm_dis = $cart['coin'];
        $order->reward = $cart['reward'];
        $order->shipping = $cart['shipping'];
        $order->save();
        
        if ($cart) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cart['id'];
            $orderItem->product_title = $cart['name'];
            $orderItem->product_image = $cart['image'];
            $orderItem->price = $cart['price'];
            $orderItem->reward = $cart['reward'];
            $orderItem->cost = $cart['cost'];
            $orderItem->quantity = $cart['quantity'];
            $orderItem->tax = $cart['tax'];
            $orderItem->shipping = $cart['shipping'];
            $orderItem->coin = $cart['coin'];
            $orderItem->total = $cart['total'];
            $orderItem->save();
        }
        return $order;
    }
    
    public function getMyRecentClicks() {
        return Workwith::where('user_id',Auth::user()->id)
        ->get();
    }

    public function getCategory(): Collection
    {
        return Category::where('status', 'active')
            //->limit(8)
            ->get();
    }

    public function addPayment($data)
    {
        return DB::table('payments')->insertGetId($data);
    }

    public function getPopup()
    {
        return DB::table('popup')->where('status','active')->first();
    }

    public function addclick($data)
    {
        return DB::table('clicks')->insert($data);
    }

    public function addTransactionWallet($data)
    {
        return DB::table('transaction_wallet')->insert($data);
    }

    public function updateUser($id,$data)
    {
        return DB::table('customer')->where('id',$id)->update($data);
    }

    public function getUserById($id)
    {
        return DB::table('customer')->find($id);
    }

    public function getUserModelById($id)
    {
        return Customer::find($id);
    }

    public function getAllActiveUser()
    {
        return DB::table('customer')
        ->where('user_level','>',1)
        //->where('customer_id','1386168787')
        ->orderBy('package_used','ASC')->get();
    }

    public function getUserByCustomerId($customerId)
    {
        return DB::table('customer')->where('customer_id',$customerId)->first();
    }

    public function incrementPoints($id,$points)
    {
        return DB::table('customer')->where('id',$id)->increment('points',$points);
    }

    public function incrementDirect($customerId)
    {
        return DB::table('customer')->where('customer_id',$customerId)->increment('direct');
    }

    public function getUserTeamLevel($userId,$level)
    {
        return DB::table('user_team_level')->where('user_id',$userId)->where('level',$level)->count();
    }

    public function getUserFromIdTeamLevel($userId,$fromId,$level)
    {
        return DB::table('user_team_level')->where('user_id',$userId)->where('from_id',$fromId)->where('level',$level)->count();
    }

    public function addUserTeamLevel($input)
    {
        return DB::table('user_team_level')->insert($input);
    }

    public function addIncome($input)
    {
        return DB::table('incomes')->insert($input);
    }

    public function getWebStores()
    {
        return DB::table('webstores')->where('web_status','active')->limit(20)->get();
    }

    public function updateOrder($id,$data)
    {
        return DB::table('orders')->where('id',$id)->update($data);
    }

    public function updatePayment($id,$data)
    {
        return DB::table('payments')->where('payment_id',$id)->update($data);
    }

    public function storeReponse($data)
    {
        return DB::table('response')->insert($data);
    }

    public function getOrderById($id)
    {
        return Order::with('orderItems')->where('id',$id)->first();
    }

    public function getSearchProduct($keyword,$skip,$limit) {
        $query =Product::Query();
        if($keyword) { $query->where('pname', 'LIKE','%'.$keyword.'%'); }
        $query->where('status','active');
        if (!is_null($skip)) {
            $query->skip($skip);
        }
        if (!is_null($limit)) {
            $query->limit($limit);
        }
        return ['data'=>$query->get(),'count'=>$query->count()];
    }

    public function getPointProduct($point,$skip,$limit) {
        $query =Product::Query();
        $query->where('comm_dis', '>=',$point);
        $query->where('status','active');
        if (!is_null($skip)) {
            $query->skip($skip);
        }
        if (!is_null($limit)) {
            $query->limit($limit);
        }
        return ['data'=>$query->get(),'count'=>$query->count()];
    }

    public function getOnlineStoreById($storeId) {

        return Webstore::where('id', $storeId)
            ->where('web_status', 'active')
            ->first();
    }

    public function getAllOnlineStore($skip,$limit) {
        $query = Webstore::Query();
        $query->where('web_status','active');
        if (!is_null($skip)) {
            $query->skip($skip);
        }
        if (!is_null($limit)) {
            $query->limit($limit);
        }
        return ['data'=>$query->get(),'count'=>$query->count()];
    }
    public function getgetAjaxSearchOnlineStore($keyword) {

        $query = Webstore::Query();
        if($keyword) { $query->where('web_name', 'LIKE','%'.$keyword.'%'); }
        $query->where('web_status','active');
        $query->limit(10);
        return $query->get();
    }

    public function getProductByCategory($categoryId,$skip,$limit) {
        $query =Product::Query();
        if($categoryId) { $query->where('category',$categoryId); }
        $query->where('status','active');
        if (!is_null($skip)) {
            $query->skip($skip);
        }
        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return ['data'=>$query->get(),'count'=>$query->count()];
    }

    public function getAjaxSearchProduct($keyword) {
        $query =Product::Query();
        if($keyword) { $query->where('pname', 'LIKE','%'.$keyword.'%'); }
        $query->where('status','active');
        return $query->get();
    }

    public function getHomeSlider()
    {
        return DB::table('gallery')->where(['visibility'=>'in','status'=>'active','type'=>'slider'])->get();
    }

    public function findBySlug($slug)
    {
        return Product::where('p_id', $slug)
            ->where('status', 'active')
            ->first();
    }

    public function totalProduct()
    {
        return Product::where('status', 'active')
            ->count();
    }

    public function findById(int $id)
    {
        return Product::where('id', $id)
            ->where('status', 'active')
            ->first();
    }

    public function getLatestProduct(): Collection
    {
        return Product::where('status', 'active')
            ->orderBy('id', 'DESC')
            ->limit(20)
            ->get()->shuffle();
    }

    public function getFeaturedProductRandom(): Collection
    {
        return Product::where('status', 'active')
        ->where('product_type',0)
        ->inRandomOrder()
            ->limit(20)
            ->get();
    }

    public function getLowestPriceProduct(): Collection
    {
        return Product::where('status', 'active')
            ->orderBy('price', 'ASC')
            ->limit(20)
            ->get()->shuffle();
    }

    

    

    public function getByOrganizationAndRole(int $organizationId, Request $request): Collection
    {
        $roleId    = $request->get('role_id');
        $orderBy   = $request->get('order');
        $direction = $request->get('dir');

        $users = User::with([
            'organizationRoles' => function (BelongsToMany $query) use ($organizationId) {
                $query
                    ->where('organization_id', $organizationId)
                    ->distinct()->get(['id','name']);
            },
            'activity'])
            ->whereHas('organizations', function (Builder $query) use ($organizationId, $roleId) {
                $query->where('organization_id', $organizationId);
                if (!is_null($roleId)) {
                    $query->where('role_id', $roleId);
                }
            });

        if (!is_null($orderBy)) {
            if ($orderBy == 'last_seen') {
                if (!is_null($direction)) {
                    $users->orderBy(UserActivity::select('last_seen')->whereColumn('users.id', 'user_activity.user_id'), $direction);
                } else {
                    $users->orderBy(UserActivity::select('last_seen')->whereColumn('users.id', 'user_activity.user_id'));
                }
            }
        }

        return $users->get(['id','user_first_name', 'user_last_name']);
    }

    public function getNameOnlyTeachersByOrganization($organizationIds): Collection
    {
        $user =  Auth::guard('api')->user();
        
        $roleTeacherId = Role::where('name', Role::ROLE_TEACHER)->value('id');
        
        $teachers = User::whereHas('organizations', function (Builder $query) use ($organizationIds, $roleTeacherId) {
            if (is_array($organizationIds)) {
                $query->whereIn('organization_id', $organizationIds);
            } else {
                $query->where('organization_id', $organizationIds);
            }

            if (!is_null($roleTeacherId)) {
                $query->where('role_id', $roleTeacherId);
            }
        });
        if($user->hasRole('Teacher')){
            $teachers->where('id', $user->id);
            }
        $teachers = $teachers->select(['id', 'user_first_name', 'user_last_name']);

        return $teachers->get();
    }

    public function getStudentsByCourseIds($courseIds, ?Request $request): Collection
    {
        $query = $this->queryByRequest($request);

        $query->rightJoin('student_courses as sc', 'sc.user_id', 'users.id');
        $query->rightJoin('user_organizations as org', 'org.user_id', 'users.id');
        $query->leftJoin('courses as c', 'c.id', 'sc.course_id');
        $query->whereIn('sc.course_id', $courseIds);
        $query->where('users.status',"1");
        $query->where('sc.approved_after_payment', true);
        $query->whereNotNull('sc.user_enrolled_date');
        $query->select([
            'users.id',
            'users.user_first_name',
            'users.user_last_name',
            'users.email',
            'c.course_name',
            'sc.course_id',
            'org.organization_id'
        ]);
        $query->with('activity:user_id,last_seen');

        return $query->get();
    }

    public function addRoi($data) {
        return DB::table('salary')->insert($data);
    }

    public function directGoldIncomeDistribution($user,$distributionAmount) {
        $customerId = $user->direct_customer_id;
        $parentUser = DB::table('customer')->where('customer_id',$customerId)->first();
        $directIncome = DB::table('incomes')->where('user_id',$parentUser->id)->where('type','Gold Direct Income')->sum('amount');
        if($directIncome <= 100000) { $directPercent = 7; }
        elseif($directIncome <= 250000) { $directPercent = 10; }
        elseif($directIncome <= 500000) { $directPercent = 12; }
        elseif($directIncome > 500000) { $directPercent = 15; }

        $levelIncome = ($directPercent/100)*$distributionAmount;
        $addIncome = [
            'user_id' => $parentUser->id,
            'amount' => floor($levelIncome*100)/100,
            'user_send_by' => $user->id,
            'type' => 'Gold Direct Income',
            'pay_level' => 1,
            'status' => 'Active',
            'c_date' => date('Y-m-d H:i:s')
        ];
        DB::table('incomes')->insert($addIncome);
    }

    public function levelIncomeDistribution($user,$distributionAmount) {
        $level = 21; $payLevel = 1;
        $levelIncome = [7,5,3,2,2,1,1,1,1,1];
        $directLevel = [1,2,3,4,5,6,7,8,9,10];
        $customerId = $user->direct_customer_id;
        for($p=0;$p < $level;$p++) {
            $parentUser = DB::table('customer')->where('customer_id',$customerId)->first();
            if(!$parentUser) { break; }
            if($parentUser->consume==0) { continue; }
            $levelPercent = $this->getLevelDistributionPercentage($payLevel);
            $levelIncome = ($levelPercent/100)*$distributionAmount;
            $addIncome = [
                'user_id' => $parentUser->id,
                'amount' => floor($levelIncome*100)/100,
                'user_send_by' => $user->id,
                'type' => 'Gold Level Income',
                'pay_level' => $payLevel,
                'status' => 'Active',
                'c_date' => date('Y-m-d H:i:s')
            ];
            if($user->direct >= $payLevel) {
                $addIncome['status'] = 'Active';
                DB::table('incomes')->insert($addIncome);
            }

            $payLevel++;
            $customerId = $parentUser->direct_customer_id;
        }
        return true;
    }

    public function getLevelDistributionPercentage($payLevel) {
        $levelPercent = 0;
        if($payLevel <=1) { $levelPercent = 7; }
        elseif($payLevel <=2) { $levelPercent = 5; }
        elseif($payLevel <=4) { $levelPercent = 3; }
        elseif($payLevel <=6) { $levelPercent = 2; }
        elseif($payLevel <=10) { $levelPercent = 1; }
        elseif($payLevel <=15) { $levelPercent = 0.5; }
        elseif($payLevel <=18) { $levelPercent = 0.25; }
        elseif($payLevel <=21) { $levelPercent = 0.1; }
        return $levelPercent;
    }

    public function getTempIncome() {
        return DB::table('incomes')->where('c_date','LIKE','%2023-03-14 20:18%')->get();
    }

    public function updateTempIncome($id,$input) {
        return DB::table('incomes')->where('id',$id)->update($input);
    }

    public function updateHoldIncome($custId,$level) {
        $points = DB::table('incomes')->where('user_id',$custId)->where('pay_level',$level)->where('status','Hold')->where('type','Upgrade Income')->sum('amount');
        if($points > 0) {
            DB::table('customer')->where('id',$custId)->increment('points',$points);
        }
        return DB::table('incomes')->where('user_id',$custId)->where('pay_level',$level)->where('status','Hold')->where('type','Upgrade Income')->update(['status'=>'Active']);
    }

    public function decrementPoints($id,$points)
    {
        return DB::table('customer')->where('id',$id)->decrement('points',$points);
    }

    public function storeResponse()
    {
        return DB::table('response')->insert(['data' => 'Test','type' => 'test']);
    }
}
