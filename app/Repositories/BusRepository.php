<?php

namespace App\Repositories;


use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
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

class BusRepository extends BaseRepository
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
        $order->total_amount = array_sum(array_column($cart,'total'));
        $order->comm_dis = array_sum(array_column($cart,'coin'));
        $order->reward = array_sum(array_column($cart,'reward'));
        $order->shipping = array_sum(array_column($cart,'shipping'));
        $order->save();
        
        if ($cart) {
            foreach($cart as $value) {
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $value['id'];
                $orderItem->cost = $value['cost'];
                $orderItem->reward = $value['reward'];
                $orderItem->price = $value['price'];
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

    public function getCategory(): Collection
    {
        return Category::where('status', 'active')
            ->limit(8)
            ->get();
    }

    public function addPayment($data)
    {
        return DB::table('payments')->insertGetId($data);
    }

    public function updateUser($id,$data)
    {
        return DB::table('customer')->where('id',$id)->update($data);
    }

    public function updatePayment($id,$data)
    {
        return DB::table('payments')->where('id',$id)->update($data);
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
            ->get();
    }

    public function getLowestPriceProduct(): Collection
    {
        return Product::where('status', 'active')
            ->orderBy('price', 'ASC')
            ->limit(20)
            ->get();
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
}
