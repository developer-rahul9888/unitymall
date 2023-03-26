<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamBussiness
 * 
 * @property int $id
 * @property int $user_id
 * @property float $amount
 * @property int $user_id_send_by
 * @property int $pay_level
 * @property string $position
 * @property int $status
 * @property int $order_id
 * @property Carbon $pay_date
 *
 * @package App\Models
 */
class TeamBussiness extends Model
{
	protected $table = 'team_bussiness';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'amount' => 'float',
		'user_id_send_by' => 'int',
		'pay_level' => 'int',
		'status' => 'int',
		'order_id' => 'int'
	];

	protected $dates = [
		'pay_date'
	];

	protected $fillable = [
		'user_id',
		'amount',
		'user_id_send_by',
		'pay_level',
		'position',
		'status',
		'order_id',
		'pay_date'
	];
}
