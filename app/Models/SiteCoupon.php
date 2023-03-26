<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SiteCoupon
 * 
 * @property int $id
 * @property string $title
 * @property string $code
 * @property string $amount
 * @property string $type
 * @property string $start_date
 * @property string $end_date
 * @property int $per_user
 * @property string $status
 *
 * @package App\Models
 */
class SiteCoupon extends Model
{
	protected $table = 'site_coupon';
	public $timestamps = false;

	protected $casts = [
		'per_user' => 'int'
	];

	protected $fillable = [
		'title',
		'code',
		'amount',
		'type',
		'start_date',
		'end_date',
		'per_user',
		'status'
	];
}
