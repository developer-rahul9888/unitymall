<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RewardIncome
 * 
 * @property int $id
 * @property string $user_id
 * @property float $old_pair
 * @property float $cur_pair
 * @property float $amount
 * @property float $tds
 * @property float $admin
 * @property float $net_income
 * @property int $user_send_by
 * @property int $sale_type
 * @property int $order_id
 * @property Carbon $c_date
 * @property float $pay_date
 * @property int $status
 *
 * @package App\Models
 */
class RewardIncome extends Model
{
	protected $table = 'reward_income';
	public $timestamps = false;

	protected $casts = [
		'old_pair' => 'float',
		'cur_pair' => 'float',
		'amount' => 'float',
		'tds' => 'float',
		'admin' => 'float',
		'net_income' => 'float',
		'user_send_by' => 'int',
		'sale_type' => 'int',
		'order_id' => 'int',
		'pay_date' => 'float',
		'status' => 'int'
	];

	protected $dates = [
		'c_date'
	];

	protected $fillable = [
		'user_id',
		'old_pair',
		'cur_pair',
		'amount',
		'tds',
		'admin',
		'net_income',
		'user_send_by',
		'sale_type',
		'order_id',
		'c_date',
		'pay_date',
		'status'
	];
}
