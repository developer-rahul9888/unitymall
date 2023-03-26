<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TurnoverIncome
 * 
 * @property int $id
 * @property string $income_type
 * @property string $type
 * @property string $user_id
 * @property float $amount
 * @property float $tds
 * @property float $admin
 * @property float $net_income
 * @property Carbon $c_date
 * @property Carbon $pay_date
 * @property bool $status
 *
 * @package App\Models
 */
class TurnoverIncome extends Model
{
	protected $table = 'turnover_income';
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'tds' => 'float',
		'admin' => 'float',
		'net_income' => 'float',
		'status' => 'bool'
	];

	protected $dates = [
		'c_date',
		'pay_date'
	];

	protected $fillable = [
		'income_type',
		'type',
		'user_id',
		'amount',
		'tds',
		'admin',
		'net_income',
		'c_date',
		'pay_date',
		'status'
	];
}
