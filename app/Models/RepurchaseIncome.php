<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RepurchaseIncome
 * 
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property int $matching
 * @property int $user_send_by
 * @property string $type
 * @property int $order_id
 * @property int $pay_level
 * @property string $description
 * @property int $status
 * @property Carbon $c_date
 *
 * @package App\Models
 */
class RepurchaseIncome extends Model
{
	protected $table = 'repurchase_income';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'amount' => 'float',
		'matching' => 'int',
		'user_send_by' => 'int',
		'order_id' => 'int',
		'pay_level' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'c_date'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'matching',
		'user_send_by',
		'type',
		'order_id',
		'pay_level',
		'description',
		'status',
		'c_date'
	];
}
