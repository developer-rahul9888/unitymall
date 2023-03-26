<?php

namespace App\Repositories;


use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Webstore;
use App\Models\Income;
use App\Models\Summary;
use App\Models\Pin;
use App\Models\Roi;
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

class CronJobRepository extends BaseRepository
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
        return Order::class;
    }

    public function getAllPendingOrders()
    {
        return DB::table('orders')->where('paid',0)->where('spl_note','<>','')->where('status','Process')->orderBy('o_date','DESC')->get();
    }

    public function getOrderById($id)
    {
        return Order::with('orderItems')->where('id',$id)->first();
    }

    public function updateOrder($id,$data)
    {
        return DB::table('orders')->where('id',$id)->update($data);
    }
}
