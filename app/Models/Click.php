<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Workwith
 * 
 * @property int $id_no
 * @property string $Sitename
 * @property string $link
 * @property string $zkey
 * @property string $username
 * @property string $phno
 * @property string $ip
 * @property string $city
 * @property string $visitor_no
 * @property Carbon $Date_Time
 *
 * @package App\Models
 */
class Click extends Model
{
	protected $table = 'clicks';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $dates = [
		'r_date'
	];

	protected $fillable = [
		'Sitename',
		'link',
		'user_id',
		'username',
		'phno',
		'ip',
		'city',
		'visitor_no',
		'r_date'
	];
}
