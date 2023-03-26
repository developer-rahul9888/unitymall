<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reward
 * 
 * @property int $id
 * @property string $user_id
 * @property string $pair_bv
 * @property string $reward
 * @property string $rank
 * @property int $level
 * @property Carbon $c_date
 * @property int $status
 * @property int $bonanza_id
 * @property Carbon $pay_date
 *
 * @package App\Models
 */
class Reward extends Model
{
	protected $table = 'reward';
	public $timestamps = false;

	protected $casts = [
		'level' => 'int',
		'status' => 'int',
		'bonanza_id' => 'int'
	];

	protected $dates = [
		'c_date',
		'pay_date'
	];

	protected $fillable = [
		'user_id',
		'pair_bv',
		'reward',
		'rank',
		'level',
		'c_date',
		'status',
		'bonanza_id',
		'pay_date'
	];
}
