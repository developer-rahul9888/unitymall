<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $user_id
 * @property string $p_name
 * @property string $p_email
 * @property string $p_phone
 * @property string $p_address
 * @property string $p_address2
 * @property string $p_city
 * @property string $p_state
 * @property int $p_zip
 * @property string $items
 * @property string $spl_note
 * @property string|null $coupon
 * @property string|null $coupon_val
 * @property string $how_to_pay
 * @property string $shipping
 * @property string $tax
 * @property string $total_amount
 * @property string $status
 * @property string $comm_dis
 * @property Carbon $o_date
 * @property string $emi
 * @property string $emi_info
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'p_zip' => 'int'
	];

	protected $dates = [
		'o_date'
	];

	protected $fillable = [
		'p_name',
		'p_email',
		'p_phone',
		'p_address',
		'p_address2',
		'p_city',
		'p_state',
		'p_zip',
		'items',
		'spl_note',
		'coupon',
		'coupon_val',
		'how_to_pay',
		'shipping',
		'tax',
		'total_amount',
		'status',
		'comm_dis',
		'reward',
		'o_date',
		'emi',
		'emi_info',
		'paid'
	];

	public function orderItems(){
		$orders = $this->hasMany(OrderItem::class, 'order_id', 'id');
		return $orders;
	}
}
