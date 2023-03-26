<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Package
 * 
 * @property int $id
 * @property string $title
 * @property string $amount
 * @property string $pv
 * @property int $capping
 * @property int $percentage
 * @property int $franchisee
 * @property string $status
 * @property Carbon $date
 *
 * @package App\Models
 */
class Package extends Model
{
	protected $table = 'package';
	public $timestamps = false;

	protected $casts = [
		'capping' => 'int',
		'percentage' => 'int',
		'franchisee' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'title',
		'amount',
		'pv',
		'capping',
		'percentage',
		'franchisee',
		'status',
		'date'
	];
}
