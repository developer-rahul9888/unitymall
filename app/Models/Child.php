<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Child
 * 
 * @property int $id
 * @property int $user_id
 * @property int $level_1
 * @property int $level_2
 * @property int $level_3
 * @property int $level_4
 * @property int $level_5
 * @property int $level_6
 * @property int $level_7
 * @property int $level_8
 * @property int $level_9
 * @property int $level_10
 * @property int $level_11
 * @property int $matrix_id
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class Child extends Model
{
	protected $table = 'children';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'level_1' => 'int',
		'level_2' => 'int',
		'level_3' => 'int',
		'level_4' => 'int',
		'level_5' => 'int',
		'level_6' => 'int',
		'level_7' => 'int',
		'level_8' => 'int',
		'level_9' => 'int',
		'level_10' => 'int',
		'level_11' => 'int',
		'matrix_id' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'user_id',
		'level_1',
		'level_2',
		'level_3',
		'level_4',
		'level_5',
		'level_6',
		'level_7',
		'level_8',
		'level_9',
		'level_10',
		'level_11',
		'matrix_id',
		'status',
		'date'
	];
}
