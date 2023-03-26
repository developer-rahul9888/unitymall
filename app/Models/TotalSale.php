<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TotalSale
 * 
 * @property int $id
 * @property int $user_id
 * @property float $gtotal
 * @property Carbon $rdate
 * @property int $bv
 * @property string $products
 * @property float $before_tax_amount
 * @property float $discount
 * @property int $wallet_credit
 * @property string $customer
 * @property string $payment_type
 * @property string $slip_no
 * @property float $total_gst
 * @property Carbon $tdate
 * @property int $center_id
 * @property int $pin_bill
 *
 * @package App\Models
 */
class TotalSale extends Model
{
	protected $table = 'total_sale';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'gtotal' => 'float',
		'bv' => 'int',
		'before_tax_amount' => 'float',
		'discount' => 'float',
		'wallet_credit' => 'int',
		'total_gst' => 'float',
		'center_id' => 'int',
		'pin_bill' => 'int'
	];

	protected $dates = [
		'rdate',
		'tdate'
	];

	protected $fillable = [
		'user_id',
		'gtotal',
		'rdate',
		'bv',
		'products',
		'before_tax_amount',
		'discount',
		'wallet_credit',
		'customer',
		'payment_type',
		'slip_no',
		'total_gst',
		'tdate',
		'center_id',
		'pin_bill'
	];
}
