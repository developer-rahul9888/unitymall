<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

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
class OrderItem extends Model
{
	protected $table = 'order_items';
	public $timestamps = false;

	protected $dates = [
		'rdate'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'cost',
		'reward',
		'price',
		'quantity',
		'tax',
		'coin',
		'shipping',
		'rdate',
	];

	public function product(){
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
