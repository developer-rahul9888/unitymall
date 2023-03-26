<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pincode
 * 
 * @property int $id
 * @property int $status
 * @property string $city_type
 * @property int $pincode
 * @property int $active
 * @property string $state_code
 * @property string $city
 * @property string $dccode
 * @property string $route
 * @property string $state
 * @property string $date_of_discontinuance
 * @property string $city_code
 *
 * @package App\Models
 */
class Pincode extends Model
{
	protected $table = 'pincodes';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'pincode' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'status',
		'city_type',
		'pincode',
		'active',
		'state_code',
		'city',
		'dccode',
		'route',
		'state',
		'date_of_discontinuance',
		'city_code'
	];
}
