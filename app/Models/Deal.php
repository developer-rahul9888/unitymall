<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Deal
 * 
 * @property int $id
 * @property int $mid
 * @property string $title
 * @property string $image
 * @property string $description
 * @property int $actual_price
 * @property int $discount_price
 * @property string $s_date
 * @property string $e_date
 * @property string $terms
 * @property string $status
 * @property Carbon $r_date
 *
 * @package App\Models
 */
class Deal extends Model
{
	protected $table = 'deals';
	public $timestamps = false;

	protected $casts = [
		'mid' => 'int',
		'actual_price' => 'int',
		'discount_price' => 'int'
	];

	protected $dates = [
		'r_date'
	];

	protected $fillable = [
		'mid',
		'title',
		'image',
		'description',
		'actual_price',
		'discount_price',
		's_date',
		'e_date',
		'terms',
		'status',
		'r_date'
	];
}
