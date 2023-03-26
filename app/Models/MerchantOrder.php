<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchantOrder
 * 
 * @property int $id
 * @property string $name
 * @property string $price
 * @property float $tax
 * @property int $mid
 * @property int $qty
 * @property string $image
 * @property string $desc
 * @property float $i_total
 * @property float $sub_total
 * @property int $order_id
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class MerchantOrder extends Model
{
	protected $table = 'merchant_order';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'tax' => 'float',
		'mid' => 'int',
		'qty' => 'int',
		'i_total' => 'float',
		'sub_total' => 'float',
		'order_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'id',
		'name',
		'price',
		'tax',
		'mid',
		'qty',
		'image',
		'desc',
		'i_total',
		'sub_total',
		'order_id',
		'status',
		'date'
	];
}
