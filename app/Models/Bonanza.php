<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bonanza
 * 
 * @property int $id
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property int $lbv
 * @property int $rbv
 * @property string $rank
 * @property string $reward
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class Bonanza extends Model
{
	protected $table = 'bonanza';
	public $timestamps = false;

	protected $casts = [
		'lbv' => 'int',
		'rbv' => 'int'
	];

	protected $dates = [
		'start_date',
		'end_date',
		'date'
	];

	protected $fillable = [
		'start_date',
		'end_date',
		'lbv',
		'rbv',
		'rank',
		'reward',
		'status',
		'date'
	];
}
