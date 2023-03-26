<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DistributionAmount
 * 
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property int $user_id_send_by
 * @property int $pay_level
 * @property string $status
 * @property int $order_id
 * @property string $type
 * @property int $sale_type
 * @property string $description
 * @property Carbon $pay_date
 *
 * @package App\Models
 */
class DistributionAmount extends Model
{
	protected $table = 'distribution_amount';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'amount' => 'float',
		'user_id_send_by' => 'int',
		'pay_level' => 'int',
		'order_id' => 'int',
		'sale_type' => 'int'
	];

	protected $dates = [
		'pay_date'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'user_id_send_by',
		'pay_level',
		'status',
		'order_id',
		'type',
		'sale_type',
		'description',
		'pay_date'
	];
}
