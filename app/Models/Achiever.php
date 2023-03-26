<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Achiever
 * 
 * @property int $id
 * @property int $user_id
 * @property string $desciption
 * @property int $qty
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class Achiever extends Model
{
	protected $table = 'achiever';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'qty' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'user_id',
		'desciption',
		'qty',
		'status',
		'date'
	];
}
