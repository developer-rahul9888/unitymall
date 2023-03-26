<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StoreVoucher
 * 
 * @property int $id
 * @property int $user_id
 * @property int $voucher_id
 * @property string $image
 * @property string $pname
 * @property string $title
 * @property int $price
 * @property int $quantity
 * @property string $products
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class StoreVoucher extends Model
{
	protected $table = 'store_voucher';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'voucher_id' => 'int',
		'price' => 'int',
		'quantity' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'user_id',
		'voucher_id',
		'image',
		'pname',
		'title',
		'price',
		'quantity',
		'products',
		'status',
		'date'
	];
}
