<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Newsletter
 * 
 * @property int $id
 * @property string $email
 * @property Carbon $register_date
 *
 * @package App\Models
 */
class Newsletter extends Model
{
	protected $table = 'newsletter';
	public $timestamps = false;

	protected $dates = [
		'register_date'
	];

	protected $fillable = [
		'email',
		'register_date'
	];
}
