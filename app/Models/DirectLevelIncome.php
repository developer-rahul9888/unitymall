<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DirectLevelIncome
 * 
 * @property int $id
 * @property string $user_id
 * @property string $payby
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
class DirectLevelIncome extends Model
{
	protected $table = 'direct_level_income';
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
		'user_id',
		'payby',
		'amount',
		'tds',
		'admin',
		'net_income',
		'c_date',
		'pay_date',
		'status'
	];
}
